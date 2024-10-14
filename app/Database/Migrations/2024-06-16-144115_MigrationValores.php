<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationValores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_valores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'exame' => [
                'type'       => 'ENUM',
                'constraint' => ['TPC', 'Texte', 'Exame'],
                'default'    => 'TPC'
            ],
            'texte' => [
                'type'       => 'ENUM',
                'constraint' => ['Texte I', 'Texte II', 'Texte III', 'Texte IV', 'Texte V', 'Texte VI', 'Texte VII', 'Texte VIII', 'Texte IX', 'Texte X', 'Exame'],
                'null'        => true,
            ],
            'valores_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'valores_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            
            'total_valores' => [
                'type'          =>'DOUBLE',
                'constraint'    => 30,
            ],
            'data_horario_estudante' => [
                'type'              => 'DATETIME',
            ],
            'soal_exame' => [
                'type'      =>'TEXT',
            ],
            
        ]);
        $this->forge->addKey('id_valores', true);
        $this->forge->addForeignKey('valores_estudante', 'estudante', 'id_estudante', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('valores_professores', 'horario_estudante', 'id_horario_estudante', 'CASCADE', 'CASCADE');
        $this->forge->createTable('valores_estudante');
    }

    public function down()
    {
        $this->forge->dropTable('valores_estudante');
    }
}
