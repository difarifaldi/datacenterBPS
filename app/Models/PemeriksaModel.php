<?php namespace App\Models;

use CodeIgniter\Model;

class PemeriksaModel extends Model
{
    public function get_pemeriksa_data() {
        return $this->db->get('pemeriksa')->result();
    }
    /**
     * table name
     */
    protected $table = "pemeriksa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'jam',
        'tanggal',
        'nama'
    ];
}