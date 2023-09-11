<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chiller extends Migration
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
              'status_chiller1'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'out_temp_chiller1'       => [
                'type'           => 'double',
              ],
              'in_temp_chiller1'       => [
                'type'           => 'double',
              ],
              'amb_temp_chiller1'       => [
                'type'           => 'double',
              ],
              'free_temp_chiller1'       => [
                'type'           => 'double',
              ],
              'setpoint_chiller1'       => [
                'type'           => 'double',
              ],
              'pump1_chiller1'       => [
                'type'           => 'double',
              ],
              'pump2_chiller1'       => [
                'type'           => 'double',
              ],
              'conden1_chiller1'       => [
                'type'           => 'double',
              ],
              'conden2_chiller1'       => [
                'type'           => 'double',
              ],
              'cooling_chiller1'       => [
                'type'           => 'double',
              ],
              'freecooling_chiller1'       => [
                'type'           => 'double',
              ],
              'suction_chiller1'       => [
                'type'           => 'double',
              ],
              'discharge_chiller1'       => [
                'type'           => 'double',
              ],
              'flowrate_chiller1'       => [
                'type'           => 'double',
              ],
              'current_con_chiller1'       => [
                'type'           => 'double',
              ],
              'voltage_chiller1'       => [
                'type'           => 'double',
              ],
              'power_con_chiller1'       => [
                'type'           => 'double',
              ],
              'eer_chiller1'       => [
                'type'           => 'double',
              ],
              'power_sup_chiller1'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
              'alarm_chiller1'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
              'message_chiller1'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'rusak_chiller1'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'alert_chiller1'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
              'status_chiller2'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'out_temp_chiller2'       => [
                'type'           => 'double',
              ],
              'in_temp_chiller2'       => [
                'type'           => 'double',
              ],
              'amb_temp_chiller2'       => [
                'type'           => 'double',
              ],
              'free_temp_chiller2'       => [
                'type'           => 'double',
              ],
              'setpoint_chiller2'       => [
                'type'           => 'double',
              ],
              'pump1_chiller2'       => [
                'type'           => 'double',
              ],
              'pump2_chiller2'       => [
                'type'           => 'double',
              ],
              'conden1_chiller2'       => [
                'type'           => 'double',
              ],
              'conden2_chiller2'       => [
                'type'           => 'double',
              ],
              'cooling_chiller2'       => [
                'type'           => 'double',
              ],
              'freecooling_chiller2'       => [
                'type'           => 'double',
              ],
              'suction_chiller2'       => [
                'type'           => 'double',
              ],
              'discharge_chiller2'       => [
                'type'           => 'double',
              ],
              'flowrate_chiller2'       => [
                'type'           => 'double',
              ],
              'current_con_chiller2'       => [
                'type'           => 'double',
              ],
              'voltage_chiller2'       => [
                'type'           => 'double',
              ],
              'power_con_chiller2'       => [
                'type'           => 'double',
              ],
              'eer_chiller2'       => [
                'type'           => 'double',
              ],
              'power_sup_chiller2'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
              'alarm_chiller2'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
              'message_chiller2'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'rusak_chiller2'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'alert_chiller2'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
              'status_chiller3'      => [
                 'type'           => 'varchar',
                 'constraint'     => '255'
              ],
              'out_temp_chiller3'       => [
                'type'           => 'double',
              ],
              'in_temp_chiller3'       => [
                'type'           => 'double',
              ],
              'amb_temp_chiller3'       => [
                'type'           => 'double',
              ],
              'free_temp_chiller3'       => [
                'type'           => 'double',
              ],
              'setpoint_chiller3'       => [
                'type'           => 'double',
              ],
              'pump1_chiller3'       => [
                'type'           => 'double',
              ],
              'pump2_chiller3'       => [
                'type'           => 'double',
              ],
              'conden1_chiller3'       => [
                'type'           => 'double',
              ],
              'conden2_chiller3'       => [
                'type'           => 'double',
              ],
              'cooling_chiller3'       => [
                'type'           => 'double',
              ],
              'freecooling_chiller3'       => [
                'type'           => 'double',
              ],
              'suction_chiller3'       => [
                'type'           => 'double',
              ],
              'discharge_chiller3'       => [
                'type'           => 'double',
              ],
              'flowrate_chiller3'       => [
                'type'           => 'double',
              ],
              'current_con_chiller3'       => [
                'type'           => 'double',
              ],
              'voltage_chiller3'       => [
                'type'           => 'double',
              ],
              'power_con_chiller3'       => [
                'type'           => 'double',
              ],
              'eer_chiller3'       => [
                'type'           => 'double',
              ],
              'power_sup_chiller3'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
              'alarm_chiller3'       => [
                'type'           => 'varchar',
                'constraint'     => '255'
              ],
             'message_chiller3'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'rusak_chiller3'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
             ],
             'alert_chiller3'      => [
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
        $this->forge->createTable('chiller');
    }

    public function down()
    {
        //
    }
}