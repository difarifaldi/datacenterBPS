<?php namespace App\Models;

use CodeIgniter\Model;

class FireModel extends Model
{
    /**
     * table name
     */
    protected $table = "fire_system";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'status',
        'message_fire',
        'pemeriksa_id'
    ];
    public function pemeriksa()
    {
        return $this->belongsTo('App\Models\PemeriksaModel', 'pemeriksa_id', 'id');
    }
}