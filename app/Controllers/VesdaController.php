<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VesdaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VesdaController extends Controller
{
    private $title = 'Input Data Vesda';
    protected $helpers = ['form'];
    /**
     * index function
     */
    public function getChartDataByMonth()
    {
        $bulanVesda = $this->request->getVar('bulanVesda'); // Ambil bulanVesda dari parameter URL
        $VesdaModel = new VesdaModel();
        $chartData = $VesdaModel->getChartDataByMonth($bulanVesda); // Ganti ini dengan metode yang sesuai di model
 
        return $this->response->setJSON($chartData);
    }
     public function index()
    {
        //model initialize
        $VesdaModel = new VesdaModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Vesda = $VesdaModel->select('vesda.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = vesda.pemeriksa_id', 'left')
            ->paginate($per_page, 'vesda', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_main' => [],
            'status_selasar' => [],
            'status_utility' => [],
            'status_library' => [],
            'status_staging' => []
        ];
        foreach ($Vesda as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_main'][] = $record['status_main'];
            $chartData['status_selasar'][] = $record['status_selasar'];
            $chartData['status_utility'][] = $record['status_utility'];
            $chartData['status_library'][] = $record['status_library'];
            $chartData['status_staging'][] = $record['status_staging'];
        }

        $data = array(
            'vesda' => $Vesda,
            'title' => 'Data Vesda',
            'pager' => $VesdaModel->pager,
            'chartData' => $chartData
        );

        return view('vesda', $data);
    }

     /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('vesda-create',$data);
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
        $pemeriksaId = session()->get('pemeriksa_id');
        echo 'Nilai pemeriksa_id: ' . $pemeriksaId;

        if (!$pemeriksaId) {
            session()->setFlashdata('message', 'Isi data terlebih dahulu');
            return redirect()->to(base_url('pemeriksa/create'));
        }
         
        //define validation
        $validation = $this->validate([
            'status_main'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Vesda Ruang Main Server'
                ]
            ],
            'status_selasar'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Vesda Ruang Selasar (Lorong)'
                ]
            ],
            'status_utility'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Vesda Utility'
                ]
            ],
            'status_library'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Vesda Tape Library'
                ]
            ],
            'status_staging'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Vesda Staging'
                ]
            ],
        ]);

        if(!$validation) {

            return redirect()->to('/vesda/create')->withInput();
            //render view with error validation message
        

        } 

            //model initialize
            $VesdaModel = new VesdaModel();
            
            //insert data into database
            $VesdaModel->insert([
                'status_main' => $this->request->getPost('status_main'),
                'alert_vesdaMain' => $this->request->getPost('alert_vesdaMain'),
                'message_vesdaMain' => $this->request->getPost('message_vesdaMain'),
                'status_selasar' => $this->request->getPost('status_selasar'),
                'alert_vesdaSelasar' => $this->request->getPost('alert_vesdaSelasar'),
                'message_vesdaSelasar' => $this->request->getPost('message_vesdaSelasar'),
                'status_utility' => $this->request->getPost('status_utility'),
                'alert_vesdaUtility' => $this->request->getPost('alert_vesdaUtility'),
                'message_vesdaUtility' => $this->request->getPost('message_vesdaUtility'),
                'status_library' => $this->request->getPost('status_library'),
                'alert_vesdaLibrary' => $this->request->getPost('alert_vesdaLibrary'),
                'message_vesdaLibrary' => $this->request->getPost('message_vesdaLibrary'),
                'status_staging' => $this->request->getPost('status_staging'),
                'alert_vesdaStaging' => $this->request->getPost('alert_vesdaStaging'),
                'message_vesdaStaging' => $this->request->getPost('message_vesdaStaging'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Vesda Berhasil Disimpan');

            return redirect()->to('/tabung/create');
        }

        /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $VesdaModel = new VesdaModel();
            $Vesda = $VesdaModel->select('vesda.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = vesda.pemeriksa_id', 'left');
            $data = $Vesda->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Status Vesda Main Server');
            $sheet->setCellValue('B1', 'Status Vesda Selasar');
            $sheet->setCellValue('C1', 'Status Vesda Utility');
            $sheet->setCellValue('D1', 'Status Vesda Tape Library');
            $sheet->setCellValue('E1', 'Status Vesda Staging');
            $sheet->setCellValue('F1', 'Keterangan');
            $sheet->setCellValue('G1', 'Alarm Message');
            $sheet->setCellValue('H1', 'Pemeriksa');
            $sheet->setCellValue('I1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['status_main']);
                $sheet->setCellValue('B' . $row, $item['status_selasar']);
                $sheet->setCellValue('C' . $row, $item['status_utility']);
                $sheet->setCellValue('D' . $row, $item['status_library']);
                $sheet->setCellValue('E' . $row, $item['status_staging']);
                $sheet->setCellValue('F' . $row, $item['alert_vesda']);
                $sheet->setCellValue('G' . $row, $item['message_vesda']);
                $sheet->setCellValue('H' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('I' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'vesda_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
            ob_flush();
flush();
        }

    }
