<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cctv extends Migration
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
             'unit_cctv'     => [
                'type'           => 'INT'
             ],
             'status_cctv'      => [
               'type'           => 'varchar',
               'constraint'     => '255'
             ],
             'keterangan_cctv'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
             'status_nvr'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
             ],
             'record'      => [
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
       $this->forge->createTable('cctv');
    }

    public function down()
    {
        //
    }
}
