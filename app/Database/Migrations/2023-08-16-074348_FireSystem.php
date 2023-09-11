<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FireSystem extends Migration
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
         'status'     => [
            'type'           => 'VARCHAR',
            'constraint'     => 255
         ],
         'message_fire'     => [
            'type'           => 'VARCHAR',
            'constraint'     => 255
         ],
         'pemeriksa_id'           => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => TRUE
        ],
    ]);
    $this->forge->addKey('id', TRUE);
    $this->forge->addForeignKey('pemeriksa_id', 'pemeriksa', 'id');
        $this->forge->createTable('fire_system');
    }

    public function down()
    {
        //
    }
}
