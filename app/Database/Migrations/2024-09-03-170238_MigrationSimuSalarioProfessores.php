<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSimuSalarioProfessores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_salario_simu_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salario_simu_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_simu_salario_professores' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'total_simu_salario_prof_impresta' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'data_salario_simu_professores' => [
                'type' => 'DATE',
            ],
            'aktivo_salario_simu_professores' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_salario_simu_professores', true);
        $this->forge->addForeignKey('salario_simu_professores', 'salario_professores', 'id_salario_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('salario_simu_professores');
    }

    public function down()
    {
        $this->forge->dropTable('salario_simu_professores');
    }
}
