<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationRoom extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id_classe' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_classe' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'classe' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_classe' => [
                'type' => 'date',
                'null' => true,
            ],
            'aktivo_classe' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_classe', true);
        $this->forge->createTable('classe');
    }

    public function down()
    {
        $this->forge->dropTable('classe');
    }
}
