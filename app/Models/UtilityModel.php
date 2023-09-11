<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilityModel extends Model
{
    public function get_utility_data() {
        return $this->db->get('utility')->result();
    }
    /**
     * table name
     */
    protected $table = "utility";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'MSB_U',
        'UMSB_U',
        'MSB_U2',
        'UMSB_U2',
        'MSB_U3',
        'alert_MSBU',
        'message_MSBU',
        'UMSB_U3',
        'alert_UMSBU',
        'message_UMSBU',
        'MSB_S',
        'MSB_S2',
        'MSB_S3',
        'alert_MSBS',
        'message_MSBS',
        'pemeriksa_id'
    ];

    public function countKerusakanByTypeAndMonth($bulanUtility)
    {
        $this->select('rusak_utility, COUNT(*) as jumlah_kerusakan');
        $this->join('pemeriksa', 'pemeriksa.id = utility.pemeriksa_id', 'left'); // Make sure to join the pemeriksa table
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanUtility);
        $this->groupBy('rusak_utility');
        return $this->findAll();
    }

    public function getChartDataByMonth($bulanUtility,$tahunUtility)
    {
        $this->select('tanggal, MSB_U, UMSB_U, MSB_U2, UMSB_U2, MSB_U3, UMSB_U3, MSB_S, MSB_S2,MSB_S3');
        $this->join('pemeriksa', 'pemeriksa.id = utility.pemeriksa_id', 'left');
        $this->where("DATE_FORMAT(pemeriksa.tanggal, '%M')", $bulanUtility);
        $this->where("YEAR(pemeriksa.tanggal)", $tahunUtility);
        $this->orderBy('pemeriksa.tanggal', 'ASC');

        return $this->findAll();
    }
}
