<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationPreparasaunMateria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_preparasaun_materia' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'preparasaun_materia' => [
                'type'       => 'TEXT',
            ],
            'lian_preparasaun_materia' => [
                'type'       => 'ENUM',
                'constraint' => ['English', 'Portuguesa', 'Indonesia', 'Tetum'],
                'default'    => 'English'
            ],
            'level_preparasaun_materia' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'aktivo_preparasaun_materia' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_preparasaun_materia', true);
        $this->forge->addForeignKey('level_preparasaun_materia', 'materia_professores', 'id_materia_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('preparasaun_materia');
    }

    public function down()
    {
        $this->forge->dropTable('preparasaun_materia');
    }
}
