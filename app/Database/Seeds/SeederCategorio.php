<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederCategorio extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_categorio'  => '101010H',
                'categorio'       => 'HTML',
                'data_categorio'  => null,
            ],
            [
                'kode_categorio'  => '101010S',
                'categorio'       => 'CSS',
                'data_categorio'  => null,
            ],
            [
                'kode_categorio'  => '101010J',
                'categorio'       => 'Javascript',
                'data_categorio'  => null,
            ]
        ];

        $this->db->table('categorio')->insertBatch($data);
    }
}
