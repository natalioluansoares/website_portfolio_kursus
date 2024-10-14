<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSaldoOsanSai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saldo_sai' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'total_saldo_sai' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            
            'data_saldo_sai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'horas_saldo_sai' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'id_total_saldo_sai' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            'id_total_saldo_sai_portfolio' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],

            'aktivo_saldo_sai' => [
                'type'      =>'ENUM',
                'constraint'=>['0', '1'],
                'default'   =>'0',
            ],
        ]);
        $this->forge->addKey('id_saldo_sai', true);
        $this->forge->addForeignKey('id_total_saldo_sai_portfolio', 'saldo_portfolio', 'id_saldo_portfolio', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_total_saldo_sai', 'osan_sai', 'id_osan_sai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('saldo_osan_sai');
    }

    public function down()
    {
        $this->forge->dropTable('saldo_osan_sai');
    }
}
