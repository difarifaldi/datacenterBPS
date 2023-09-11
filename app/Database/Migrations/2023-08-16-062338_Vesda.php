<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vesda extends Migration
{
    public function up(){
        
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
             ],
             'status_main'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_vesdaMain'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_vesdaMain'      => [
            'type'           => 'varchar',
            'constraint'     => '255'
            ],
             'status_selasar'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_vesdaSelasar'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_vesdaSelasar'      => [
            'type'           => 'varchar',
            'constraint'     => '255'
            ],
             'status_utility'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_vesdaUtility'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_vesdaUtility'      => [
            'type'           => 'varchar',
            'constraint'     => '255'
            ],
             'status_library'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_vesdaLibrary'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_vesdaLibrary'      => [
            'type'           => 'varchar',
            'constraint'     => '255'
            ],
             'status_staging'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_vesdaStaging'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
            ],
            'message_vesdaStaging'      => [
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
       $this->forge->createTable('vesda');
    }

    public function down()
    {
        //
    }
}
