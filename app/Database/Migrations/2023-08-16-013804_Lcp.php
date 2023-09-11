<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lcp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
             ],
            'suhu_lcp1'     => [
               'type'           => 'DOUBLE',
            ],
            'suhu_lcp2'     => [
               'type'           => 'DOUBLE',
            ],
            'suhu_lcp3'     => [
               'type'           => 'DOUBLE',
            ],
            'suhu_lcp4'     => [
              'type'           => 'DOUBLE',
            ],
            'suhu_lcp5'     => [
            'type'           => 'DOUBLE',
            ],
            'suhu_lcp6'     => [
            'type'           => 'DOUBLE',
            ],
            'suhu_lcp7'     => [
            'type'           => 'DOUBLE',
            ],
            'suhu_lcp8'     => [
            'type'           => 'DOUBLE',
            ],
            'daya_lcp1'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp2'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp3'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp4'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp5'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp6'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp7'     => [
               'type'           => 'DOUBLE',
            ],
            'daya_lcp8'     => [
               'type'           => 'DOUBLE',
            ],
            'alert_lcp1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp3'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp4'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp5'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp6'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp7'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'alert_lcp8'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp3'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp4'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp5'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp6'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp7'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_lcp8'      => [
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
       $this->forge->createTable('lcp');
    }

    public function down()
    {
        //
    }
}
