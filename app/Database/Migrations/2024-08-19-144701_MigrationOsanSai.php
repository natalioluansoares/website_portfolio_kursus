<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationOsanSai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_osan_sai' => [
                'type'           => 'bigint',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_osan_sai' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'naran_osan_sai' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'total_osan_sai' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'data_osan_sai' => [
                'type'       => 'DATE',
            ],
            'horas_osan_sai' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'image_osan_sai' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'aktivo_osan_sai' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_osan_sai', true);
        $this->forge->createTable('osan_sai');
    }

    public function down()
    {
        $this->forge->dropTable('osan_sai');
    }
}
