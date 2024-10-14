<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationCategorioBackendFrontend extends Migration
{
    public function up()
        {
        $this->forge->addField([
            'id_categorio_backend_frontend' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_categorio_backend_frontend' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'categorio_backend_frontend' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'backend_frontend' => [
                'type'       => 'ENUM',
                'constraint' => ['Backend', 'Frontend'],
                'default'    => 'Backend'
            ],
            'data_categorio_backend_frontend' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_categorio_backend_frontend', true);
        $this->forge->createTable('categorio_backend_frontend');
    }

    public function down()
    {
        $this->forge->dropTable('categorio_backend_frontend');
    }
}
