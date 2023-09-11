<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utility extends Migration
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
            'MSB_U'       => [
                'type'           => 'double'
            ],
            'UMSB_U'      => [
                'type'           => 'double'
            ],
            'MSB_U2'       => [
                'type'           => 'double'
            ],
            'UMSB_U2'      => [
                'type'           => 'double'
            ],
            'MSB_U3'       => [
                'type'           => 'double'
            ],
            'alert_MSBU'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_MSBU'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'UMSB_U3'      => [
                'type'           => 'double'
            ],
            'alert_UMSBU'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_UMSBU'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'MSB_S'       => [
                'type'           => 'double'
            ],
            'MSB_S2'       => [
                'type'           => 'double'
            ],
            'MSB_S3'       => [
                'type'           => 'double'
            ],
            'alert_MSBS'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_MSBS'      => [
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
        $this->forge->createTable('utility');
    }

    public function down()
    {
        //
    }
}
