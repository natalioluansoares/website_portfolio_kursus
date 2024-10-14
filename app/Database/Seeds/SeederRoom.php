<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederRoom extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_classe'  => '101010A',
                'classe'       => 'Classe A',
                'data_classe'  => '2024-03-02',
            ],
            [
                'kode_classe'   => '101010S',
                'classe'            => 'Classe B',
                'data_classe'       => '2024-03-02',
            ]
        ];

        $this->db->table('classe')->insertBatch($data);
    }
}
