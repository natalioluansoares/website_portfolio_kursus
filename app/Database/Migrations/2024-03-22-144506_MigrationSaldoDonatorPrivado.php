<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSaldoDonatorPrivado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saldo_privado' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_saldo_privado' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'naran_organizasaun_privado' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'descripsaun_saldo_privado' => [
                'type'       => 'TEXT',
            ],
            'total_saldo_privado' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            
            'data_saldo_privado' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'foto_privado' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'aktivo_saldo_privado' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_saldo_privado', true);
        $this->forge->createTable('saldo_donator_privado');
    }

    public function down()
    {
        $this->forge->dropTable('saldo_donator_privado');
    }
}
