<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PemeriksaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PemeriksaController extends Controller
{
    private $title = 'Input Data Pemeriksa';
    protected $helpers = ['form'];

    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $PemeriksaModel = new PemeriksaModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'pemeriksa' => $PemeriksaModel->paginate(25, 'post'),
            'pager' => $PemeriksaModel->pager,
            'title' => 'Data Pemeriksa'
        );

        return view('pemeriksa', $data);
    }

    public function create()
    {

        $data = [
            'title' => $this->title
        ];
        
        return view('pemeriksa-create', $data);
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
       

        //define validation
        if (!$this->validate([
            'jam' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Jam.'
                ]
            ],
            'tanggal'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Pemeriksa.'
                ]
            ]
        ])) {
            return redirect()->to('/pemeriksa/create')->withInput();
        }

        //model initialize
        $PemeriksaModel = new PemeriksaModel();

        //insert data into database
        $pemeriksaId = $PemeriksaModel->insert([
            'jam'   => $this->request->getPost('jam'),
            'tanggal' => $this->request->getPost('tanggal'),
            'nama' => $this->request->getPost('nama'),
        ]);

        // Set pemeriksa_id in session
        session()->set('pemeriksa_id', $pemeriksaId);

        //flash message
        session()->setFlashdata('message', 'Data Pemeriksa Berhasil Disimpan');

        return redirect()->to('/utility/create');
    }

        /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $PemeriksaModel = new PemeriksaModel();
            $data = $PemeriksaModel->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Jam');
            $sheet->setCellValue('B1', 'Tanggal');
            $sheet->setCellValue('C1', 'Nama');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, date('H:i', strtotime($item['jam'])));
                $sheet->setCellValue('B' . $row, date('d, F Y', strtotime($item['tanggal'])));
                $sheet->setCellValue('C' . $row, $item['nama']);
                $row++;
            }

            $filename = 'pemeriksa_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }
}