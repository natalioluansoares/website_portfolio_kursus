<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationImprestaOsanProfessores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_osan_impresta_professores' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'osan_impresta_professores' => [
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
            'aktivo_osan_impresta_professores' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_osan_impresta_professores', true);
        $this->forge->addForeignKey('osan_impresta_professores', 'salario_professores', 'id_salario_professores', 'CASCADE', 'CASCADE');
        $this->forge->createTable('osan_impresta_professores');
    }

    public function down()
    {
        $this->forge->dropTable('osan_impresta_professores');
    }
}
