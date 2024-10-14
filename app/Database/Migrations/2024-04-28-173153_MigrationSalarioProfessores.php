<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSalarioProfessores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_salario_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salario_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_salario' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'aktivo_salario_professores' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_salario_professores', true);
        $this->forge->addForeignKey('salario_professores', 'professores', 'id_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('salario_professores');
    }

    public function down()
    {
        $this->forge->dropTable('salario_professores');
    }
}
