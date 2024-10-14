<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSimuSalarioFunionario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_salario_simu_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salario_simu_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_simu_salario' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'total_simu_salario_impresta' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'data_salario_simu_funsionario' => [
                'type' => 'DATE',
            ],
            'aktivo_salario_simu_funsionario' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_salario_simu_funsionario', true);
        $this->forge->addForeignKey('salario_simu_funsionario', 'salario_funsionario', 'id_salario_funsionario', 'CASCADE', 'CASCADE');
        $this->forge->createTable('salario_simu_funsionario');
    }

    public function down()
    {
        $this->forge->dropTable('salario_simu_funsionario');
    }
}
