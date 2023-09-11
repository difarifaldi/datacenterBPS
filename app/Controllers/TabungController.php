<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TabungModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TabungController extends Controller
{
    private $title = 'Input Data Tekanan Tabung';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getChartDataByMonth()
    {
        $bulanTabung = $this->request->getVar('bulanTabung'); // Ambil bulanTabung dari parameter URL
        $TabungModel = new TabungModel();
        $chartData = $TabungModel->getChartDataByMonth($bulanTabung); // Ganti ini dengan metode yang sesuai di model
  
        return $this->response->setJSON($chartData);
    }

    public function index()
    {
        //model initialize
        $TabungModel = new TabungModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Tabung = $TabungModel->select('tabung.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = tabung.pemeriksa_id', 'left')
            ->paginate($per_page, 'tabung', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_besar' => [],
            'status_kecil' => []
        ];
        foreach ($Tabung as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_besar'][] = $record['status_besar'];
            $chartData['status_kecil'][] = $record['status_kecil'];
        }
        $data = array(
            'tabung' => $Tabung,
            'title' => 'Data Tekanan Tabung',
            'pager' => $TabungModel->pager,
            'chartData' => $chartData
        );

        return view('tabung', $data);
    }

     /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('tabung-create',$data);
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
            'status_besar'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Unit Tabung Tekanan Besar'
                ]
            ],
            'message_tabungBesar'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Unit Tabung Tekanan Kecil'
                ]
            ],
            'status_kecil'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Unit Tabung Tekanan Kecil'
                ]
            ],
            'message_tabungKecil'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Unit Tabung Tekanan Kecil'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/tabung/create')->withInput();

        } 

            //model initialize
            $TabungModel = new TabungModel();
            
            //insert data into database
            $TabungModel->insert([
                'status_besar' => $this->request->getPost('status_besar'),
                'message_tabungBesar' => $this->request->getPost('message_tabungBesar'),
                'status_kecil' => $this->request->getPost('status_kecil'),
                'message_tabungKecil' => $this->request->getPost('message_tabungKecil'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Tabung Berhasil Disimpan');

            return redirect()->to(base_url('/fire/create'));
        }

        /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $TabungModel = new TabungModel();
            $Tabung = $TabungModel->select('tabung.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = tabung.pemeriksa_id', 'left');
            $data = $Tabung->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Status Tekanan Besar');
            $sheet->setCellValue('B1', 'Keterangan Tabung Besar');
            $sheet->setCellValue('C1', 'Status Tekanan Kecil');
            $sheet->setCellValue('D1', 'Keterangan Tabung Kecil');
            $sheet->setCellValue('E1', 'Pemeriksa');
            $sheet->setCellValue('F1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['status_besar']);
                $sheet->setCellValue('B' . $row, $item['message_tabungBesar']);
                $sheet->setCellValue('C' . $row, $item['status_kecil']);
                $sheet->setCellValue('D' . $row, $item['message_tabungKecil']);
                $sheet->setCellValue('E' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('F' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'tabung_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }

    }
