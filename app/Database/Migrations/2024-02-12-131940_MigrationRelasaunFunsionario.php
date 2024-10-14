<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationRelasaunFunsionario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_relasaun' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'conta_professores' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'relasaun_categorio' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'aktivo_relasaun' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_relasaun', true);
        $this->forge->addForeignKey('conta_professores', 'professores', 'id_professores', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('relasaun_categorio', 'categorio', 'id_categorio', 'CASCADE', 'CASCADE');
        $this->forge->createTable('relasaun_categorio');
    }

    public function down()
    {
        $this->forge->dropTable('relasaun_categorio');
    }
}
