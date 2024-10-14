<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederMateria extends Seeder
{
    
    public function run()
    {
        $data = [
            [
                'titulo_materia'  => 'Materia Kona Ba Css',
                'materia'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugit quo eius voluptates maiores cupiditate inventore sunt repellat, enim, dolores rerum perspiciatis error rem reprehenderit sequi iste excepturi placeat repellendus!',
                'data_materia'  => '2024-02-22',
                'categorio_materia'  => 2,
                'aktivo_materia'  => null,
            ],
            [
                'titulo_materia'  => 'Materia Kona Ba HTML',
                'materia'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugit quo eius voluptates maiores cupiditate inventore sunt repellat, enim, dolores rerum perspiciatis error rem reprehenderit sequi iste excepturi placeat repellendus!',
                'data_materia'  => '2024-02-22',
                'categorio_materia'  => 1,
                'aktivo_materia'  => null,
            ],
            
        ];

        $this->db->table('materia')->insertBatch($data);
    }
}
