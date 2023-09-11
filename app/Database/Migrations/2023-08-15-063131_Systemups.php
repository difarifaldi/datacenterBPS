<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Systemups extends Migration
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
              'status_ups'       => [
                  'type'           => 'varchar',
                  'constraint'     => '225'
              ],
              'load_pl1'      => [
                   'type'           => 'DOUBLE'
              ],
              'load_pl2'       => [
                'type'           => 'DOUBLE'
              ],
              'load_pl3'      => [
                 'type'           => 'DOUBLE'
              ],
              'batery_voltage' => [
                    'type' => 'DOUBLE'
              ],
              'temp'    => [
                    'type'  => 'DOUBLE'
              ],
              'time'    => [
                    'type'  => 'INT'
              ],
              'alert_systemups'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_systemups'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_systemups'      => [
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
        $this->forge->createTable('systemUps');
    }

    public function down()
    {
        //
    }
}
