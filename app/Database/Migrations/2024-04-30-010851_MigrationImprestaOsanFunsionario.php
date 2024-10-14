<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationImprestaOsanFunsionario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_osan_impresta_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'osan_impresta_funsionario' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'total_osan_impresta' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'data_osan_impresta' => [
                'type'       => 'DATE',
            ],
            'horas_osan_impresta' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'aktivo_osan_impresta_funsionario' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_osan_impresta_funsionario', true);
        $this->forge->addForeignKey('osan_impresta_funsionario', 'salario_funsionario', 'id_salario_funsionario', 'CASCADE', 'CASCADE');
        $this->forge->createTable('osan_impresta_funsionario');
    }

    public function down()
    {
        $this->forge->dropTable('osan_impresta_funsionario');
    }
}
