<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAktivoColores extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id_color' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_color' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'color' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'position' => [
                'type'       => 'ENUM',
                'constraint' => ['Navigation', 'Header', 'Sidebar'],
                'default'    => 'Navigation'
            ],
            'aktivo_color' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_color', true);
        $this->forge->createTable('color');
    }

    public function down()
    {
        $this->forge->dropTable('color');
    }
}
