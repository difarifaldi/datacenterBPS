<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FireModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FireController extends Controller
{
    private $title = 'Input Data Fire System';
    protected $helpers = ['form'];
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $FireModel = new FireModel();

        $Fire = $FireModel->select('fire_system.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
        ->join('pemeriksa', 'pemeriksa.id = fire_system.pemeriksa_id', 'left');


        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'fire' => $FireModel->paginate(25, 'post'),
            'title' => 'Data Fire System',
            'pager' => $FireModel->pager
        );

        return view('fire', $data);
    }

     /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('fire-create',$data);
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
            'status'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Fire System'
                ]
                ],
            'message_fire'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Message Fire System'
                ]
                ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return redirect()->to('/fire/create')->withInput();

        } else {

            //model initialize
            $FireModel = new FireModel();
            
            //insert data into database
            $FireModel->insert([
                'status' => $this->request->getPost('status'),
                'message_fire' => $this->request->getPost('message_fire'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Disimpan');

            return redirect()->to(base_url('fire'));
        }

    }

    /**
         * Fungsi untuk ekspor data ke file Excel
         */
        public function exportToExcel()
        {
            $FireModel = new FireModel();
            $Fire = $FireModel->select('fire_system.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = fire_system.pemeriksa_id', 'left');
            $data = $Fire->findAll(); // Ambil semua data dari model

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Status');
            $sheet->setCellValue('B1', 'Message');
            $sheet->setCellValue('C1', 'Pemeriksa');
            $sheet->setCellValue('D1', 'Waktu');

            // Data baris
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $item['status']);
                $sheet->setCellValue('B' . $row, $item['message_fire']);
                $sheet->setCellValue('C' . $row, $item['pemeriksa_nama']);
                $sheet->setCellValue('D' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
                $row++;
            }

            $filename = 'firesystem_data.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header untuk download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output file
            $writer->save('php://output');
        }
}