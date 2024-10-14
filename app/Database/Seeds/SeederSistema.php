<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSistema extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_sistema'  => '101010A',
                'sistema'       => 'Administrator',
                'data_sistema'  => null,
            ],
            [
                'kode_sistema'  => '101010S',
            'sistema'       => 'Secretaria',
            'data_sistema'  => null,
            ]
        ];

        $this->db->table('sistema')->insertBatch($data);
    }
}
