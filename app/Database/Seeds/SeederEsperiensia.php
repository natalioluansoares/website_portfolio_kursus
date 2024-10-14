<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederEsperiensia extends Seeder
{
    public function run()
    {
        $data = [
            [
                'fatin_esperiensia'         => 'Posto Faberlhio',
                'loron_esperiensia'         => '2024-02-01',
                'esperiensia'               => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore maxime quaerat labore sit, illo molestiae iusto iure repudiandae voluptatibus magni. Velit tenetur omnis excepturi quisquam reiciendis quia suscipit fugit asperiores?',
                'esperiensia_administrator' => 1,
                'aktivo_esperiensia'        => null,
            ],
            [
                'fatin_esperiensia'         => 'Posto Same',
                'loron_esperiensia'         => '2023-02-01',
                'esperiensia'               => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore maxime quaerat labore sit, illo molestiae iusto iure repudiandae voluptatibus magni. Velit tenetur omnis excepturi quisquam reiciendis quia suscipit fugit asperiores?',
                'esperiensia_administrator' => 1,
                'aktivo_esperiensia'        => null,
            ],
            
        ];

        $this->db->table('esperiensia')->insertBatch($data);
    }
}
