<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAbsensiEstudante extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absensi_estudante' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'absensi_estudantes' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'absensi_estudante' => [
                'type'           => 'DATE',
            ],
            'absensi' => [
                'type'       => 'ENUM',
                'constraint' => ['Tama', 'La Tama', 'Lisensa'],
                'null'        => true,
            ],
            
        ]);
        $this->forge->addKey('id_absensi_estudante', true);
        $this->forge->addForeignKey('absensi_estudantes', 'horario_estudante', 'id_horario_estudante', 'CASCADE', 'CASCADE');
        $this->forge->createTable('absensi_estudante');
    }

    public function down()
    {
        $this->forge->dropTable('absensi_estudante');
    }
}
