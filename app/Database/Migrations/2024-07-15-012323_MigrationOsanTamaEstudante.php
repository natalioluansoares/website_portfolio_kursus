<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationOsanTamaEstudante extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saldo_tama_estudante' => [
                'type'           => 'BIGINT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'total_saldo_tama_estudante' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            
            'data_saldo_tama_estudante' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'id_total_tama_donator' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],

            'id_total_tama_estudante' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            'id_total_saldo_portfolio' => [
                'type' => 'BIGINT',
                'constraint' => 30,
                'unsigned'       => true,
            ],
            
        ]);
        $this->forge->addKey('id_saldo_tama_estudante', true);
        $this->forge->addForeignKey('id_total_saldo_portfolio', 'saldo_portfolio', 'id_saldo_portfolio', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_total_tama_donator', 'total_saldo_estudante', 'id_total_saldo_estudante', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_total_tama_estudante', 'estudante', 'id_estudante', 'CASCADE', 'CASCADE');
        $this->forge->createTable('saldo_tama_estudante');
    }

    public function down()
    {
        $this->forge->dropTable('saldo_tama_estudante');
    }
}
