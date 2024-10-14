<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAccountEstudante extends Migration
{
   public function up()
    {
        $this->forge->addField([
            'id_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'naran_primeiro' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'naran_ikus' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'naran_kompleto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'sena' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'jenero' => [
                'type'       => 'ENUM',
                'constraint' => ['Mane', 'Feto'],
                'default'    => 'Mane'
            ],
            'fatin_moris' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'loron_moris' => [
                'type' => 'date',
                'null' => true,
            ],
            'status_servisu' =>[
                'type'      =>'ENUM',
                'constraint'=>['Aktivo', 'La Aktivo'],
                'default'   =>'Aktivo',
            ],
            'numero_telefone' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'numero_eleitural' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'aktivo_estudante' => [
                'type'       => 'INT',
                'constraint' => 1,
                'null'       => true,
            ],
            'sistema_estudante' => [
                'type'       => 'BIGINT',
                'constraint' => 30,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id_estudante', true);
        $this->forge->addForeignKey('sistema_estudante', 'sistema', 'id_sistema', 'CASCADE', 'CASCADE');
        $this->forge->createTable('estudante');
    }

    public function down()
    {
        $this->forge->dropTable('estudante');
    }
}
