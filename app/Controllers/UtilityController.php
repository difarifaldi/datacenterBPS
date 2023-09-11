<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilityModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UtilityController extends Controller
{
    private $title = 'Input Data Ruang Utility (Panel)';
    protected $helpers = ['form'];
    /**
     * index function
     */
    
     public function getChartDataByMonth()
     {
         $bulanUtility = $this->request->getVar('bulanUtility'); // Ambil bulanUtility dari parameter URL
         $tahunUtility = $this->request->getVar('tahunUtility'); // Ambil tahunUtility dari parameter URL
         $UtilityModel = new UtilityModel();
         $chartData = $UtilityModel->getChartDataByMonth($bulanUtility,$tahunUtility); // Ganti ini dengan metode yang sesuai di model
 
         return $this->response->setJSON($chartData);
     }
    public function getDataByMonth()
    {
        $bulanUtility = $this->request->getVar('bulanUtility');
        $UtilityModel = new UtilityModel();
        $data = $UtilityModel->countKerusakanByTypeAndMonth($bulanUtility);
 
        return $this->response->setJSON($data);
     }
     public function index()
    {
        //model initialize
        $UtilityModel = new UtilityModel();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $utility = $UtilityModel->select('utility.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = utility.pemeriksa_id', 'left')
            ->paginate($per_page, 'utility', $page);

        

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'MSB_U' => [],
            'UMSB_U' => [],
            'MSB_U2' => [],
            'UMSB_U2' => [],
            'MSB_U3' => [],
            'UMSB_U3' => [],
            'MSB_S' => [],
            'MSB_S2' => [],
            'MSB_S3' => []
        ];
        foreach ($utility as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['MSB_U'][] = $record['MSB_U'];
            $chartData['UMSB_U'][] = $record['UMSB_U'];
            $chartData['MSB_U2'][] = $record['MSB_U2'];
            $chartData['UMSB_U2'][] = $record['UMSB_U2'];
            $chartData['MSB_U3'][] = $record['MSB_U3'];
            $chartData['UMSB_U3'][] = $record['UMSB_U3'];
            $chartData['MSB_S'][] = $record['MSB_S'];
            $chartData['MSB_S2'][] = $record['MSB_S2'];
            $chartData['MSB_S3'][] = $record['MSB_S3'];
        }

        $data = [
            'utility' => $utility,
            'pager' => $UtilityModel->pager,
            'title' => 'Data Ruang Utility',
            'chartData' => $chartData
        ];

        return view('utility', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Input Data Ruang Utility'
        ];
        return view('utility-create', $data);
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
            'MSB_U'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Utility.'
                ]
            ],
            'UMSB_U'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan UMSB Utility.'
                ]
            ],
            'MSB_U2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Utility ke-2.'
                ]
            ],
            'UMSB_U2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan UMSB Utility ke-2.'
                ]
            ],
            'MSB_U3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Utility ke-3.'
                ]
            ],
            'UMSB_U3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan UMSB Utility ke-3.'
                ]
            ],
            'MSB_S'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Stagging.'
                ]
            ],
            'MSB_S2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Stagging ke-2.'
                ]
            ],
            'MSB_S3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan MSB Stagging ke-3.'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/utility/create')->withInput();

        } else {

             //model initialize
            $UtilityModel = new UtilityModel();
            
            //insert data into database
            $UtilityModel->insert([
                'MSB_U' => $this->request->getPost('MSB_U'),
                'UMSB_U' => $this->request->getPost('UMSB_U'),
                'MSB_U2' => $this->request->getPost('MSB_U2'),
                'UMSB_U2' => $this->request->getPost('UMSB_U2'),
                'MSB_U3' => $this->request->getPost('MSB_U3'),
                'alert_MSBU' => $this->request->getPost('alert_MSBU'),
                'message_MSBU' => $this->request->getPost('message_MSBU'),
                'UMSB_U3' => $this->request->getPost('UMSB_U3'),
                'alert_UMSBU' => $this->request->getPost('alert_UMSBU'),
                'message_UMSBU' => $this->request->getPost('message_UMSBU'),
                'MSB_S' => $this->request->getPost('MSB_S'),
                'MSB_S2' => $this->request->getPost('MSB_S2'),
                'MSB_S3' => $this->request->getPost('MSB_S3'),
                'alert_MSBS' => $this->request->getPost('alert_MSBS'),
                'message_MSBS' => $this->request->getPost('message_MSBS'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Utility Berhasil Disimpan');

            return redirect()->to(base_url('/systemups/create'));
        }

    }

    /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $UtilityModel = new UtilityModel();
            $Utility = $UtilityModel->select('utility.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = utility.pemeriksa_id', 'left');
            $data = $Utility->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'MSB Utility');
            $sheet->setCellValue('B1', 'MSB Utility');
            $sheet->setCellValue('C1', 'MSB Utility');
            $sheet->setCellValue('D1', 'Keterangan MSB Utility');
            $sheet->setCellValue('E1', 'Alarm Message MSB Utility');
            $sheet->setCellValue('F1', 'UMSB Utility');
            $sheet->setCellValue('G1', 'UMSB Utility');
            $sheet->setCellValue('H1', 'UMSB Utility');
            $sheet->setCellValue('I1', 'Keterangan UMSB Utility');
            $sheet->setCellValue('J1', 'Alarm Message UMSB Utility');
            $sheet->setCellValue('K1', 'DB-UPS');
            $sheet->setCellValue('L1', 'DB-UPS');
            $sheet->setCellValue('M1', 'DB-UPS');
            $sheet->setCellValue('N1', 'Keterangan DB-UPS');
            $sheet->setCellValue('O1', 'Alarm Message DB-UPS');
            $sheet->setCellValue('P1', 'Pemeriksa');
            $sheet->setCellValue('Q1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['MSB_U'] . ' kW');
                $sheet->setCellValue('B' . $row, $item['MSB_U2'] . ' kvar');
                $sheet->setCellValue('C' . $row, $item['MSB_U3'] . ' kVA');
                $sheet->setCellValue('D' . $row, $item['alert_MSBU']);
                $sheet->setCellValue('E' . $row, $item['message_MSBU']);
                $sheet->setCellValue('F' . $row, $item['UMSB_U'] . ' kW');
                $sheet->setCellValue('G' . $row, $item['UMSB_U2'] . ' kvar');
                $sheet->setCellValue('H' . $row, $item['UMSB_U3'] . ' kVA');
                $sheet->setCellValue('I' . $row, $item['alert_UMSBU']);
                $sheet->setCellValue('J' . $row, $item['message_UMSBU']);
                $sheet->setCellValue('K' . $row, $item['MSB_S'] . ' kW');
                $sheet->setCellValue('L' . $row, $item['MSB_S2'] . ' kvar');
                $sheet->setCellValue('M' . $row, $item['MSB_S3'] . ' kVA');
                $sheet->setCellValue('N' . $row, $item['alert_MSBS']);
                $sheet->setCellValue('O' . $row, $item['message_MSBS']);
                $sheet->setCellValue('P' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('Q' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'utility_data.xlsx';
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
