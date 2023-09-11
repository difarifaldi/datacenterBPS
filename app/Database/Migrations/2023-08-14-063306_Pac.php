<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pac extends Migration
{
    public function up(){
        
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
             ],
             'status_pac1'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'status_pac2'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'status_pac3'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'status_pac4'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'status_pac5'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'status_pac6'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'suhu_pac1'     => [
                'type'           => 'double',
             ],
             'suhu_pac2'     => [
                'type'           => 'double',
             ],
             'suhu_pac3'     => [
                'type'           => 'double',
             ],
             'suhu_pac4'     => [
                'type'           => 'double',
             ],
             'suhu_pac5'     => [
                'type'           => 'double',
             ],
             'suhu_pac6'     => [
                'type'           => 'double',
             ],
             'temp_pac1'     => [
                'type'           => 'double',
             ],
             'temp_pac2'     => [
                'type'           => 'double',
             ],
             'temp_pac3'     => [
                'type'           => 'double',
             ],
             'temp_pac4'     => [
                'type'           => 'double',
             ],
             'temp_pac5'     => [
                'type'           => 'double',
             ],
             'temp_pac6'     => [
                'type'           => 'double',
             ],
             'alert_pac1'      => [
              'type'           => 'varchar',
              'constraint'     => '255'
             ],
            'alert_pac2'      => [
             'type'           => 'varchar',
             'constraint'     => '255'
            ],
           'alert_pac3'      => [
             'type'           => 'varchar',
             'constraint'     => '255'
            ],
            'alert_pac4'      => [
             'type'           => 'varchar',
             'constraint'     => '255'
            ],
            'alert_pac5'      => [
             'type'           => 'varchar',
             'constraint'     => '255'
            ],
            'alert_pac6'      => [
             'type'           => 'varchar',
             'constraint'     => '255'
            ],
            'message_pac1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_pac2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_pac3'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_pac4'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_pac5'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_pac6'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'rusak_pac1'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            
            'rusak_pac2'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'rusak_pac3'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'rusak_pac4'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'rusak_pac5'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'rusak_pac6'      => [
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
       $this->forge->createTable('pac');
    }

    public function down()
    {
        //
    }
}
