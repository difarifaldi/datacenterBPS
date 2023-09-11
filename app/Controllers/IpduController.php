<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IpduModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IpduController extends Controller
{
    private $title = 'Input Data IPDU';
    protected $helpers = ['form'];
    /**
     * index function
     */
    
     public function getChartDataByMonth()
     {
         $bulanIpdu = $this->request->getVar('bulanIpdu'); // Ambil bulanIpdu dari parameter URL
         $tahunIpdu = $this->request->getVar('tahunIpdu'); // Ambil tahunIpdu dari parameter URL
         $IpduModel = new IpduModel();
         $chartData = $IpduModel->getChartDataByMonth($bulanIpdu,$tahunIpdu); // Ganti ini dengan metode yang sesuai di model
 
         return $this->response->setJSON($chartData);
     }
    public function getDataByMonth()
    {
        $bulanIpdu = $this->request->getVar('bulanIpdu');
        $IpduModel = new IpduModel();
        $data = $IpduModel->countKerusakanByTypeAndMonth($bulanIpdu);
 
        return $this->response->setJSON($data);
     }
     public function index()
    {
        //model initialize
        $IpduModel = new IpduModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Ipdu = $IpduModel->select('ipdu.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = ipdu.pemeriksa_id', 'left')
            ->paginate($per_page, 'ipdu', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'p_mb1' => [],
            's_mb1' => [],
            'q_mb1' => [],
            'pf_mb1' => [],
            'kwh_mb1' => [],
            'kvah_mb1' => [],
            'kvarh_mb1' => [],
            'p_mb2' => [],
            's_mb2' => [],
            'q_mb2' => [],
            'pf_mb2' => [],
            'kwh_mb2' => [],
            'kvah_mb2' => [],
            'kvarh_mb2' => []
        ];
        foreach ($Ipdu as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['p_mb1'][] = $record['p_mb1'];
            $chartData['s_mb1'][] = $record['s_mb1'];
            $chartData['q_mb1'][] = $record['q_mb1'];
            $chartData['pf_mb1'][] = $record['pf_mb1'];
            $chartData['kwh_mb1'][] = $record['kwh_mb1'];
            $chartData['kvah_mb1'][] = $record['kvah_mb1'];
            $chartData['kvarh_mb1'][] = $record['kvarh_mb1'];
            $chartData['p_mb2'][] = $record['p_mb2'];
            $chartData['s_mb2'][] = $record['s_mb2'];
            $chartData['q_mb2'][] = $record['q_mb2'];
            $chartData['pf_mb2'][] = $record['pf_mb2'];
            $chartData['kwh_mb2'][] = $record['kwh_mb2'];
            $chartData['kvah_mb2'][] = $record['kvah_mb2'];
            $chartData['kvarh_mb2'][] = $record['kvarh_mb2'];
        }

        $data = array(
            'ipdu' => $Ipdu,
            'title' => 'Data Ipdu',
            'pager' => $IpduModel->pager,
            'chartData' => $chartData
        );

        return view('ipdu', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('ipdu-create',$data);
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
            'p_mb1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai P Main Breaker 1.'
                ]
            ],
            's_mb1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai S Main Breaker 1.'
                ]
            ],
            'q_mb1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Q Main Breaker 1.'
                ]
            ],
            'pf_mb1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai PF Main Breaker 1.'
                ]
            ],
            'kwh_mb1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai KWH Main Breaker 1.'
                ]
            ],
            'kvah_mb1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai KVah Main Breaker 1.'
                ]
            ],
            'kvarh_mb1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai KVarh Main Breaker 1.'
                ]
            ],
            'p_mb2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai P Main Breaker 2.'
                ]
            ],
            's_mb2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai S Main Breaker 2.'
                ]
            ],
            'q_mb2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Q Main Breaker 2.'
                ]
            ],
            'pf_mb2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai PF Main Breaker 2.'
                ]
            ],
            'kwh_mb2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai P KWH Breaker 2.'
                ]
            ],
            'kvah_mb2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai KVah Main Breaker 2.'
                ]
            ],
            'kvarh_mb2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai KVarh Main Breaker 2.'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/ipdu/create')->withInput();

        } else {

            //model initialize
            $IpduModel = new IpduModel();
            
            //insert data into database
            $IpduModel->insert([
                'p_mb1'   => $this->request->getPost('p_mb1'),
                's_mb1' => $this->request->getPost('s_mb1'),
                'q_mb1'   => $this->request->getPost('q_mb1'),
                'pf_mb1' => $this->request->getPost('pf_mb1'),
                'kwh_mb1' => $this->request->getPost('kwh_mb1'),
                'kvah_mb1' => $this->request->getPost('kvah_mb1'),
                'kvarh_mb1' => $this->request->getPost('kvarh_mb1'),
                'alert_ipdu1' => $this->request->getPost('alert_ipdu1'),
                'message_ipdu1' => $this->request->getPost('message_ipdu1'),
                'p_mb2'   => $this->request->getPost('p_mb2'),
                's_mb2' => $this->request->getPost('s_mb2'),
                'q_mb2'   => $this->request->getPost('q_mb2'),
                'pf_mb2' => $this->request->getPost('pf_mb2'),
                'kwh_mb2' => $this->request->getPost('kwh_mb2'),
                'kvah_mb2' => $this->request->getPost('kvah_mb2'),
                'kvarh_mb2' => $this->request->getPost('kvarh_mb2'),
                'alert_ipdu2' => $this->request->getPost('alert_ipdu2'),
                'message_ipdu2' => $this->request->getPost('message_ipdu2'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data IPDU Berhasil Disimpan');

            return redirect()->to(base_url('/chiller/create'));
        }

    }

        /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $IpduModel = new IpduModel();
            $Ipdu = $IpduModel->select('ipdu.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = ipdu.pemeriksa_id', 'left');
            $data = $Ipdu->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'P MB-1');
            $sheet->setCellValue('B1', 'S MB-1');
            $sheet->setCellValue('C1', 'Q MB-1');
            $sheet->setCellValue('D1', 'PF MB-1');
            $sheet->setCellValue('E1', 'KWH MB-1');
            $sheet->setCellValue('F1', 'KVah MB-1');
            $sheet->setCellValue('G1', 'KVarh MB-1');
            $sheet->setCellValue('H1', 'Keterangan MB-1');
            $sheet->setCellValue('I1', 'Alarm Message MB-1');
            $sheet->setCellValue('J1', 'P MB-2');
            $sheet->setCellValue('K1', 'S MB-2');
            $sheet->setCellValue('L1', 'Q MB-2');
            $sheet->setCellValue('M1', 'PF MB-2');
            $sheet->setCellValue('N1', 'KWH MB-2');
            $sheet->setCellValue('O1', 'KVah MB-2');
            $sheet->setCellValue('P1', 'KVarh MB-2');
            $sheet->setCellValue('Q1', 'Keterangan MB-2');
            $sheet->setCellValue('R1', 'Alarm Message MB-2');
            $sheet->setCellValue('S1', 'Pemeriksa');
            $sheet->setCellValue('T1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['p_mb1'] . ' kW');
                $sheet->setCellValue('B' . $row, $item['s_mb1'] . ' kVA');
                $sheet->setCellValue('C' . $row, $item['q_mb1'] . ' kvar');
                $sheet->setCellValue('D' . $row, $item['pf_mb1']);
                $sheet->setCellValue('E' . $row, $item['kwh_mb1']);
                $sheet->setCellValue('F' . $row, $item['kvah_mb1']);
                $sheet->setCellValue('G' . $row, $item['kvarh_mb1']);
                $sheet->setCellValue('H' . $row, $item['alert_ipdu1']);
                $sheet->setCellValue('I' . $row, $item['message_ipdu1']);
                $sheet->setCellValue('J' . $row, $item['p_mb2'] . ' kW');
                $sheet->setCellValue('K' . $row, $item['s_mb2'] . ' kVA');
                $sheet->setCellValue('L' . $row, $item['q_mb2'] . ' kvar');
                $sheet->setCellValue('M' . $row, $item['pf_mb2']);
                $sheet->setCellValue('N' . $row, $item['kwh_mb2']);
                $sheet->setCellValue('O' . $row, $item['kvah_mb2']);
                $sheet->setCellValue('P' . $row, $item['kvarh_mb2']);
                $sheet->setCellValue('Q' . $row, $item['alert_ipdu2']);
                $sheet->setCellValue('R' . $row, $item['message_ipdu2']);
                $sheet->setCellValue('S' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('T' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'ipdu_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }
}