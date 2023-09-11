<?php namespace App\Models;

use CodeIgniter\Model;

class IpduModel extends Model
{
    /**
     * table name
     */
    protected $table = "ipdu";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'p_mb1',
        's_mb1',
        'q_mb1',
        'pf_mb1',
        'kwh_mb1',
        'kvah_mb1',
        'kvarh_mb1',
        'alert_ipdu1',
        'message_ipdu1',
        'p_mb2',
        's_mb2',
        'q_mb2',
        'pf_mb2',
        'kwh_mb2',
        'kvah_mb2',
        'kvarh_mb2',
        'alert_ipdu2',
        'message_ipdu2',
        'pemeriksa_id'
    ];
    public function getChartDataByMonth($bulanIpdu,$tahunIpdu)
    {
        $this->select('tanggal, p_mb1, s_mb1, q_mb1, pf_mb1, kwh_mb1, kvah_mb1, kvarh_mb1, p_mb2, s_mb2, q_mb2, pf_mb2, kwh_mb2, kvah_mb2, kvarh_mb2');
        $this->join('pemeriksa', 'pemeriksa.id = ipdu.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanIpdu);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunIpdu);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }

}