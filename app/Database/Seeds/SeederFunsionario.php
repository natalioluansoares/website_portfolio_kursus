<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederFunsionario extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo_professores'  => 'S.Ilkom',
                'conta_funsionario'   => 1,
                'conta_administrator' => null,
                'aktivo_professores'  => null
            ],
            [
                'titulo_professores'  => 'S.Ilkom',
                'conta_funsionario'   => null,
                'conta_administrator' => 1,
                'aktivo_professores'  => null
            ],
        ];

        $this->db->table('professores')->insertBatch($data);
    }
}
