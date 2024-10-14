<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationHorarioFunsionario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_horario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'materia_horario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'horario_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'horario_classe' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'fulan_tinan_horario' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'data_horario_hahu' => [
                'type'       => 'DATE',
            ],
            'data_horario_remata' => [
                'type'       => 'DATE',
            ],
            'loron_horario' => [
                'type'      =>'ENUM',
                'constraint'=>['Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
                'default'   =>'Segunda-Feira',
            ],
            'total_horario' => [
                'type'      =>'ENUM',
                'constraint'=>['Tempo Kompleto', 'Semana Dala I', 'Semana Dala II', 'Semana Dala III', 'Semana Dala IV'],
                'default'   =>'Tempo Kompleto',
            ],
            'total_estudante' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'horario_aktivo' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_horario', true);
        $this->forge->addForeignKey('materia_horario', 'preparasaun_materia', 'id_preparasaun_materia', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('horario_classe', 'classe', 'id_classe', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('horario_professores', 'professores', 'id_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('horario');
    }

    public function down()
    {
        $this->forge->dropTable('horario');
    }
}
