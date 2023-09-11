<?php

namespace App\Models;

use CodeIgniter\Model;

class ChillerModel extends Model
{
    /**
     * table name
     */
    protected $table = "chiller";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'status_chiller1',
        'out_temp_chiller1',
        'in_temp_chiller1',
        'amb_temp_chiller1',
        'free_temp_chiller1',
        'setpoint_chiller1',
        'pump1_chiller1',
        'pump2_chiller1',
        'conden1_chiller1',
        'conden2_chiller1',
        'cooling_chiller1',
        'freecooling_chiller1',
        'suction_chiller1',
        'discharge_chiller1',
        'flowrate_chiller1',
        'current_con_chiller1',
        'voltage_chiller1',
        'power_con_chiller1',
        'eer_chiller1',
        'power_sup_chiller1',
        'alarm_chiller1',
        'message_chiller1',
        'rusak_chiller1',
        'alert_chiller1',
        'status_chiller2',
        'out_temp_chiller2',
        'in_temp_chiller2',
        'amb_temp_chiller2',
        'free_temp_chiller2',
        'setpoint_chiller2',
        'pump1_chiller2',
        'pump2_chiller2',
        'conden1_chiller2',
        'conden2_chiller2',
        'cooling_chiller2',
        'freecooling_chiller2',
        'suction_chiller2',
        'discharge_chiller2',
        'flowrate_chiller2',
        'current_con_chiller2',
        'voltage_chiller2',
        'power_con_chiller2',
        'eer_chiller2',
        'power_sup_chiller2',
        'alarm_chiller2',
        'message_chiller2',
        'rusak_chiller2',
        'alert_chiller2',
        'status_chiller3',
        'out_temp_chiller3',
        'in_temp_chiller3',
        'amb_temp_chiller3',
        'free_temp_chiller3',
        'setpoint_chiller3',
        'pump1_chiller3',
        'pump2_chiller3',
        'conden1_chiller3',
        'conden2_chiller3',
        'cooling_chiller3',
        'freecooling_chiller3',
        'suction_chiller3',
        'discharge_chiller3',
        'flowrate_chiller3',
        'current_con_chiller3',
        'voltage_chiller3',
        'power_con_chiller3',
        'eer_chiller3',
        'power_sup_chiller3',
        'alarm_chiller3',
        'message_chiller3',
        'rusak_chiller3',
        'alert_chiller3',
        'pemeriksa_id'
    ];
    public function getChartDataByMonth($bulanChiller, $tahunChiller)
    {
        $this->select('tanggal, out_temp_chiller1, in_temp_chiller1, amb_temp_chiller1, 
        free_temp_chiller1, setpoint_chiller1, pump1_chiller1, pump2_chiller1, conden1_chiller1, 
        conden2_chiller1, cooling_chiller1, freecooling_chiller1, suction_chiller1, discharge_chiller1, 
        flowrate_chiller1, current_con_chiller1, voltage_chiller1, power_con_chiller1, eer_chiller1, 
        power_sup_chiller1, out_temp_chiller2, in_temp_chiller2, amb_temp_chiller2, free_temp_chiller2, 
        setpoint_chiller2, pump1_chiller2, pump2_chiller2, conden1_chiller2, conden2_chiller2, cooling_chiller2, 
        freecooling_chiller2, suction_chiller2, discharge_chiller2, flowrate_chiller2, current_con_chiller2, 
        voltage_chiller2, power_con_chiller2, eer_chiller2, power_sup_chiller2, out_temp_chiller3, in_temp_chiller3, 
        amb_temp_chiller3, free_temp_chiller3, setpoint_chiller3, pump1_chiller3, pump2_chiller3, conden1_chiller3, 
        conden2_chiller3, cooling_chiller3, freecooling_chiller3, suction_chiller3, discharge_chiller3, flowrate_chiller3, 
        current_con_chiller3, voltage_chiller3, power_con_chiller3, eer_chiller3, power_sup_chiller3');
        $this->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanChiller);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunChiller);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }

    public function countKerusakanByTypeAndMonth($bulanChiller, $tahunChiller)
    {
        $this->select('rusak_chiller1, COUNT(*) as jumlah_kerusakan');
        $this->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left'); // Make sure to join the pemeriksa table
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanChiller);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunChiller);
        $this->groupBy('rusak_chiller1');
        return $this->findAll();
    }
    public function countKerusakanByTypeAndMonth2($bulanChiller, $tahunChiller)
    {
        $this->select('rusak_chiller2, COUNT(*) as jumlah_kerusakan');
        $this->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left'); // Make sure to join the pemeriksa table
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanChiller);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunChiller);
        $this->groupBy('rusak_chiller1');
        return $this->findAll();
    }
    public function countKerusakanByTypeAndMonth3($bulanChiller, $tahunChiller)
    {
        $this->select('rusak_chiller3, COUNT(*) as jumlah_kerusakan');
        $this->join('pemeriksa', 'pemeriksa.id = chiller.pemeriksa_id', 'left'); // Make sure to join the pemeriksa table
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanChiller);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunChiller);
        $this->groupBy('rusak_chiller1');
        return $this->findAll();
    }
}
