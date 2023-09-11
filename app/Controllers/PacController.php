<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PacController extends Controller
{
    private $title = 'Input Data PAC';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getDataByMonth()
    {
        $bulanPac = $this->request->getVar('bulanPac'); // Ambil bulanPac dari parameter URL
        $tahunPac = $this->request->getVar('tahunPac'); // Ambil bulanPac dari parameter URL
        $PacModel = new PacModel();
        $chartData = $PacModel->countKerusakanByTypeAndMonth($bulanPac, $tahunPac); // Ganti ini dengan metode yang sesuai di model

        $formattedData = [];
        foreach ($chartData as $data) {
            // Format data sesuai dengan yang dibutuhkan oleh grafik
            $formattedData[] = [
                'rusak_pac1' => $data['rusak_pac1'],
                'rusak_pac2' => $data['rusak_pac2'],
                'rusak_pac3' => $data['rusak_pac3'],
                'rusak_pac4' => $data['rusak_pac4'],
                'rusak_pac5' => $data['rusak_pac5'],
                'rusak_pac6' => $data['rusak_pac6'],
                'jumlah_kerusakan_pac1' => $data['jumlah_kerusakan_pac1'],
                'jumlah_kerusakan_pac2' => $data['jumlah_kerusakan_pac2'],
                'jumlah_kerusakan_pac3' => $data['jumlah_kerusakan_pac3'],
                'jumlah_kerusakan_pac4' => $data['jumlah_kerusakan_pac4'],
                'jumlah_kerusakan_pac5' => $data['jumlah_kerusakan_pac5'],
                'jumlah_kerusakan_pac6' => $data['jumlah_kerusakan_pac6']
            ];
        }
        return $this->response->setJSON($formattedData);
    }
    public function getChartDataByMonth()
    {
        $bulanPac = $this->request->getVar('bulanPac'); // Ambil bulanPac dari parameter URL
        $tahunPac = $this->request->getVar('tahunPac'); // Ambil bulanPac dari parameter URL
        $PacModel = new PacModel();
        $chartData = $PacModel->getChartDataByMonth($bulanPac, $tahunPac); // Ganti ini dengan metode yang sesuai di model

        return $this->response->setJSON($chartData);
    }

    public function index()
    {
        //model initialize
        $PacModel = new PacModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $Pac = $PacModel->select('pac.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = pac.pemeriksa_id', 'left')
            ->paginate($per_page, 'pac', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_pac1' => [],
            'status_pac2' => [],
            'status_pac3' => [],
            'status_pac4' => [],
            'status_pac5' => [],
            'status_pac6' => [],
            'suhu_pac1' => [],
            'suhu_pac2' => [],
            'suhu_pac3' => [],
            'suhu_pac4' => [],
            'suhu_pac5' => [],
            'suhu_pac6' => [],
            'temp_pac1' => [],
            'temp_pac2' => [],
            'temp_pac3' => [],
            'temp_pac4' => [],
            'temp_pac5' => [],
            'temp_pac6' => [],
        ];
        foreach ($Pac as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_pac1'][] = $record['status_pac1'];
            $chartData['status_pac2'][] = $record['status_pac2'];
            $chartData['status_pac3'][] = $record['status_pac3'];
            $chartData['status_pac4'][] = $record['status_pac4'];
            $chartData['status_pac5'][] = $record['status_pac5'];
            $chartData['status_pac6'][] = $record['status_pac6'];
            $chartData['suhu_pac1'][] = $record['suhu_pac1'];
            $chartData['suhu_pac2'][] = $record['suhu_pac2'];
            $chartData['suhu_pac3'][] = $record['suhu_pac3'];
            $chartData['suhu_pac4'][] = $record['suhu_pac4'];
            $chartData['suhu_pac5'][] = $record['suhu_pac5'];
            $chartData['suhu_pac6'][] = $record['suhu_pac6'];
            $chartData['temp_pac1'][] = $record['temp_pac1'];
            $chartData['temp_pac2'][] = $record['temp_pac2'];
            $chartData['temp_pac3'][] = $record['temp_pac3'];
            $chartData['temp_pac4'][] = $record['temp_pac4'];
            $chartData['temp_pac5'][] = $record['temp_pac5'];
            $chartData['temp_pac6'][] = $record['temp_pac6'];
        }

        $data = array(
            'pac' => $Pac,
            'title' => 'Data PAC',
            'pager' => $PacModel->pager,
            'chartData' => $chartData
        );

        return view('pac', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('pac-create', $data);
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
            'status_pac1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 1.'
                ]
            ],
            'status_pac2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 2.'
                ]
            ],
            'status_pac3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 3.'
                ]
            ],
            'status_pac4'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 4.'
                ]
            ],
            'status_pac5'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 5.'
                ]
            ],
            'status_pac6'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status PAC 6.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return redirect()->to('/pac/create')->withInput();
        } else {

            //model initialize
            $PacModel = new PacModel();

            //insert data into database
            $PacModel->insert([
                'status_pac1' => $this->request->getPost('status_pac1'),
                'status_pac2' => $this->request->getPost('status_pac2'),
                'status_pac3' => $this->request->getPost('status_pac3'),
                'status_pac4' => $this->request->getPost('status_pac4'),
                'status_pac5' => $this->request->getPost('status_pac5'),
                'status_pac6' => $this->request->getPost('status_pac6'),
                'suhu_pac1'   => $this->request->getPost('suhu_pac1'),
                'suhu_pac2'   => $this->request->getPost('suhu_pac2'),
                'suhu_pac3'   => $this->request->getPost('suhu_pac3'),
                'suhu_pac4'   => $this->request->getPost('suhu_pac4'),
                'suhu_pac5'   => $this->request->getPost('suhu_pac5'),
                'suhu_pac6'   => $this->request->getPost('suhu_pac6'),
                'temp_pac1' => $this->request->getPost('temp_pac1'),
                'temp_pac2' => $this->request->getPost('temp_pac2'),
                'temp_pac3' => $this->request->getPost('temp_pac3'),
                'temp_pac4' => $this->request->getPost('temp_pac4'),
                'temp_pac5' => $this->request->getPost('temp_pac5'),
                'temp_pac6' => $this->request->getPost('temp_pac6'),
                'alert_pac1' => $this->request->getPost('alert_pac1'),
                'alert_pac2' => $this->request->getPost('alert_pac2'),
                'alert_pac3' => $this->request->getPost('alert_pac3'),
                'alert_pac4' => $this->request->getPost('alert_pac4'),
                'alert_pac5' => $this->request->getPost('alert_pac5'),
                'alert_pac6' => $this->request->getPost('alert_pac6'),
                'message_pac1' => $this->request->getPost('message_pac1'),
                'message_pac2' => $this->request->getPost('message_pac2'),
                'message_pac3' => $this->request->getPost('message_pac3'),
                'message_pac4' => $this->request->getPost('message_pac4'),
                'message_pac5' => $this->request->getPost('message_pac5'),
                'message_pac6' => $this->request->getPost('message_pac6'),
                'rusak_pac1' => $this->request->getPost('rusak_pac1'),
                'rusak_pac2' => $this->request->getPost('rusak_pac2'),
                'rusak_pac3' => $this->request->getPost('rusak_pac3'),
                'rusak_pac4' => $this->request->getPost('rusak_pac4'),
                'rusak_pac5' => $this->request->getPost('rusak_pac5'),
                'rusak_pac6' => $this->request->getPost('rusak_pac6'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Disimpan');

            return redirect()->to(base_url('/ipdu/create'));
        }
    }

    /**
     * Fungsi untuk ekspor data ke file Excel
     */
    public function exportToExcel()
    {
        $PacModel = new PacModel();
        $Pac = $PacModel->select('pac.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = pac.pemeriksa_id', 'left');
        $data = $Pac->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status PAC 1');
        $sheet->setCellValue('B1', 'Suhu PAC 1');
        $sheet->setCellValue('C1', 'Temperature PAC 1');
        $sheet->setCellValue('D1', 'Keterangan PAC 1');
        $sheet->setCellValue('E1', 'Alarm Message PAC 1');
        $sheet->setCellValue('F1', 'Kerusakan PAC 1');
        $sheet->setCellValue('G1', 'Status PAC 2');
        $sheet->setCellValue('H1', 'Suhu PAC 2');
        $sheet->setCellValue('I1', 'Temperature PAC 2');
        $sheet->setCellValue('J1', 'Keterangan PAC 2');
        $sheet->setCellValue('K1', 'Alarm Message PAC 2');
        $sheet->setCellValue('L1', 'Kerusakan PAC 2');
        $sheet->setCellValue('M1', 'Status PAC 3');
        $sheet->setCellValue('N1', 'Suhu PAC 3');
        $sheet->setCellValue('O1', 'Temperature PAC 3');
        $sheet->setCellValue('P1', 'Keterangan PAC 3');
        $sheet->setCellValue('Q1', 'Alarm Message PAC 3');
        $sheet->setCellValue('R1', 'Kerusakan PAC 3');
        $sheet->setCellValue('S1', 'Status PAC 4');
        $sheet->setCellValue('T1', 'Suhu PAC 4');
        $sheet->setCellValue('U1', 'Temperature PAC 4');
        $sheet->setCellValue('V1', 'Keterangan PAC 4');
        $sheet->setCellValue('W1', 'Alarm Message PAC 4');
        $sheet->setCellValue('X1', 'Kerusakan PAC 4');
        $sheet->setCellValue('Y1', 'Status PAC 5');
        $sheet->setCellValue('Z1', 'Suhu PAC 5');
        $sheet->setCellValue('AA1', 'Temperature PAC 5');
        $sheet->setCellValue('AB1', 'Keterangan PAC 5');
        $sheet->setCellValue('AC1', 'Alarm Message PAC 5');
        $sheet->setCellValue('AD1', 'Kerusakan PAC 5');
        $sheet->setCellValue('AE1', 'Status PAC 6');
        $sheet->setCellValue('AF1', 'Suhu PAC 6');
        $sheet->setCellValue('AG1', 'Temperature PAC 6');
        $sheet->setCellValue('AH1', 'Keterangan PAC 6');
        $sheet->setCellValue('AI1', 'Alarm Message PAC 6');
        $sheet->setCellValue('AJ1', 'Kerusakan PAC 6');
        $sheet->setCellValue('AK1', 'Pemeriksa');
        $sheet->setCellValue('AL1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['status_pac1']);
            $sheet->setCellValue('B' . $row, $item['suhu_pac1'] . '°C');
            $sheet->setCellValue('C' . $row, $item['temp_pac1'] . ' RH');
            $sheet->setCellValue('D' . $row, $item['alert_pac1']);
            $sheet->setCellValue('E' . $row, $item['message_pac1']);
            $sheet->setCellValue('F' . $row, $item['rusak_pac1']);
            $sheet->setCellValue('G' . $row, $item['status_pac2']);
            $sheet->setCellValue('H' . $row, $item['suhu_pac2'] . '°C');
            $sheet->setCellValue('I' . $row, $item['temp_pac2'] . ' RH');
            $sheet->setCellValue('J' . $row, $item['alert_pac2']);
            $sheet->setCellValue('K' . $row, $item['message_pac2']);
            $sheet->setCellValue('L' . $row, $item['rusak_pac2']);
            $sheet->setCellValue('M' . $row, $item['status_pac3']);
            $sheet->setCellValue('N' . $row, $item['suhu_pac3'] . '°C');
            $sheet->setCellValue('O' . $row, $item['temp_pac3'] . ' RH');
            $sheet->setCellValue('P' . $row, $item['alert_pac3']);
            $sheet->setCellValue('Q' . $row, $item['message_pac3']);
            $sheet->setCellValue('R' . $row, $item['rusak_pac3']);
            $sheet->setCellValue('S' . $row, $item['status_pac4']);
            $sheet->setCellValue('T' . $row, $item['suhu_pac4'] . '°C');
            $sheet->setCellValue('U' . $row, $item['temp_pac4'] . ' RH');
            $sheet->setCellValue('V' . $row, $item['alert_pac4']);
            $sheet->setCellValue('W' . $row, $item['message_pac4']);
            $sheet->setCellValue('X' . $row, $item['rusak_pac4']);
            $sheet->setCellValue('Y' . $row, $item['status_pac5']);
            $sheet->setCellValue('Z' . $row, $item['suhu_pac5'] . '°C');
            $sheet->setCellValue('AA' . $row, $item['temp_pac5'] . ' RH');
            $sheet->setCellValue('AB' . $row, $item['alert_pac5']);
            $sheet->setCellValue('AC' . $row, $item['message_pac5']);
            $sheet->setCellValue('AD' . $row, $item['rusak_pac5']);
            $sheet->setCellValue('AE' . $row, $item['status_pac6']);
            $sheet->setCellValue('AF' . $row, $item['suhu_pac6'] . '°C');
            $sheet->setCellValue('AG' . $row, $item['temp_pac6'] . ' RH');
            $sheet->setCellValue('AH' . $row, $item['alert_pac6']);
            $sheet->setCellValue('AI' . $row, $item['message_pac6']);
            $sheet->setCellValue('AJ' . $row, $item['rusak_pac6']);
            $sheet->setCellValue('AK' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('AL' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'pac_data.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output file
        $writer->save('php://output');
    }
}
