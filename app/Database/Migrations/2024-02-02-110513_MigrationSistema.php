<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSistema extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sistema' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_sistema' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'sistema' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_sistema' => [
                'type' => 'date',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_sistema', true);
        $this->forge->createTable('sistema');
    }

    public function down()
    {
        $this->forge->dropTable('sistema');
    }
}
