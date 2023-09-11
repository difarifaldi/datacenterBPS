<?php namespace App\Models;

use CodeIgniter\Model;

class CctvModel extends Model
{
    /**
     * table name
     */
    protected $table = "cctv";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'unit_cctv',
        'status_cctv',
        'keterangan_cctv',
        'status_nvr',
        'record',
        'pemeriksa_id'
    ];
    
    public function getChartDataByMonth($bulanCctv,$tahunCctv)
    {
        $this->select('tanggal, unit_cctv');
        $this->join('pemeriksa', 'pemeriksa.id = cctv.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanCctv);
        $this->where('YEAR(pemeriksa.tanggal)',$tahunCctv);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}