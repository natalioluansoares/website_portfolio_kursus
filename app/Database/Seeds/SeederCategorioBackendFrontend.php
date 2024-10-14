<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederCategorioBackendFrontend extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_categorio_backend_frontend'  => '101010P',
                'categorio_backend_frontend'       => 'PHP',
                'data_categorio_backend_frontend'  => '2024-03-23',
                'backend_frontend'  => 'Backend',
            ],
            [
                'kode_categorio_backend_frontend'  => '101010C',
                'categorio_backend_frontend'       => 'Codeigiter 4',
                'data_categorio_backend_frontend'  => '2024-02-13',
                'backend_frontend'  => 'Frontend',
            ],
            [
                'kode_categorio_backend_frontend'  => '101010L',
                'categorio_backend_frontend'       => 'Laravel 10',
                'data_categorio_backend_frontend'  => '2024-02-23',
                'backend_frontend'  => 'Backend',
            ]
        ];

        $this->db->table('categorio_backend_frontend')->insertBatch($data);
    }
}
