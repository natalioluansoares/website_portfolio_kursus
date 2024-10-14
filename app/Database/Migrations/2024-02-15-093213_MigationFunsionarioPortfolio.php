<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigationFunsionarioPortfolio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_funsionario' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo_funsionario' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'conta_administrator' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'aktivo_funsionario' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_funsionario', true);
        $this->forge->addForeignKey('conta_administrator', 'administrator', 'id_administrator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('funsionario');
    }

    public function down()
    {
        $this->forge->dropTable('funsionario');
    }
}
