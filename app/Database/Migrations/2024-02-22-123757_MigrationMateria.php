<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationMateria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materia' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo_materia' => [
                'type'       => 'TEXT',
            ],
            'materia' => [
                'type' => 'TEXT',
            ],
            'youtube' => [
                'type' => 'TEXT',
            ],
            'facebook' => [
                'type' => 'TEXT',
            ],
            'instagram' => [
                'type' => 'TEXT',
            ],
            'tiktok' => [
                'type' => 'TEXT',
            ],
            'lian_materia' => [
                'type'       => 'ENUM',
                'constraint' => ['English', 'Portuguesa', 'Indonesia', 'Tetum'],
                'default'    => 'English'
            ],
            'data_materia' => [
                'type' => 'DATE',
            ],
            'categorio_materia' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            'source' => [
                'type' => 'TEXT',
            ],
            'aktivo_materia' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
            'materia_administrator' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_materia', true);
        $this->forge->addForeignKey('categorio_materia', 'categorio', 'id_categorio', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('materia_administrator', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('materia');
    }

    public function down()
    {
        $this->forge->dropTable('materia');
    }
}
