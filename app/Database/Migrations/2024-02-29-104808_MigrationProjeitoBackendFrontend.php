<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationProjeitoBackendFrontend extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_backend_frontend' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo_backend_frontend' => [
                'type'       => 'TEXT',
            ],
            'descripsaun_backend_frontend' => [
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
            'lian_backend_frontend' => [
                'type'       => 'ENUM',
                'constraint' => ['English', 'Portuguesa', 'Indonesia', 'Tetum'],
                'default'    => 'English'
            ],
            'data_backend_frontend' => [
                'type' => 'DATE',
            ],
            'projeito_backend_frontend' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            'aktivo_backend_frontend' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
            'projeito_administrator' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_backend_frontend', true);
        $this->forge->addForeignKey('projeito_backend_frontend', 'categorio_backend_frontend', 'id_categorio_backend_frontend', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('projeito_administrator', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('projeito_backend_frontend');
    }

    public function down()
    {
        $this->forge->dropTable('projeito_backend_frontend');
    }
}
