<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationMateriaProfessores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materia_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_materia_professores' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'materia_kursus_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'materia_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'data_materia_professores' => [
                'type'           => 'date',
                
            ],
            'aktivo_materia_professores' => [
                'type' => 'INT',
                'constraint' => 1,
                'null'      =>true
            ],
        ]);
        $this->forge->addKey('id_materia_professores', true);
        $this->forge->addForeignKey('materia_kursus_professores', 'materia_kursus', 'id_materia_kursus', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('materia_professores', 'professores', 'id_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('materia_professores');
    }

    public function down()
    {
        $this->forge->dropTable('materia_professores');
    }
}
