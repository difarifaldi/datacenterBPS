<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChillerModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ChillerController extends Controller
{
    private $title = 'Input Data Chiller';
    protected $helpers = ['form'];
    /**
     * index function
     */

    public function getChartDataByMonth()
    {
        $bulanChiller = $this->request->getVar('bulanChiller'); // Ambil bulanChiller dari parameter URL
        $tahunChiller = $this->request->getVar('tahunChiller'); // Ambil tahunChiller dari parameter URL
        $ChillerModel = new ChillerModel();
        $chartData = $ChillerModel->getChartDataByMonth($bulanChiller, $tahunChiller); // Ganti ini dengan metode yang sesuai di model

        return $this->response->setJSON($chartData);
    }

    public function getDataByMonth()
    {
        $bulanChiller = $this->request->getVar('bulanChiller');
        $tahunChiller = $this->request->getVar('tahunChiller');
        $ChillerModel = new ChillerModel();
        $data = $ChillerModel->countKerusakanByTypeAndMonth($bulanChiller, $tahunChiller);

        return $this->response->setJSON($data);
    }
    public function getDataByMonth2()
    {
        $bulanChiller = $this->request->getVar('bulanChiller');
        $tahunChiller = $this->request->getVar('tahunChiller');
        $ChillerModel = new ChillerModel();
        $data = $ChillerModel->countKerusakanByTypeAndMonth($bulanChiller, $tahunChiller);

        return $this->response->setJSON($data);
    }
    public function getDataByMonth3()
    {
        $bulanChiller = $this->request->getVar('bulanChiller');
        $tahunChiller = $this->request->getVar('tahunChiller');
        $ChillerModel = new ChillerModel();
        $data = $ChillerModel->countKerusakanByTypeAndMonth($bulanChiller, $tahunChiller);
        return $this->response->setJSON($data);
    }

    public function index()
    {
        //model initialize
        $ChillerModel = new ChillerModel();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left')
            ->paginate($per_page, 'chiller', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_chiller1' => [],
            'out_temp_chiller1' => [],
            'in_temp_chiller1' => [],
            'amb_temp_chiller1' => [],
            'free_temp_chiller1' => [],
            'setpoint_chiller1' => [],
            'pump1_chiller1' => [],
            'pump2_chiller1' => [],
            'conden1_chiller1' => [],
            'conden2_chiller1' => [],
            'cooling_chiller1' => [],
            'freecooling_chiller1' => [],
            'suction_chiller1' => [],
            'discharge_chiller1' => [],
            'flowrate_chiller1' => [],
            'current_con_chiller1' => [],
            'voltage_chiller1' => [],
            'power_con_chiller1' => [],
            'eer_chiller1' => [],
            'power_sup_chiller1' => []
        ];

        foreach ($chiller as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_chiller1'][] = $record['status_chiller1'];
            $chartData['out_temp_chiller1'][] = $record['out_temp_chiller1'];
            $chartData['in_temp_chiller1'][] = $record['in_temp_chiller1'];
            $chartData['amb_temp_chiller1'][] = $record['amb_temp_chiller1'];
            $chartData['free_temp_chiller1'][] = $record['free_temp_chiller1'];
            $chartData['setpoint_chiller1'][] = $record['setpoint_chiller1'];
            $chartData['pump1_chiller1'][] = $record['pump1_chiller1'];
            $chartData['pump2_chiller1'][] = $record['pump2_chiller1'];
            $chartData['conden1_chiller1'][] = $record['conden1_chiller1'];
            $chartData['conden2_chiller1'][] = $record['conden2_chiller1'];
            $chartData['cooling_chiller1'][] = $record['cooling_chiller1'];
            $chartData['freecooling_chiller1'][] = $record['freecooling_chiller1'];
            $chartData['suction_chiller1'][] = $record['suction_chiller1'];
            $chartData['discharge_chiller1'][] = $record['discharge_chiller1'];
            $chartData['flowrate_chiller1'][] = $record['flowrate_chiller1'];
            $chartData['current_con_chiller1'][] = $record['current_con_chiller1'];
            $chartData['voltage_chiller1'][] = $record['voltage_chiller1'];
            $chartData['power_con_chiller1'][] = $record['power_con_chiller1'];
            $chartData['eer_chiller1'][] = $record['eer_chiller1'];
            $chartData['power_sup_chiller1'][] = $record['power_sup_chiller1'];
        }

        $data = [
            'chiller' => $chiller,
            'pager' => $ChillerModel->pager,
            'title' => 'Data Ruang Chiller',
            'chartData' => $chartData
        ];

        return view('chiller', $data);
    }

    public function index2()
    {
        //model initialize
        $ChillerModel = new ChillerModel();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left')
            ->paginate($per_page, 'chiller', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_chiller2' => [],
            'out_temp_chiller2' => [],
            'in_temp_chiller2' => [],
            'amb_temp_chiller2' => [],
            'free_temp_chiller2' => [],
            'setpoint_chiller2' => [],
            'pump1_chiller2' => [],
            'pump2_chiller2' => [],
            'conden1_chiller2' => [],
            'conden2_chiller2' => [],
            'cooling_chiller2' => [],
            'freecooling_chiller2' => [],
            'suction_chiller2' => [],
            'discharge_chiller2' => [],
            'flowrate_chiller2' => [],
            'current_con_chiller2' => [],
            'voltage_chiller2' => [],
            'power_con_chiller2' => [],
            'eer_chiller2' => [],
            'power_sup_chiller2' => []
        ];

        foreach ($chiller as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_chiller2'][] = $record['status_chiller2'];
            $chartData['out_temp_chiller2'][] = $record['out_temp_chiller2'];
            $chartData['in_temp_chiller2'][] = $record['in_temp_chiller2'];
            $chartData['amb_temp_chiller2'][] = $record['amb_temp_chiller2'];
            $chartData['free_temp_chiller2'][] = $record['free_temp_chiller2'];
            $chartData['setpoint_chiller2'][] = $record['setpoint_chiller2'];
            $chartData['pump1_chiller2'][] = $record['pump1_chiller2'];
            $chartData['pump2_chiller2'][] = $record['pump2_chiller2'];
            $chartData['conden1_chiller2'][] = $record['conden1_chiller2'];
            $chartData['conden2_chiller2'][] = $record['conden2_chiller2'];
            $chartData['cooling_chiller2'][] = $record['cooling_chiller2'];
            $chartData['freecooling_chiller2'][] = $record['freecooling_chiller2'];
            $chartData['suction_chiller2'][] = $record['suction_chiller2'];
            $chartData['discharge_chiller2'][] = $record['discharge_chiller2'];
            $chartData['flowrate_chiller2'][] = $record['flowrate_chiller2'];
            $chartData['current_con_chiller2'][] = $record['current_con_chiller2'];
            $chartData['voltage_chiller2'][] = $record['voltage_chiller2'];
            $chartData['power_con_chiller2'][] = $record['power_con_chiller2'];
            $chartData['eer_chiller2'][] = $record['eer_chiller2'];
            $chartData['power_sup_chiller2'][] = $record['power_sup_chiller2'];
        }

        $data = [
            'chiller' => $chiller,
            'pager' => $ChillerModel->pager,
            'title' => 'Data Ruang Chiller',
            'chartData' => $chartData
        ];

        return view('chiller2', $data);
    }

    public function index3()
    {
        //model initialize
        $ChillerModel = new ChillerModel();

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $per_page = 25;
        $chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left')
            ->paginate($per_page, 'chiller', $page);

        // Persiapan data untuk grafik
        $chartData = [
            'labels' => [],
            'status_chiller3' => [],
            'out_temp_chiller3' => [],
            'in_temp_chiller3' => [],
            'amb_temp_chiller3' => [],
            'free_temp_chiller3' => [],
            'setpoint_chiller3' => [],
            'pump1_chiller3' => [],
            'pump2_chiller3' => [],
            'conden1_chiller3' => [],
            'conden2_chiller3' => [],
            'cooling_chiller3' => [],
            'freecooling_chiller3' => [],
            'suction_chiller3' => [],
            'discharge_chiller3' => [],
            'flowrate_chiller3' => [],
            'current_con_chiller3' => [],
            'voltage_chiller3' => [],
            'power_con_chiller3' => [],
            'eer_chiller3' => [],
            'power_sup_chiller3' => []
        ];

        foreach ($chiller as $record) {
            $chartData['labels'][] = date('d F Y', strtotime($record['pemeriksa_tanggal']));
            $chartData['status_chiller3'][] = $record['status_chiller3'];
            $chartData['out_temp_chiller3'][] = $record['out_temp_chiller3'];
            $chartData['in_temp_chiller3'][] = $record['in_temp_chiller3'];
            $chartData['amb_temp_chiller3'][] = $record['amb_temp_chiller3'];
            $chartData['free_temp_chiller3'][] = $record['free_temp_chiller3'];
            $chartData['setpoint_chiller3'][] = $record['setpoint_chiller3'];
            $chartData['pump1_chiller3'][] = $record['pump1_chiller3'];
            $chartData['pump2_chiller3'][] = $record['pump2_chiller3'];
            $chartData['conden1_chiller3'][] = $record['conden1_chiller3'];
            $chartData['conden2_chiller3'][] = $record['conden2_chiller3'];
            $chartData['cooling_chiller3'][] = $record['cooling_chiller3'];
            $chartData['freecooling_chiller3'][] = $record['freecooling_chiller3'];
            $chartData['suction_chiller3'][] = $record['suction_chiller3'];
            $chartData['discharge_chiller3'][] = $record['discharge_chiller3'];
            $chartData['flowrate_chiller3'][] = $record['flowrate_chiller3'];
            $chartData['current_con_chiller3'][] = $record['current_con_chiller3'];
            $chartData['voltage_chiller3'][] = $record['voltage_chiller3'];
            $chartData['power_con_chiller3'][] = $record['power_con_chiller3'];
            $chartData['eer_chiller3'][] = $record['eer_chiller3'];
            $chartData['power_sup_chiller3'][] = $record['power_sup_chiller3'];
        }

        $data = [
            'chiller' => $chiller,
            'pager' => $ChillerModel->pager,
            'title' => 'Data Ruang Chiller',
            'chartData' => $chartData
        ];

        return view('chiller3', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        $data = array(
            'title' => $this->title
        );
        return view('chiller-create', $data);
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
            'out_temp_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai OUT Temperature Chiller 1.'
                ]
            ],
            'in_temp_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai IN Temperature Chiller 1.'
                ]
            ],
            'amb_temp_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Ambient Temperature Chiller 1.'
                ]
            ],
            'free_temp_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai FreeCooling Temperature Chiller 1.'
                ]
            ],
            'setpoint_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Setpoint Medium Chiller 1.'
                ]
            ],
            'pump1_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 1 speed Chiller 1.'
                ]
            ],
            'pump2_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 2 speed Chiller 1.'
                ]
            ],
            'conden1_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 1 Chiller 1.'
                ]
            ],
            'conden2_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 2 Chiller 1.'
                ]
            ],
            'cooling_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Cooling Capacity Chiller 1.'
                ]
            ],
            'freecooling_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Freecooling Capacity Chiller 1.'
                ]
            ],
            'suction_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Suction) Chiller 1.'
                ]
            ],
            'discharge_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Discharge) Chiller 1.'
                ]
            ],
            'flowrate_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Flow Rate Chiller 1.'
                ]
            ],
            'current_con_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Current Consumption Chiller 1.'
                ]
            ],
            'voltage_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Voltage Chiller 1.'
                ]
            ],
            'power_con_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Power Consumption Chiller 1.'
                ]
            ],
            'eer_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai EER Chiller 1.'
                ]
            ],
            'power_sup_chiller1'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Sumber Power Supply Chiller 1.'
                ]
            ],
            'alarm_chiller1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Alarm Chiller 1.'
                ]
            ],
            'out_temp_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai OUT Temperature Chiller 2.'
                ]
            ],
            'in_temp_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai IN Temperature Chiller 2.'
                ]
            ],
            'amb_temp_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Ambient Temperature Chiller 2.'
                ]
            ],
            'free_temp_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai FreeCooling Temperature Chiller 2.'
                ]
            ],
            'setpoint_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Setpoint Medium Chiller 2.'
                ]
            ],
            'pump1_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 1 speed Chiller 2.'
                ]
            ],
            'pump2_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 2 speed Chiller 2.'
                ]
            ],
            'conden1_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 1 Chiller 2.'
                ]
            ],
            'conden2_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 2 Chiller 2.'
                ]
            ],
            'cooling_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Cooling Capacity Chiller 2.'
                ]
            ],
            'freecooling_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Freecooling Capacity Chiller 2.'
                ]
            ],
            'suction_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Suction) Chiller 2.'
                ]
            ],
            'discharge_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Discharge) Chiller 2.'
                ]
            ],
            'flowrate_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Flow Rate Chiller 2.'
                ]
            ],
            'current_con_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Current Consumption Chiller 2.'
                ]
            ],
            'voltage_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Voltage Chiller 2.'
                ]
            ],
            'power_con_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Power Consumption Chiller 2.'
                ]
            ],
            'eer_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai EER Chiller 2.'
                ]
            ],
            'power_sup_chiller2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Sumber Power Supply Chiller 2.'
                ]
            ],
            'alarm_chiller2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Alarm Chiller 2.'
                ]
            ],
            'out_temp_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai OUT Temperature Chiller 3.'
                ]
            ],
            'in_temp_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai IN Temperature Chiller 3.'
                ]
            ],
            'amb_temp_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Ambient Temperature Chiller 3.'
                ]
            ],
            'free_temp_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai FreeCooling Temperature Chiller 3.'
                ]
            ],
            'setpoint_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Setpoint Medium Chiller 3.'
                ]
            ],
            'pump1_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 1 speed Chiller 3.'
                ]
            ],
            'pump2_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydraulic Pump 2 speed Chiller 3.'
                ]
            ],
            'conden1_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 1 Chiller 3.'
                ]
            ],
            'conden2_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Condensation Pressure 2 Chiller 3.'
                ]
            ],
            'cooling_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Cooling Capacity Chiller 3.'
                ]
            ],
            'freecooling_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Freecooling Capacity Chiller 3.'
                ]
            ],
            'suction_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Suction) Chiller 3.'
                ]
            ],
            'discharge_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Hydr. Pressure (Discharge) Chiller 3.'
                ]
            ],
            'flowrate_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Flow Rate Chiller 3.'
                ]
            ],
            'current_con_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Current Consumption Chiller 3.'
                ]
            ],
            'voltage_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Voltage Chiller 3.'
                ]
            ],
            'power_con_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai Power Consumption Chiller 3.'
                ]
            ],
            'eer_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nilai EER Chiller 3.'
                ]
            ],
            'power_sup_chiller3'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Sumber Power Supply Chiller 3.'
                ]
            ],
            'alarm_chiller3' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Status Alarm Chiller 3.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return redirect()->to('/chiller/create')->withInput();
        } else {

            //model initialize
            $ChillerModel = new ChillerModel();

            //insert data into database
            $ChillerModel->insert([
                'status_chiller1' => $this->request->getPost('status_chiller1'),
                'out_temp_chiller1' => $this->request->getPost('out_temp_chiller1'),
                'in_temp_chiller1' => $this->request->getPost('in_temp_chiller1'),
                'amb_temp_chiller1'   => $this->request->getPost('amb_temp_chiller1'),
                'free_temp_chiller1' => $this->request->getPost('free_temp_chiller1'),
                'setpoint_chiller1' => $this->request->getPost('setpoint_chiller1'),
                'pump1_chiller1' => $this->request->getPost('pump1_chiller1'),
                'pump2_chiller1' => $this->request->getPost('pump2_chiller1'),
                'conden1_chiller1'   => $this->request->getPost('conden1_chiller1'),
                'conden2_chiller1' => $this->request->getPost('conden2_chiller1'),
                'cooling_chiller1'   => $this->request->getPost('cooling_chiller1'),
                'freecooling_chiller1' => $this->request->getPost('freecooling_chiller1'),
                'suction_chiller1' => $this->request->getPost('suction_chiller1'),
                'discharge_chiller1' => $this->request->getPost('discharge_chiller1'),
                'flowrate_chiller1' => $this->request->getPost('flowrate_chiller1'),
                'current_con_chiller1'   => $this->request->getPost('current_con_chiller1'),
                'voltage_chiller1' => $this->request->getPost('voltage_chiller1'),
                'power_con_chiller1'   => $this->request->getPost('power_con_chiller1'),
                'eer_chiller1' => $this->request->getPost('eer_chiller1'),
                'power_sup_chiller1' => $this->request->getPost('power_sup_chiller1'),
                'alarm_chiller1' => $this->request->getPost('alarm_chiller1'),
                'message_chiller1' => $this->request->getPost('message_chiller1'),
                'rusak_chiller1' => $this->request->getPost('rusak_chiller1'),
                'alert_chiller1' => $this->request->getPost('alert_chiller1'),

                'status_chiller2' => $this->request->getPost('status_chiller2'),
                'out_temp_chiller2' => $this->request->getPost('out_temp_chiller2'),
                'in_temp_chiller2' => $this->request->getPost('in_temp_chiller2'),
                'amb_temp_chiller2'   => $this->request->getPost('amb_temp_chiller2'),
                'free_temp_chiller2' => $this->request->getPost('free_temp_chiller2'),
                'setpoint_chiller2' => $this->request->getPost('setpoint_chiller2'),
                'pump1_chiller2' => $this->request->getPost('pump1_chiller2'),
                'pump2_chiller2' => $this->request->getPost('pump2_chiller2'),
                'conden1_chiller2'   => $this->request->getPost('conden1_chiller2'),
                'conden2_chiller2' => $this->request->getPost('conden2_chiller2'),
                'cooling_chiller2'   => $this->request->getPost('cooling_chiller2'),
                'freecooling_chiller2' => $this->request->getPost('freecooling_chiller2'),
                'suction_chiller2' => $this->request->getPost('suction_chiller2'),
                'discharge_chiller2' => $this->request->getPost('discharge_chiller2'),
                'flowrate_chiller2' => $this->request->getPost('flowrate_chiller2'),
                'current_con_chiller2'   => $this->request->getPost('current_con_chiller2'),
                'voltage_chiller2' => $this->request->getPost('voltage_chiller2'),
                'power_con_chiller2'   => $this->request->getPost('power_con_chiller2'),
                'eer_chiller2' => $this->request->getPost('eer_chiller2'),
                'power_sup_chiller2' => $this->request->getPost('power_sup_chiller2'),
                'alarm_chiller2' => $this->request->getPost('alarm_chiller2'),
                'message_chiller2' => $this->request->getPost('message_chiller2'),
                'rusak_chiller2' => $this->request->getPost('rusak_chiller2'),
                'alert_chiller2' => $this->request->getPost('alert_chiller2'),

                'status_chiller3' => $this->request->getPost('status_chiller3'),
                'out_temp_chiller3' => $this->request->getPost('out_temp_chiller3'),
                'in_temp_chiller3' => $this->request->getPost('in_temp_chiller3'),
                'amb_temp_chiller3'   => $this->request->getPost('amb_temp_chiller3'),
                'free_temp_chiller3' => $this->request->getPost('free_temp_chiller3'),
                'setpoint_chiller3' => $this->request->getPost('setpoint_chiller3'),
                'pump1_chiller3' => $this->request->getPost('pump1_chiller3'),
                'pump2_chiller3' => $this->request->getPost('pump2_chiller3'),
                'conden1_chiller3'   => $this->request->getPost('conden1_chiller3'),
                'conden2_chiller3' => $this->request->getPost('conden2_chiller3'),
                'cooling_chiller3'   => $this->request->getPost('cooling_chiller3'),
                'freecooling_chiller3' => $this->request->getPost('freecooling_chiller3'),
                'suction_chiller3' => $this->request->getPost('suction_chiller3'),
                'discharge_chiller3' => $this->request->getPost('discharge_chiller3'),
                'flowrate_chiller3' => $this->request->getPost('flowrate_chiller3'),
                'current_con_chiller3'   => $this->request->getPost('current_con_chiller3'),
                'voltage_chiller3' => $this->request->getPost('voltage_chiller3'),
                'power_con_chiller3'   => $this->request->getPost('power_con_chiller3'),
                'eer_chiller3' => $this->request->getPost('eer_chiller3'),
                'power_sup_chiller3' => $this->request->getPost('power_sup_chiller3'),
                'alarm_chiller3' => $this->request->getPost('alarm_chiller3'),
                'message_chiller3' => $this->request->getPost('message_chiller3'),
                'rusak_chiller3' => $this->request->getPost('rusak_chiller3'),
                'alert_chiller3' => $this->request->getPost('alert_chiller3'),
                'pemeriksa_id' => $pemeriksaId
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Chiller Berhasil Disimpan');

            return redirect()->to(base_url('chiller'));
        }
    }

    /**
     * Fungsi untuk ekspor data ke file Excel
     */
    public function exportToExcel()
    {
        $ChillerModel = new ChillerModel();
        $Chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left');
        $data = $Chiller->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status Chiller');
        $sheet->setCellValue('B1', 'OUT Temperature');
        $sheet->setCellValue('C1', 'IN Temperature');
        $sheet->setCellValue('D1', 'Ambient Temperature');
        $sheet->setCellValue('E1', 'FreeCooling Temperature');
        $sheet->setCellValue('F1', 'Setpoint Medium');
        $sheet->setCellValue('G1', 'Hydraulic Pump 1 speed');
        $sheet->setCellValue('H1', 'Hydraulic Pump 2 speed');
        $sheet->setCellValue('I1', 'Condensation Pressure 1');
        $sheet->setCellValue('J1', 'Condensation Pressure 2');
        $sheet->setCellValue('K1', 'Cooling Capacity');
        $sheet->setCellValue('L1', 'Freecooling Capacity');
        $sheet->setCellValue('M1', 'Hydr. Pressure (Suction)');
        $sheet->setCellValue('N1', 'Hydr. Pressure (Discharge)');
        $sheet->setCellValue('O1', 'Flow Rate');
        $sheet->setCellValue('P1', 'Current Consumption');
        $sheet->setCellValue('Q1', 'Voltage');
        $sheet->setCellValue('R1', 'Power Consumption');
        $sheet->setCellValue('S1', 'EER');
        $sheet->setCellValue('T1', 'Power Supply');
        $sheet->setCellValue('U1', 'Alarm');
        $sheet->setCellValue('V1', 'Alarm Message');
        $sheet->setCellValue('W1', 'Kerusakan');
        $sheet->setCellValue('X1', 'Keterangan');
        $sheet->setCellValue('Y1', 'Pemeriksa');
        $sheet->setCellValue('Z1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['status_chiller1']);
            $sheet->setCellValue('B' . $row, $item['out_temp_chiller1'] . '°C');
            $sheet->setCellValue('C' . $row, $item['in_temp_chiller1'] . '°C');
            $sheet->setCellValue('D' . $row, $item['amb_temp_chiller1'] . '°C');
            $sheet->setCellValue('E' . $row, $item['free_temp_chiller1'] . '°C');
            $sheet->setCellValue('F' . $row, $item['setpoint_chiller1'] . '°C');
            $sheet->setCellValue('G' . $row, $item['pump1_chiller1'] . '%');
            $sheet->setCellValue('H' . $row, $item['pump2_chiller1'] . '%');
            $sheet->setCellValue('I' . $row, $item['conden1_chiller1'] . ' bar');
            $sheet->setCellValue('J' . $row, $item['conden2_chiller1'] . ' bar');
            $sheet->setCellValue('K' . $row, $item['cooling_chiller1'] . ' KW');
            $sheet->setCellValue('L' . $row, $item['freecooling_chiller1'] . ' KW');
            $sheet->setCellValue('M' . $row, $item['suction_chiller1'] . ' bar');
            $sheet->setCellValue('N' . $row, $item['discharge_chiller1'] . ' bar');
            $sheet->setCellValue('O' . $row, $item['flowrate_chiller1'] . ' l/min');
            $sheet->setCellValue('P' . $row, $item['current_con_chiller1'] . ' Amp');
            $sheet->setCellValue('Q' . $row, $item['voltage_chiller1'] . ' Volt');
            $sheet->setCellValue('R' . $row, $item['power_con_chiller1'] . ' KW');
            $sheet->setCellValue('S' . $row, $item['eer_chiller1']);
            $sheet->setCellValue('T' . $row, $item['power_sup_chiller1']);
            $sheet->setCellValue('U' . $row, $item['alarm_chiller1']);
            $sheet->setCellValue('V' . $row, $item['message_chiller1']);
            $sheet->setCellValue('W' . $row, $item['rusak_chiller1']);
            $sheet->setCellValue('X' . $row, $item['alert_chiller1']);
            $sheet->setCellValue('Y' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('Z' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'chiller1_data.xlsx';
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

    public function exportToExcel2()
    {
        $ChillerModel = new ChillerModel();
        $Chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left');
        $data = $Chiller->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status Chiller');
        $sheet->setCellValue('B1', 'OUT Temperature');
        $sheet->setCellValue('C1', 'IN Temperature');
        $sheet->setCellValue('D1', 'Ambient Temperature');
        $sheet->setCellValue('E1', 'FreeCooling Temperature');
        $sheet->setCellValue('F1', 'Setpoint Medium');
        $sheet->setCellValue('G1', 'Hydraulic Pump 1 speed');
        $sheet->setCellValue('H1', 'Hydraulic Pump 2 speed');
        $sheet->setCellValue('I1', 'Condensation Pressure 1');
        $sheet->setCellValue('J1', 'Condensation Pressure 2');
        $sheet->setCellValue('K1', 'Cooling Capacity');
        $sheet->setCellValue('L1', 'Freecooling Capacity');
        $sheet->setCellValue('M1', 'Hydr. Pressure (Suction)');
        $sheet->setCellValue('N1', 'Hydr. Pressure (Discharge)');
        $sheet->setCellValue('O1', 'Flow Rate');
        $sheet->setCellValue('P1', 'Current Consumption');
        $sheet->setCellValue('Q1', 'Voltage');
        $sheet->setCellValue('R1', 'Power Consumption');
        $sheet->setCellValue('S1', 'EER');
        $sheet->setCellValue('T1', 'Power Supply');
        $sheet->setCellValue('U1', 'Alarm');
        $sheet->setCellValue('V1', 'Alarm Message');
        $sheet->setCellValue('W1', 'Kerusakan');
        $sheet->setCellValue('X1', 'Keterangan');
        $sheet->setCellValue('Y1', 'Pemeriksa');
        $sheet->setCellValue('Z1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['status_chiller2']);
            $sheet->setCellValue('B' . $row, $item['out_temp_chiller2'] . '°C');
            $sheet->setCellValue('C' . $row, $item['in_temp_chiller2'] . '°C');
            $sheet->setCellValue('D' . $row, $item['amb_temp_chiller2'] . '°C');
            $sheet->setCellValue('E' . $row, $item['free_temp_chiller2'] . '°C');
            $sheet->setCellValue('F' . $row, $item['setpoint_chiller2'] . '°C');
            $sheet->setCellValue('G' . $row, $item['pump1_chiller2'] . '%');
            $sheet->setCellValue('H' . $row, $item['pump2_chiller2'] . '%');
            $sheet->setCellValue('I' . $row, $item['conden1_chiller2'] . ' bar');
            $sheet->setCellValue('J' . $row, $item['conden2_chiller2'] . ' bar');
            $sheet->setCellValue('K' . $row, $item['cooling_chiller2'] . ' KW');
            $sheet->setCellValue('L' . $row, $item['freecooling_chiller2'] . ' KW');
            $sheet->setCellValue('M' . $row, $item['suction_chiller2'] . ' bar');
            $sheet->setCellValue('N' . $row, $item['discharge_chiller2'] . ' bar');
            $sheet->setCellValue('O' . $row, $item['flowrate_chiller2'] . ' l/min');
            $sheet->setCellValue('P' . $row, $item['current_con_chiller2'] . ' Amp');
            $sheet->setCellValue('Q' . $row, $item['voltage_chiller2'] . ' Volt');
            $sheet->setCellValue('R' . $row, $item['power_con_chiller2'] . ' KW');
            $sheet->setCellValue('S' . $row, $item['eer_chiller2']);
            $sheet->setCellValue('T' . $row, $item['power_sup_chiller2']);
            $sheet->setCellValue('U' . $row, $item['alarm_chiller2']);
            $sheet->setCellValue('W' . $row, $item['message_chiller2']);
            $sheet->setCellValue('X' . $row, $item['rusak_chiller2']);
            $sheet->setCellValue('V' . $row, $item['alert_chiller2']);
            $sheet->setCellValue('Y' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('Z' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'chiller2_data.xlsx';
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

    public function exportToExcel3()
    {
        $ChillerModel = new ChillerModel();
        $Chiller = $ChillerModel->select('chiller.*, pemeriksa.nama AS pemeriksa_nama, pemeriksa.jam AS pemeriksa_jam, pemeriksa.tanggal AS pemeriksa_tanggal')
            ->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left');
        $data = $Chiller->findAll(); // Ambil semua data dari model

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Status Chiller');
        $sheet->setCellValue('B1', 'OUT Temperature');
        $sheet->setCellValue('C1', 'IN Temperature');
        $sheet->setCellValue('D1', 'Ambient Temperature');
        $sheet->setCellValue('E1', 'FreeCooling Temperature');
        $sheet->setCellValue('F1', 'Setpoint Medium');
        $sheet->setCellValue('G1', 'Hydraulic Pump 1 speed');
        $sheet->setCellValue('H1', 'Hydraulic Pump 2 speed');
        $sheet->setCellValue('I1', 'Condensation Pressure 1');
        $sheet->setCellValue('J1', 'Condensation Pressure 2');
        $sheet->setCellValue('K1', 'Cooling Capacity');
        $sheet->setCellValue('L1', 'Freecooling Capacity');
        $sheet->setCellValue('M1', 'Hydr. Pressure (Suction)');
        $sheet->setCellValue('N1', 'Hydr. Pressure (Discharge)');
        $sheet->setCellValue('O1', 'Flow Rate');
        $sheet->setCellValue('P1', 'Current Consumption');
        $sheet->setCellValue('Q1', 'Voltage');
        $sheet->setCellValue('R1', 'Power Consumption');
        $sheet->setCellValue('S1', 'EER');
        $sheet->setCellValue('T1', 'Power Supply');
        $sheet->setCellValue('U1', 'Alarm');
        $sheet->setCellValue('V1', 'Alarm Message');
        $sheet->setCellValue('W1', 'Kerusakan');
        $sheet->setCellValue('X1', 'Keterangan');
        $sheet->setCellValue('Y1', 'Pemeriksa');
        $sheet->setCellValue('Z1', 'Waktu');

        // Data baris
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['status_chiller3']);
            $sheet->setCellValue('B' . $row, $item['out_temp_chiller3'] . '°C');
            $sheet->setCellValue('C' . $row, $item['in_temp_chiller3'] . '°C');
            $sheet->setCellValue('D' . $row, $item['amb_temp_chiller3'] . '°C');
            $sheet->setCellValue('E' . $row, $item['free_temp_chiller3'] . '°C');
            $sheet->setCellValue('F' . $row, $item['setpoint_chiller3'] . '°C');
            $sheet->setCellValue('G' . $row, $item['pump1_chiller3'] . '%');
            $sheet->setCellValue('H' . $row, $item['pump2_chiller3'] . '%');
            $sheet->setCellValue('I' . $row, $item['conden1_chiller3'] . ' bar');
            $sheet->setCellValue('J' . $row, $item['conden2_chiller3'] . ' bar');
            $sheet->setCellValue('K' . $row, $item['cooling_chiller3'] . ' KW');
            $sheet->setCellValue('L' . $row, $item['freecooling_chiller3'] . ' KW');
            $sheet->setCellValue('M' . $row, $item['suction_chiller3'] . ' bar');
            $sheet->setCellValue('N' . $row, $item['discharge_chiller3'] . ' bar');
            $sheet->setCellValue('O' . $row, $item['flowrate_chiller3'] . ' l/min');
            $sheet->setCellValue('P' . $row, $item['current_con_chiller3'] . ' Amp');
            $sheet->setCellValue('Q' . $row, $item['voltage_chiller3'] . ' Volt');
            $sheet->setCellValue('R' . $row, $item['power_con_chiller3'] . ' KW');
            $sheet->setCellValue('S' . $row, $item['eer_chiller3']);
            $sheet->setCellValue('T' . $row, $item['power_sup_chiller3']);
            $sheet->setCellValue('U' . $row, $item['alarm_chiller3']);
            $sheet->setCellValue('W' . $row, $item['message_chiller3']);
            $sheet->setCellValue('X' . $row, $item['rusak_chiller3']);
            $sheet->setCellValue('V' . $row, $item['alert_chiller3']);
            $sheet->setCellValue('Y' . $row, $item['pemeriksa_nama']);
            $sheet->setCellValue('Z' . $row, date('H:i, d F Y', strtotime($item['pemeriksa_jam'] . ', ' . $item['pemeriksa_tanggal'])));
            $row++;
        }

        $filename = 'chiller3_data.xlsx';
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
