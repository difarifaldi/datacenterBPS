<?php namespace App\Models;

use CodeIgniter\Model;

class TabungModel extends Model
{
    /**
     * table name
     */
    protected $table = "tabung";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'status_besar',
        'message_tabungBesar',
        'status_kecil',
        'message_tabungKecil',
        'pemeriksa_id'
    ];
    
    public function getChartDataByMonth($bulanTabung)
    {
        $this->select('tanggal, status_besar, status_kecil');
        $this->join('pemeriksa', 'pemeriksa.id = tabung.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanTabung);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}