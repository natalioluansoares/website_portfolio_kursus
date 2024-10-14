<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationTotalSaldoEstudante extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_total_saldo_estudante' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'naran_total_saldo_estudante' => [
                'type'       => 'ENUM',
                'constraint' => ['Selu Kursus', 'Donator Kursus'],
                'default'    => 'Selu Kursus'
            ],
            'total_saldo_estudante' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'descripsaun_total_saldo_estudante' => [
                'type'       => 'TEXT',
            ],
            
            'data_total_saldo_estudante' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'foto_total_saldo_estudante' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'aktivo_total_saldo_estudante' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_total_saldo_estudante', true);
        $this->forge->createTable('total_saldo_estudante');
    }

    public function down()
    {
        $this->forge->dropTable('total_saldo_estudante');
    }
}
