<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SystemUpsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SystemUpsController extends Controller
{
    private $title = 'Input Data System UPS';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getChartDataByMonth()
    {
        $bulanSystemUPS = $this->request->getVar('bulanSystemUPS'); // Ambil bulanSystemUPS dari parameter URL
        $tahunSystemUPS = $this->request->getVar('tahunSystemUPS'); // Ambil bulanSystemUPS dari parameter URL
        $SystemUpsModel = new SystemUpsModel();
        $chartData = $SystemUpsModel->getChartDataByMonth($bulanSystemUPS, $tahunSystemUPS); // Ganti ini dengan metode yang sesuai di model

        return $this->response->setJSON($chartData);
    }

    public function getDataByMonth()
    {
        $bulanSystemUPS = $this->request->getVar('bulanSystemUPS');
        $tahunSystemUPS = $this->request->getVar('tahunSystemUPS');
        $SystemUpsModel = new SystemUpsModel();
        $data = $SystemUpsModel->countKerusakanByTypeAndMonth($bulanSystemUPS, $tahunSystemUPS);

        return $this->response->setJSON($data);
    }
    public function index()
    {
        //model initialize
        $SystemUpsModel = new SystemUpsModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $systemUPS = $SystemUpsModel->select('systemups.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = systemups.pemeriksa_id', 'left')
            ->paginate($per_page, 'systemups', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'load_pl1' => [],
            'load_pl2' => [],
            'load_pl3' => [],
            'batery_voltage' => [],
            'temp' => [],
            'time' => []
        ];
        foreach ($systemUPS as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['load_pl1'][] = $record['load_pl1'];
            $chartData['load_pl2'][] = $record['load_pl2'];
            $chartData['load_pl3'][] = $record['load_pl3'];
            $chartData['batery_voltage'][] = $record['batery_voltage'];
            $chartData['temp'][] = $record['temp'];
            $chartData['time'][] = $record['time'];
        }


        $data = array(
            'systemups' => $systemUPS,
            'title' => 'Data System UPS',
            'pager' => $SystemUpsModel->pager,
            'chartData' => $chartData

        );

        return view('systemups', $data);
    }

    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('systemups-create', $data);
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
            'status_ups' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status UPS.'
                ]
            ],
            'load_pl1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan LOAD PRESENTASI L1.'
                ]
            ],
            'load_pl2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan LOAD PRESENTASI L2.'
                ]
            ],
            'load_pl3'  => [
                'rules' => 'required',
                'errors'    => [
                    'required' => 'Masukkan LOAD PRESENTASI L3'
                ]
            ],
            'batery_voltage'  => [
                'rules' => 'required',
                'errors'    => [
                    'required' => 'Masukkan BATERY VOLTAGE'
                ]
            ],
            'temp'  => [
                'rules' => 'required',
                'errors'    => [
                    'required' => 'Masukkan TEMP'
                ]
            ],
            'time'  => [
                'rules' => 'required',
                'errors'    => [
                    'required' => 'Masukkan TIME'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return redirect()->to('/systemups/create')->withInput();
        } else {

            //model initialize
            $SystemUpsModel = new SystemUpsModel();

            //insert data into database
            $SystemUpsModel->insert([
                'status_ups'   => $this->request->getPost('status_ups'),
                'load_pl1' => $this->request->getPost('load_pl1'),
                'load_pl2' => $this->request->getPost('load_pl2'),
                'load_pl3' => $this->request->getPost('load_pl3'),
                'batery_voltage' => $this->request->getPost('batery_voltage'),
                'temp' => $this->request->getPost('temp'),
                'time' => $this->request->getPost('time'),
                'alert_systemups' => $this->request->getPost('alert_systemups'),
                'message_systemups' => $this->request->getPost('message_systemups'),
                'rusak_systemups' => $this->request->getPost('rusak_systemups'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data System UPS Berhasil Disimpan');

            return redirect()->to(base_url('/modulups/create'));
        }
    }

    /**
     * Fungsi untuk ekspor data ke file Excel
     */
    public function exportToExcel()
    {
        $SystemUpsModel = new SystemUpsModel();
        $SystemUps = $SystemUpsModel->select('systemups.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = systemups.pemeriksa_id', 'left');
        $data = $SystemUps->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status UPS');
        $sheet->setCellValue('B1', 'Load Presentasi L1');
        $sheet->setCellValue('C1', 'Load Presentasi L2');
        $sheet->setCellValue('D1', 'Load Presentasi L3');
        $sheet->setCellValue('E1', 'Batery Voltage');
        $sheet->setCellValue('F1', 'Temperature');
        $sheet->setCellValue('G1', 'Time');
        $sheet->setCellValue('H1', 'Keterangan');
        $sheet->setCellValue('I1', 'Alarm Message');
        $sheet->setCellValue('J1', 'Kerusakan');
        $sheet->setCellValue('K1', 'Pemeriksa');
        $sheet->setCellValue('L1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['status_ups']);
            $sheet->setCellValue('B' . $row, $item['load_pl1'] . '%');
            $sheet->setCellValue('C' . $row, $item['load_pl2'] . '%');
            $sheet->setCellValue('D' . $row, $item['load_pl3'] . '%');
            $sheet->setCellValue('E' . $row, $item['batery_voltage'] . ' Volt');
            $sheet->setCellValue('F' . $row, $item['temp'] . '°C');
            $sheet->setCellValue('G' . $row, $item['time'] . ' Minutes');
            $sheet->setCellValue('H' . $row, $item['alert_systemups']);
            $sheet->setCellValue('I' . $row, $item['message_systemups']);
            $sheet->setCellValue('J' . $row, $item['rusak_systemups']);
            $sheet->setCellValue('K' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('L' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'systemups_data.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output file
        $writer->save('php://output');
    }
}
