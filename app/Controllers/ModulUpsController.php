<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModulUpsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ModulUpsController extends Controller
{
    private $title = 'Input Data Modul UPS';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getDataByMonth()
    {
        $bulanModulUps = $this->request->getVar('bulanModulUps'); // Ambil bulanModulUps dari parameter URL
        $tahunModulUps = $this->request->getVar('tahunModulUps'); // Ambil bulanModulUps dari parameter URL
        $ModulUpsModel = new ModulUpsModel();
        $chartData = $ModulUpsModel->countKerusakanByTypeAndMonth($bulanModulUps, $tahunModulUps); // Ganti ini dengan metode yang sesuai di model

        $formattedData = [];
        foreach ($chartData as $data) {
            // Format data sesuai dengan yang dibutuhkan oleh grafik
            $formattedData[] = [
                'rusak_modulups1' => $data['rusak_modulups1'],
                'rusak_modulups2' => $data['rusak_modulups2'],
                'rusak_modulups3' => $data['rusak_modulups3'],
                'rusak_modulups4' => $data['rusak_modulups4'],
                'rusak_modulups5' => $data['rusak_modulups5'],
                'rusak_modulups6' => $data['rusak_modulups6'],
                'rusak_modulups7' => $data['rusak_modulups7'],
                'jumlah_kerusakan_modulups1' => $data['jumlah_kerusakan_modulups1'],
                'jumlah_kerusakan_modulups2' => $data['jumlah_kerusakan_modulups2'],
                'jumlah_kerusakan_modulups3' => $data['jumlah_kerusakan_modulups3'],
                'jumlah_kerusakan_modulups4' => $data['jumlah_kerusakan_modulups4'],
                'jumlah_kerusakan_modulups5' => $data['jumlah_kerusakan_modulups5'],
                'jumlah_kerusakan_modulups6' => $data['jumlah_kerusakan_modulups6'],
                'jumlah_kerusakan_modulups7' => $data['jumlah_kerusakan_modulups7']
            ];
        }
        return $this->response->setJSON($formattedData);
    }



    public function index()
    {
        //model initialize
        $ModulUpsModel = new ModulUpsModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $ModulUPS = $ModulUpsModel->select('modulups.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = modulups.pemeriksa_id', 'left')
            ->paginate($per_page, 'modulups', $page);

        $data = array(
            'modulups' => $ModulUPS,
            'title' => 'Data Modul UPS',
            'pager' => $ModulUpsModel->pager,

        );

        return view('modulups', $data);
    }

    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('modulups-create', $data);
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
            'statusups1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 1.'
                ]
            ],
            'statusups2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 2.'
                ]
            ],
            'statusups3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 3.'
                ]
            ],
            'statusups4'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 4.'
                ]
            ],
            'statusups5'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 5.'
                ]
            ],
            'statusups6'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 6.'
                ]
            ],
            'statusups7'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Modul UPS 7.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return redirect()->to('/modulups/create')->withInput();
        } else {

            //model initialize
            $ModulUpsModel = new ModulUpsModel();

            //insert data into database
            $ModulUpsModel->insert([
                'statusups1' => $this->request->getPost('statusups1'),
                'alert_modulups1' => $this->request->getPost('alert_modulups1'),
                'message_modulups1' => $this->request->getPost('message_modulups1'),
                'rusak_modulups1' => $this->request->getPost('rusak_modulups1'),
                'statusups2' => $this->request->getPost('statusups2'),
                'alert_modulups2' => $this->request->getPost('alert_modulups2'),
                'message_modulups2' => $this->request->getPost('message_modulups2'),
                'rusak_modulups2' => $this->request->getPost('rusak_modulups2'),
                'statusups3' => $this->request->getPost('statusups3'),
                'alert_modulups3' => $this->request->getPost('alert_modulups3'),
                'message_modulups3' => $this->request->getPost('message_modulups3'),
                'rusak_modulups3' => $this->request->getPost('rusak_modulups3'),
                'statusups4' => $this->request->getPost('statusups4'),
                'alert_modulups4' => $this->request->getPost('alert_modulups4'),
                'message_modulups4' => $this->request->getPost('message_modulups4'),
                'rusak_modulups4' => $this->request->getPost('rusak_modulups4'),
                'statusups5' => $this->request->getPost('statusups5'),
                'alert_modulups5' => $this->request->getPost('alert_modulups5'),
                'message_modulups5' => $this->request->getPost('message_modulups5'),
                'rusak_modulups5' => $this->request->getPost('rusak_modulups5'),
                'statusups6' => $this->request->getPost('statusups6'),
                'alert_modulups6' => $this->request->getPost('alert_modulups6'),
                'message_modulups6' => $this->request->getPost('message_modulups6'),
                'rusak_modulups6' => $this->request->getPost('rusak_modulups6'),
                'statusups7' => $this->request->getPost('statusups7'),
                'alert_modulups7' => $this->request->getPost('alert_modulups7'),
                'message_modulups7' => $this->request->getPost('message_modulups7'),
                'rusak_modulups7' => $this->request->getPost('rusak_modulups7'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Modul UPS Berhasil Disimpan');

            return redirect()->to(base_url('/modulups/create'));
        }
    }

    /**
     * Fungsi untuk ekspor data ke file Excel
     */
    public function exportToExcel()
    {
        $ModulUpsModel = new ModulUpsModel();
        $ModulUps = $ModulUpsModel->select('modulups.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = modulups.pemeriksa_id', 'left');
        $data = $ModulUps->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status UPS 1');
        $sheet->setCellValue('B1', 'Kondisi UPS 1');
        $sheet->setCellValue('C1', 'Alarm Message UPS 1');
        $sheet->setCellValue('D1', 'Kerusakan UPS 1');
        $sheet->setCellValue('E1', 'Status UPS 2');
        $sheet->setCellValue('F1', 'Kondisi UPS 2');
        $sheet->setCellValue('G1', 'Alarm Message UPS 2');
        $sheet->setCellValue('H1', 'Kerusakan UPS 2');
        $sheet->setCellValue('I1', 'Status UPS 3');
        $sheet->setCellValue('J1', 'Kondisi UPS 3');
        $sheet->setCellValue('K1', 'Alarm Message UPS 3');
        $sheet->setCellValue('L1', 'Kerusakan UPS 3');
        $sheet->setCellValue('M1', 'Status UPS 4');
        $sheet->setCellValue('N1', 'Kondisi UPS 4');
        $sheet->setCellValue('O1', 'Alarm Message UPS 4');
        $sheet->setCellValue('P1', 'Kerusakan UPS 4');
        $sheet->setCellValue('Q1', 'Status UPS 5');
        $sheet->setCellValue('R1', 'Kondisi UPS 5');
        $sheet->setCellValue('S1', 'Alarm Message UPS 5');
        $sheet->setCellValue('T1', 'Kerusakan UPS 5');
        $sheet->setCellValue('U1', 'Status UPS 6');
        $sheet->setCellValue('V1', 'Kondisi UPS 6');
        $sheet->setCellValue('W1', 'Alarm Message UPS 6');
        $sheet->setCellValue('X1', 'Kerusakan UPS 6');
        $sheet->setCellValue('Y1', 'Status UPS 7');
        $sheet->setCellValue('Z1', 'Kondisi UPS 7');
        $sheet->setCellValue('AA1', 'Alarm Message UPS 7');
        $sheet->setCellValue('AB1', 'Kerusakan UPS 7');
        $sheet->setCellValue('AC1', 'Pemeriksa');
        $sheet->setCellValue('AD1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['statusups1']);
            $sheet->setCellValue('B' . $row, $item['alert_modulups1']);
            $sheet->setCellValue('C' . $row, $item['message_modulups1']);
            $sheet->setCellValue('D' . $row, $item['rusak_modulups1']);
            $sheet->setCellValue('E' . $row, $item['statusups2']);
            $sheet->setCellValue('F' . $row, $item['alert_modulups2']);
            $sheet->setCellValue('G' . $row, $item['message_modulups2']);
            $sheet->setCellValue('H' . $row, $item['rusak_modulups2']);
            $sheet->setCellValue('I' . $row, $item['statusups3']);
            $sheet->setCellValue('J' . $row, $item['alert_modulups3']);
            $sheet->setCellValue('K' . $row, $item['message_modulups3']);
            $sheet->setCellValue('L' . $row, $item['rusak_modulups3']);
            $sheet->setCellValue('M' . $row, $item['statusups4']);
            $sheet->setCellValue('N' . $row, $item['alert_modulups4']);
            $sheet->setCellValue('O' . $row, $item['message_modulups4']);
            $sheet->setCellValue('P' . $row, $item['rusak_modulups4']);
            $sheet->setCellValue('Q' . $row, $item['statusups5']);
            $sheet->setCellValue('R' . $row, $item['alert_modulups5']);
            $sheet->setCellValue('S' . $row, $item['message_modulups5']);
            $sheet->setCellValue('T' . $row, $item['rusak_modulups5']);
            $sheet->setCellValue('U' . $row, $item['statusups6']);
            $sheet->setCellValue('V' . $row, $item['alert_modulups6']);
            $sheet->setCellValue('W' . $row, $item['message_modulups6']);
            $sheet->setCellValue('X' . $row, $item['rusak_modulups6']);
            $sheet->setCellValue('Y' . $row, $item['statusups7']);
            $sheet->setCellValue('Z' . $row, $item['alert_modulups7']);
            $sheet->setCellValue('AA' . $row, $item['message_modulups7']);
            $sheet->setCellValue('AB' . $row, $item['rusak_modulups7']);
            $sheet->setCellValue('AC' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('AD' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'modulups_data.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output file
        $writer->save('php://output');
    }
}
