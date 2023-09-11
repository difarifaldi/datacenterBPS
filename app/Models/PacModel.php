<?php

namespace App\Models;

use CodeIgniter\Model;

class PacModel extends Model
{
    /**
     * table name
     */
    protected $table = "pac";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'status_pac1',
        'status_pac2',
        'status_pac3',
        'status_pac4',
        'status_pac5',
        'status_pac6',
        'suhu_pac1',
        'suhu_pac2',
        'suhu_pac3',
        'suhu_pac4',
        'suhu_pac5',
        'suhu_pac6',
        'temp_pac1',
        'temp_pac2',
        'temp_pac3',
        'temp_pac4',
        'temp_pac5',
        'temp_pac6',
        'alert_pac1',
        'alert_pac2',
        'alert_pac3',
        'alert_pac4',
        'alert_pac5',
        'alert_pac6',
        'message_pac1',
        'message_pac2',
        'message_pac3',
        'message_pac4',
        'message_pac5',
        'message_pac6',
        'rusak_pac1',
        'rusak_pac2',
        'rusak_pac3',
        'rusak_pac4',
        'rusak_pac5',
        'rusak_pac6',
        'pemeriksa_id'
    ];

    public function countKerusakanByTypeAndMonth($bulanPac, $tahunPac)
    {
        $this->select('rusak_pac1, rusak_pac2, rusak_pac3, rusak_pac4, rusak_pac5, rusak_pac6, COUNT(*) as jumlah_kerusakan_pac1, COUNT(*) as jumlah_kerusakan_pac2, COUNT(*) as jumlah_kerusakan_pac3, COUNT(*) as jumlah_kerusakan_pac4, COUNT(*) as jumlah_kerusakan_pac5, COUNT(*) as jumlah_kerusakan_pac6');
        $this->join('pemeriksa', 'pemeriksa.id = pac.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanPac);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunPac);
        $this->groupBy('rusak_pac1, rusak_pac2, rusak_pac3, rusak_pac4, rusak_pac5, rusak_pac6'); // Group by both rusak_pac1 and rusak_pac2
        return $this->findAll();
    }

    public function getChartDataByMonth($bulanPac, $tahunPac)
    {
        $this->select('tanggal, suhu_pac1, suhu_pac2, suhu_pac3, suhu_pac4, suhu_pac5, suhu_pac6, temp_pac1, temp_pac2, temp_pac3, temp_pac4, temp_pac5, temp_pac6');
        $this->join('pemeriksa', 'pemeriksa.id = pac.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanPac);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunPac);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}
