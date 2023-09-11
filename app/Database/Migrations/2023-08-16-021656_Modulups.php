<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modulups extends Migration
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
            'statusups1'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups1'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups1'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups1'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups2'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups2'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups2'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups2'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups3'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups3'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups3'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups3'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups4'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups4'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups4'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups4'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups5'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups5'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups5'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups5'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups6'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups6'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups6'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups6'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
            'statusups7'     => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'alert_modulups7'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'message_modulups7'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_modulups7'      => [
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
        $this->forge->createTable('modulups');
    }

    public function down()
    {
        //
    }
}
