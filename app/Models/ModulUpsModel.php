<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulUpsModel extends Model
{
    /**
     * table name
     */
    protected $table = "modulups";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'statusups1',
        'alert_modulups1',
        'message_modulups1',
        'rusak_modulups1',
        'statusups2',
        'alert_modulups2',
        'message_modulups2',
        'rusak_modulups2',
        'statusups3',
        'alert_modulups3',
        'message_modulups3',
        'rusak_modulups3',
        'statusups4',
        'alert_modulups4',
        'message_modulups4',
        'rusak_modulups4',
        'statusups5',
        'alert_modulups5',
        'message_modulups5',
        'rusak_modulups5',
        'statusups6',
        'alert_modulups6',
        'message_modulups6',
        'rusak_modulups6',
        'statusups7',
        'alert_modulups7',
        'message_modulups7',
        'rusak_modulups7',
        'pemeriksa_id'
    ];

    public function countKerusakanByTypeAndMonth($bulanModulUps, $tahunModulUps)
    {
        $this->select('rusak_modulups1, rusak_modulups2, rusak_modulups3, rusak_modulups4, rusak_modulups5, rusak_modulups6, rusak_modulups7, COUNT(*) as jumlah_kerusakan_modulups1, COUNT(*) as jumlah_kerusakan_modulups2, COUNT(*) as jumlah_kerusakan_modulups3, COUNT(*) as jumlah_kerusakan_modulups4, COUNT(*) as jumlah_kerusakan_modulups5, COUNT(*) as jumlah_kerusakan_modulups6, COUNT(*) as jumlah_kerusakan_modulups7');
        $this->join('pemeriksa', 'pemeriksa.id = modulups.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanModulUps);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunModulUps);
        $this->groupBy('rusak_modulups1, rusak_modulups2, rusak_modulups3, rusak_modulups4, rusak_modulups5, rusak_modulups6, rusak_modulups7'); // Group by both rusak_modulups1 and rusak_modulups2
        return $this->findAll();
    }
}
