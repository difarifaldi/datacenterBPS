<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TekananTabung extends Migration
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
             'status_besar'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
             ],
             'message_tabungBesar'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
               ],
             'status_kecil'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
             ],
            'message_tabungKecil'      => [
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
       $this->forge->createTable('tabung');
    }

    public function down()
    {
        //
    }
}
