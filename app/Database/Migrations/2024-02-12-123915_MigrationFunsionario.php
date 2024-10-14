<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationFunsionario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_professores' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo_professores' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'conta_administrator' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'aktivo_professores' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_professores', true);
        $this->forge->addForeignKey('conta_administrator', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('professores');
    }

    public function down()
    {
        $this->forge->dropTable('professores');
    }
}
