<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LcpModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LcpController extends Controller
{
    private $title = 'Input Data Liquid Cooling Package (LCP)';
    protected $helpers = ['form'];
    /**
     * index function
     */
    public function getChartDataByMonth()
     {
         $bulanLcp = $this->request->getVar('bulanLcp'); // Ambil bulanLcp dari parameter URL
         $tahunLcp = $this->request->getVar('tahunLcp'); // Ambil tahunLcp dari parameter URL
         $LcpModel = new LcpModel();
         $chartData = $LcpModel->getChartDataByMonth($bulanLcp,$tahunLcp); // Ganti ini dengan metode yang sesuai di model
 
         return $this->response->setJSON($chartData);
     }
    public function getDataByMonth()
    {
        $bulanLcp = $this->request->getVar('bulanLcp');
        $LcpModel = new LcpModel();
        $data = $LcpModel->countKerusakanByTypeAndMonth($bulanLcp);
 
        return $this->response->setJSON($data);
     }
    
     public function index()
    {
        //model initialize
        $LcpModel = new LcpModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Lcp = $LcpModel->select('lcp.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = lcp.pemeriksa_id', 'left')
            ->paginate($per_page, 'lcp', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'suhu_lcp1' => [],
            'suhu_lcp2' => [],
            'suhu_lcp3' => [],
            'suhu_lcp4' => [],
            'suhu_lcp5' => [],
            'suhu_lcp6' => [],
            'suhu_lcp7' => [],
            'suhu_lcp8' => [],
            'daya_lcp1' => [],
            'daya_lcp2' => [],
            'daya_lcp3' => [],
            'daya_lcp4' => [],
            'daya_lcp5' => [],
            'daya_lcp6' => [],
            'daya_lcp7' => [],
            'daya_lcp8' => []
        ];
        foreach ($Lcp as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['suhu_lcp1'][] = $record['suhu_lcp1'];
            $chartData['suhu_lcp2'][] = $record['suhu_lcp2'];
            $chartData['suhu_lcp3'][] = $record['suhu_lcp3'];
            $chartData['suhu_lcp4'][] = $record['suhu_lcp4'];
            $chartData['suhu_lcp5'][] = $record['suhu_lcp5'];
            $chartData['suhu_lcp6'][] = $record['suhu_lcp6'];
            $chartData['suhu_lcp7'][] = $record['suhu_lcp7'];
            $chartData['suhu_lcp8'][] = $record['suhu_lcp8'];
            $chartData['daya_lcp1'][] = $record['daya_lcp1'];
            $chartData['daya_lcp2'][] = $record['daya_lcp2'];
            $chartData['daya_lcp3'][] = $record['daya_lcp3'];
            $chartData['daya_lcp4'][] = $record['daya_lcp4'];
            $chartData['daya_lcp5'][] = $record['daya_lcp5'];
            $chartData['daya_lcp6'][] = $record['daya_lcp6'];
            $chartData['daya_lcp7'][] = $record['daya_lcp7'];
            $chartData['daya_lcp8'][] = $record['daya_lcp8'];
        }

        $data = array(
            'lcp' => $Lcp,
            'title' => 'Data LCP',
            'pager' => $LcpModel->pager,
            'chartData' => $chartData
        );

        return view('lcp', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('lcp-create',$data);
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
            'suhu_lcp1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 1.'
                ]
            ],
            'suhu_lcp2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 2.'
                ]
            ],
            'suhu_lcp3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 3.'
                ]
            ],
            'suhu_lcp4' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 4.'
                ]
            ],
            'suhu_lcp5' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 5.'
                ]
            ],
            'suhu_lcp6' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 6.'
                ]
            ],
            'suhu_lcp7' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 7.'
                ]
            ],
            'suhu_lcp8' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Suhu LCP 8.'
                ]
            ],
            'daya_lcp1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 1.'
                ]
            ],
            'daya_lcp2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 2.'
                ]
            ],
            'daya_lcp3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 3.'
                ]
            ],
            'daya_lcp4' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 4.'
                ]
            ],
            'daya_lcp5' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 5.'
                ]
            ],
            'daya_lcp6' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 6.'
                ]
            ],
            'daya_lcp7' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 7.'
                ]
            ],
            'daya_lcp8' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Daya LCP 8.'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/lcp/create')->withInput();

        } else {

            //model initialize
            $LcpModel = new LcpModel();
            
            //insert data into database
            $LcpModel->insert([
                'suhu_lcp1'   => $this->request->getPost('suhu_lcp1'),
                'suhu_lcp2'   => $this->request->getPost('suhu_lcp2'),
                'suhu_lcp3'   => $this->request->getPost('suhu_lcp3'),
                'suhu_lcp4'   => $this->request->getPost('suhu_lcp4'),
                'suhu_lcp5'   => $this->request->getPost('suhu_lcp5'),
                'suhu_lcp6'   => $this->request->getPost('suhu_lcp6'),
                'suhu_lcp7'   => $this->request->getPost('suhu_lcp7'),
                'suhu_lcp8'   => $this->request->getPost('suhu_lcp8'),
                'daya_lcp1'   => $this->request->getPost('daya_lcp1'),
                'daya_lcp2'   => $this->request->getPost('daya_lcp2'),
                'daya_lcp3'   => $this->request->getPost('daya_lcp3'),
                'daya_lcp4'   => $this->request->getPost('daya_lcp4'),
                'daya_lcp5'   => $this->request->getPost('daya_lcp5'),
                'daya_lcp6'   => $this->request->getPost('daya_lcp6'),
                'daya_lcp7'   => $this->request->getPost('daya_lcp7'),
                'daya_lcp8'   => $this->request->getPost('daya_lcp8'),
                'alert_lcp1'   => $this->request->getPost('alert_lcp1'),
                'alert_lcp2'   => $this->request->getPost('alert_lcp2'),
                'alert_lcp3'   => $this->request->getPost('alert_lcp3'),
                'alert_lcp4'   => $this->request->getPost('alert_lcp4'),
                'alert_lcp5'   => $this->request->getPost('alert_lcp5'),
                'alert_lcp6'   => $this->request->getPost('alert_lcp6'),
                'alert_lcp7'   => $this->request->getPost('alert_lcp7'),
                'alert_lcp8'   => $this->request->getPost('alert_lcp8'),
                'message_lcp1'   => $this->request->getPost('message_lcp1'),
                'message_lcp2'   => $this->request->getPost('message_lcp2'),
                'message_lcp3'   => $this->request->getPost('message_lcp3'),
                'message_lcp4'   => $this->request->getPost('message_lcp4'),
                'message_lcp5'   => $this->request->getPost('message_lcp5'),
                'message_lcp6'   => $this->request->getPost('message_lcp6'),
                'message_lcp7'   => $this->request->getPost('message_lcp7'),
                'message_lcp8'   => $this->request->getPost('message_lcp8'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data LCP Berhasil Disimpan');

            return redirect()->to(base_url('/vesda/create'));
        }

    }

    /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $LcpModel = new LcpModel();
            $Lcp = $LcpModel->select('lcp.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = lcp.pemeriksa_id', 'left');
            $data = $Lcp->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Suhu LCP 1');
            $sheet->setCellValue('B1', 'Daya LCP 1');
            $sheet->setCellValue('C1', 'Keterangan LCP 1');
            $sheet->setCellValue('D1', 'Alarm Message LCP 1');
            $sheet->setCellValue('E1', 'Suhu LCP 2');
            $sheet->setCellValue('F1', 'Daya LCP 2');
            $sheet->setCellValue('G1', 'Keterangan LCP 2');
            $sheet->setCellValue('H1', 'Alarm Message LCP 2');
            $sheet->setCellValue('I1', 'Suhu LCP 3');
            $sheet->setCellValue('J1', 'Daya LCP 3');
            $sheet->setCellValue('K1', 'Keterangan LCP 3');
            $sheet->setCellValue('L1', 'Alarm Message LCP 3');
            $sheet->setCellValue('M1', 'Suhu LCP 4');
            $sheet->setCellValue('N1', 'Daya LCP 4');
            $sheet->setCellValue('O1', 'Keterangan LCP 4');
            $sheet->setCellValue('P1', 'Alarm Message LCP 4');
            $sheet->setCellValue('Q1', 'Suhu LCP 5');
            $sheet->setCellValue('R1', 'Daya LCP 5');
            $sheet->setCellValue('S1', 'Keterangan LCP 5');
            $sheet->setCellValue('T1', 'Alarm Message LCP 5');
            $sheet->setCellValue('U1', 'Suhu LCP 6');
            $sheet->setCellValue('V1', 'Daya LCP 6');
            $sheet->setCellValue('W1', 'Keterangan LCP 6');
            $sheet->setCellValue('X1', 'Alarm Message LCP 6');
            $sheet->setCellValue('Y1', 'Suhu LCP 7');
            $sheet->setCellValue('Z1', 'Daya LCP 7');
            $sheet->setCellValue('AA1', 'Keterangan LCP 7');
            $sheet->setCellValue('AB1', 'Alarm Message LCP 7');
            $sheet->setCellValue('AC1', 'Suhu LCP 8');
            $sheet->setCellValue('AD1', 'Daya LCP 8');
            $sheet->setCellValue('AE1', 'Keterangan LCP 8');
            $sheet->setCellValue('AF1', 'Alarm Message LCP 8');
            $sheet->setCellValue('AG1', 'Pemeriksa');
            $sheet->setCellValue('AH1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['suhu_lcp1'] . '°C');
                $sheet->setCellValue('B' . $row, $item['daya_lcp1'] . ' kW');
                $sheet->setCellValue('C' . $row, $item['alert_lcp1']);
                $sheet->setCellValue('D' . $row, $item['message_lcp1']);
                $sheet->setCellValue('E' . $row, $item['suhu_lcp2'] . '°C');
                $sheet->setCellValue('F' . $row, $item['daya_lcp2'] . ' kW');
                $sheet->setCellValue('G' . $row, $item['alert_lcp2']);
                $sheet->setCellValue('H' . $row, $item['message_lcp2']);
                $sheet->setCellValue('I' . $row, $item['suhu_lcp3'] . '°C');
                $sheet->setCellValue('J' . $row, $item['daya_lcp3'] . ' kW');
                $sheet->setCellValue('K' . $row, $item['alert_lcp3']);
                $sheet->setCellValue('L' . $row, $item['message_lcp3']);
                $sheet->setCellValue('M' . $row, $item['suhu_lcp4'] . '°C');
                $sheet->setCellValue('N' . $row, $item['daya_lcp4'] . ' kW');
                $sheet->setCellValue('O' . $row, $item['alert_lcp4']);
                $sheet->setCellValue('P' . $row, $item['message_lcp4']);
                $sheet->setCellValue('Q' . $row, $item['suhu_lcp5'] . '°C');
                $sheet->setCellValue('R' . $row, $item['daya_lcp5'] . ' kW');
                $sheet->setCellValue('S' . $row, $item['alert_lcp5']);
                $sheet->setCellValue('T' . $row, $item['message_lcp5']);
                $sheet->setCellValue('U' . $row, $item['suhu_lcp6'] . '°C');
                $sheet->setCellValue('V' . $row, $item['daya_lcp6'] . ' kW');
                $sheet->setCellValue('W' . $row, $item['alert_lcp6']);
                $sheet->setCellValue('X' . $row, $item['message_lcp6']);
                $sheet->setCellValue('Y' . $row, $item['suhu_lcp7'] . '°C');
                $sheet->setCellValue('Z' . $row, $item['daya_lcp7'] . ' kW');
                $sheet->setCellValue('AA' . $row, $item['alert_lcp7']);
                $sheet->setCellValue('AB' . $row, $item['message_lcp7']);
                $sheet->setCellValue('AC' . $row, $item['suhu_lcp8'] . '°C');
                $sheet->setCellValue('AD' . $row, $item['daya_lcp8'] . ' kW');
                $sheet->setCellValue('AE' . $row, $item['alert_lcp8']);
                $sheet->setCellValue('AF' . $row, $item['message_lcp8']);
                $sheet->setCellValue('AG' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('AH' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'lcp_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }
}