<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSaldoPortfolio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saldo_portfolio' => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_saldo_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'saldo_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'total_saldo_portfolio' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'data_saldo_portfolio' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'aktivo_saldo_portfolio' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_saldo_portfolio', true);
        $this->forge->createTable('saldo_portfolio');
    }

    public function down()
    {
        $this->forge->dropTable('saldo_portfolio');
    }
}
