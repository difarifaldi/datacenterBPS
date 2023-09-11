<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CctvModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CctvController extends Controller
{
    private $title = 'Input Data CCTV';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getChartDataByMonth()
    {
        $bulanCctv = $this->request->getVar('bulanCctv'); // Ambil bulanCctv dari parameter URL
        $tahunCctv = $this->request->getVar('tahunCctv'); // Ambil tahunCctv dari parameter URL
        $CctvModel = new CctvModel();
        $chartData = $CctvModel->getChartDataByMonth($bulanCctv,$tahunCctv); // Ganti ini dengan metode yang sesuai di model
  
        return $this->response->setJSON($chartData);
    }

    public function index()
    {
        //model initialize
        $CctvModel = new CctvModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Cctv = $CctvModel->select('cctv.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = cctv.pemeriksa_id', 'left')
            ->paginate($per_page, 'cctv', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'unit_cctv' => []
        ];
        foreach ($Cctv as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['unit_cctv'][] = $record['unit_cctv'];
        }
        $data = array(
            'cctv' => $Cctv,
            'title' => 'Data CCTV',
            'pager' => $CctvModel->pager,
            'chartData' => $chartData
        );

        return view('cctv', $data);
    }

     /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('cctv-create',$data);
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
        $pemeriksaId = session()->get('pemeriksa_id');

        if (!$pemeriksaId) {
            session()->setFlashdata('message', 'Isi data terlebih dahulu');
            return redirect()->to(base_url('pemeriksa/create'));
        }
         
        //define validation
        $validation = $this->validate([
            'unit_cctv'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Unit CCTV'
                ]
            ],
            'status_cctv'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status CCTV'
                ]
            ],
            'keterangan_cctv'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Keterangan CCTV'
                ]
            ],
            'status_nvr'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status NVR'
                ]
            ],
            'record'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Record'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/cctv/create')->withInput();

        } 

            //model initialize
            $CctvModel = new CctvModel();
            
            //insert data into database
            $CctvModel->insert([
                'unit_cctv' => $this->request->getPost('unit_cctv'),
                'status_cctv' => $this->request->getPost('status_cctv'),
                'keterangan_cctv' => $this->request->getPost('keterangan_cctv'),
                'status_nvr' => $this->request->getPost('status_nvr'),
                'record' => $this->request->getPost('record'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Status CCTV Berhasil Disimpan');

            return redirect()->to(base_url('/cctv'));
        }

        /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $CctvModel = new CctvModel();
            $Cctv = $CctvModel->select('cctv.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = cctv.pemeriksa_id', 'left');
            $data = $Cctv->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Unit CCTV');
            $sheet->setCellValue('B1', 'Status CCTV');
            $sheet->setCellValue('C1', 'Keterangan CCTV');
            $sheet->setCellValue('D1', 'Status NVR');
            $sheet->setCellValue('E1', 'Status Record');
            $sheet->setCellValue('F1', 'Pemeriksa');
            $sheet->setCellValue('G1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['unit_cctv']);
                $sheet->setCellValue('B' . $row, $item['status_cctv']);
                $sheet->setCellValue('C' . $row, $item['keterangan_cctv']);
                $sheet->setCellValue('D' . $row, $item['status_nvr']);
                $sheet->setCellValue('D' . $row, $item['record']);
                $sheet->setCellValue('E' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('F' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'cctv_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }

    }
