<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationOsanTamaPrivado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saldo_tama' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'total_saldo_tama' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            
            'data_saldo_privado' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'aktivo_saldo_privado' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
            'id_total_privado' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            'id_total_portfolio' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_saldo_tama', true);
        $this->forge->addForeignKey('id_total_portfolio', 'saldo_portfolio', 'id_saldo_portfolio', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_total_privado', 'saldo_donator_privado', 'id_saldo_privado', 'CASCADE', 'CASCADE');
        $this->forge->createTable('saldo_tama_donator');
    }

    public function down()
    {
        $this->forge->dropTable('saldo_tama_donator');
    }
}
