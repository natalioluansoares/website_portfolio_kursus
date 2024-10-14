<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationEstudanteRegisto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_estudante_registo' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo_estudante_registo' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'conta_estudante_registo' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'data_estudante_registo' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'aktivo_estudante_registo' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_estudante_registo', true);
        $this->forge->addForeignKey('conta_estudante_registo', 'estudante', 'id_estudante', 'CASCADE', 'CASCADE');
        $this->forge->createTable('estudante_registo');
    }

    public function down()
    {
        $this->forge->dropTable('estudante_registo');
    }
}
