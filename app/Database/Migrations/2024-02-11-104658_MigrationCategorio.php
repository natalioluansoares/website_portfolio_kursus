<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationCategorio extends Migration
{
        public function up()
        {
        $this->forge->addField([
            'id_categorio' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_categorio' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'categorio' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_categorio' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_categorio', true);
        $this->forge->createTable('categorio');
    }

    public function down()
    {
        $this->forge->dropTable('categorio');
    }
}
