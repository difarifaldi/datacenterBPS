<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemUpsModel extends Model
{
    protected $table = "systemups";
    protected $allowedFields = [
        'status_ups',
        'load_pl1',
        'load_pl2',
        'load_pl3',
        'batery_voltage',
        'temp',
        'time',
        'alert_systemups',
        'message_systemups',
        'rusak_systemups',
        'pemeriksa_id'
    ];



    public function countKerusakanByTypeAndMonth($bulanSystemUPS, $tahunSystemUPS)
    {
        $this->select('rusak_systemups, COUNT(*) as jumlah_kerusakan');
        $this->join('pemeriksa', 'pemeriksa.id = systemups.pemeriksa_id', 'left'); // Make sure to join the pemeriksa table
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanSystemUPS);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunSystemUPS);
        $this->groupBy('rusak_systemups');
        return $this->findAll();
    }
    public function getChartDataByMonth($bulanSystemUPS, $tahunSystemUPS)
    {
        $this->select('tanggal, load_pl1, load_pl2, load_pl3, batery_voltage, temp');
        $this->join('pemeriksa', 'pemeriksa.id = systemups.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanSystemUPS);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunSystemUPS);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}
