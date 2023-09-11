<?php namespace App\Models;

use CodeIgniter\Model;

class LcpModel extends Model
{
    /**
     * table name
     */
    protected $table = "lcp";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'suhu_lcp1',
        'suhu_lcp2',
        'suhu_lcp3',
        'suhu_lcp4',
        'suhu_lcp5',
        'suhu_lcp6',
        'suhu_lcp7',
        'suhu_lcp8',
        'daya_lcp1',
        'daya_lcp2',
        'daya_lcp3',
        'daya_lcp4',
        'daya_lcp5',
        'daya_lcp6',
        'daya_lcp7',
        'daya_lcp8',
        'alert_lcp1',
        'alert_lcp2',
        'alert_lcp3',
        'alert_lcp4',
        'alert_lcp5',
        'alert_lcp6',
        'alert_lcp7',
        'alert_lcp8',
        'message_lcp1',
        'message_lcp2',
        'message_lcp3',
        'message_lcp4',
        'message_lcp5',
        'message_lcp6',
        'message_lcp7',
        'message_lcp8',
        'pemeriksa_id'
    ];
    public function getChartDataByMonth($bulanLcp,$tahunLcp)
    {
        $this->select('tanggal, suhu_lcp1, suhu_lcp2, suhu_lcp3, suhu_lcp4, suhu_lcp5, suhu_lcp6, suhu_lcp7, suhu_lcp8, daya_lcp1, daya_lcp2, daya_lcp3, daya_lcp4, daya_lcp5, daya_lcp6, daya_lcp7, daya_lcp8');
        $this->join('pemeriksa', 'pemeriksa.id = lcp.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanLcp);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunLcp);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}