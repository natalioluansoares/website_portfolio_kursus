<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationMateriaKursus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materia_kursus' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'materia_kursus' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'level_materia_kursus' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'preso_materia_kursus' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'decripsaun_materia_kursus' => [
                'type'       => 'text',
            ],
            'icon_materia_kursus' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'aktivo_materia_kursus' => [
                'type' => 'INT',
                'constraint' => 1,
                'null'      =>true
            ],
        ]);
        $this->forge->addKey('id_materia_kursus', true);
        $this->forge->createTable('materia_kursus');
    }

    public function down()
    {
        $this->forge->dropTable('materia_kursus');
    }
}
