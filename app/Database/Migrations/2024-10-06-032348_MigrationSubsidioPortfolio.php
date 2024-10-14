<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSubsidioPortfolio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_subsidio' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salario_subsidio_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'salario_subsidio_osan_sai' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_subsidio' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'horas_foti_subsidio' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'data_hahu_aktividade' => [
                'type' => 'DATE',
            ],
            'data_remata_aktividade' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'aktivo_subsidio' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_subsidio', true);
        $this->forge->addForeignKey('salario_subsidio_funsionario', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('salario_subsidio_osan_sai', 'osan_sai', 'id_osan_sai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('subsidio');
    }

    public function down()
    {
        $this->forge->dropTable('subsidio');
    }
}
