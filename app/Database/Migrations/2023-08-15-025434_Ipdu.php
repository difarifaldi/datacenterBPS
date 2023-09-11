<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ipdu extends Migration
{
    public function up(){
        
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
             ],
             'p_mb1'     => [
                'type'           => 'double',
             ],
             's_mb1'     => [
                'type'           => 'double',
             ],
             'q_mb1'     => [
                'type'           => 'double',
             ],
             'pf_mb1'     => [
                'type'           => 'double',
             ],
             'kwh_mb1'     => [
                'type'           => 'double',
             ],
             'kvah_mb1'     => [
                'type'           => 'double',
             ],
             'kvarh_mb1'     => [
                'type'           => 'double',
             ],
             'alert_ipdu1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_ipdu1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
             'p_mb2'     => [
                'type'           => 'double',
             ],
             's_mb2'     => [
                'type'           => 'double',
             ],
             'q_mb2'     => [
                'type'           => 'double',
             ],
             'pf_mb2'     => [
                'type'           => 'double',
             ],
             'kwh_mb2'     => [
                'type'           => 'double',
             ],
             'kvah_mb2'     => [
                'type'           => 'double',
             ],
             'kvarh_mb2'     => [
                'type'           => 'double',
             ],
             'alert_ipdu2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_ipdu2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
             'pemeriksa_id'           => [
               'type'           => 'INT',
               'constraint'     => 11,
               'unsigned'       => TRUE
           ],
       ]);
       $this->forge->addKey('id', TRUE);
       $this->forge->addForeignKey('pemeriksa_id', 'pemeriksa', 'id');
       $this->forge->createTable('ipdu');
    }

    public function down()
    {
        //
    }
}
