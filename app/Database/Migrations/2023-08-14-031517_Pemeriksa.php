<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemeriksa extends Migration
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
              'jam'       => [
                  'type'           => 'TIME'
              ],
              'tanggal'     => [
                   'type'           => 'DATE'
              ],
              'nama'     => [
                    'type'           => 'varchar',
                    'constraint'     => '255'
           ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('pemeriksa');
    }

    public function down()
    {
        //
    }
}
