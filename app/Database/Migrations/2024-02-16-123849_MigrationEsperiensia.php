<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationEsperiensia extends Migration
{
    public function up()
        {
        $this->forge->addField([
            'id_esperiensia' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fatin_esperiensia' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
           
            'loron_esperiensia' => [
                'type'       => 'DATE',
            ],
            'esperiensia' => [
                'type'       => 'TEXT',
            ],
            'esperiensia_administrator' => [
                'type' => 'BIGINT',
                'unsigned'       => true,
                'null' => true,
            ],
            'image_esperiensia' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
            ],
            'aktivo_esperiensia' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_esperiensia', true);
        $this->forge->addForeignKey('esperiensia_administrator', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('esperiensia');
    }

    public function down()
    {
        $this->forge->dropTable('esperiensia');
    }
}
