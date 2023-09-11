<?php namespace App\Models;

use CodeIgniter\Model;

class VesdaModel extends Model
{
    /**
     * table name
     */
    protected $table = "vesda";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'status_main',
        'alert_vesdaMain',
        'message_vesdaMain',
        'status_selasar',
        'alert_vesdaSelasar',
        'message_vesdaSelasar',
        'status_utility',
        'alert_vesdaUtility',
        'message_vesdaUtility',
        'status_library',
        'alert_vesdaLibrary',
        'message_vesdaLibrary',
        'status_staging',
        'alert_vesdaStaging',
        'message_vesdaStaging',
        'pemeriksa_id'
    ];
    
    public function getChartDataByMonth($bulanVesda)
    {
        $this->select('tanggal, status_main, status_selasar, status_utility, status_library, status_staging');
        $this->join('pemeriksa', 'pemeriksa.id = vesda.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanVesda);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}