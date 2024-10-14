<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationHorarioEstudante extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_horario_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_materia_estudante' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'materia_horario_estudante' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'horario_professores_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'horario_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'horario_classe_estudante' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'level_horario_estudante' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            
            'data_horario_estudante' => [
                'type'      =>'VARCHAR',
                'constraint' => '100',
            ],
            
            'loron_horario_estudante' => [
                'type'      =>'VARCHAR',
                'constraint' => '100',
               
            ],
            'total_horario_estudante' => [
                'type'      =>'VARCHAR',
                'constraint' => '100',
            ],
            'level_horario_estudante' => [
                'type'      =>'VARCHAR',
                'constraint' => '10',
            ],
            'horario_aktivo_estudante' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_horario_estudante', true);
        $this->forge->addForeignKey('horario_estudante', 'estudante', 'id_estudante', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('horario_professores_estudante', 'horario', 'id_horario', 'CASCADE', 'CASCADE');
        $this->forge->createTable('horario_estudante');
    }

    public function down()
    {
        $this->forge->dropTable('horario_estudante');
    }
}
