<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationSalarioFunsionario extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id_salario_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salario_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_salario' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'aktivo_salario_funsionario' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_salario_funsionario', true);
        $this->forge->addForeignKey('salario_funsionario', 'funsionario', 'id_funsionario', 'CASCADE', 'CASCADE');
        $this->forge->createTable('salario_funsionario');
    }

    public function down()
    {
        $this->forge->dropTable('salario_funsionario');
    }
}
