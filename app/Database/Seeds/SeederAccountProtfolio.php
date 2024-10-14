<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAccountProtfolio extends Seeder
{
    public function run()
    {
        $data =[
                'naran_primeiro'  => 'Natalio Cristianto',
                'naran_ikus'  => 'Luan Soares',
                'naran_kompleto'  => 'Natalio Cristianto Luan Soares',
                'email'       => 'natalioluansoreas@gmail.com',
                'sena'       => password_hash('12345',PASSWORD_BCRYPT),
                'jenero'  => 'Mane',
                'fatin_moris'  => 'Fatuberlio',
                'loron_moris'  => '1997-12-23',
                'status_servisu'  => 'Aktivo',
                'numero_telefone'  => '+6282147675980',
                'numero_eleitural'  => '6282147675980',
                'aktivo_administrator'  => null,
                'sistema_administrator'  => 1,
                ];

        $this->db->table('administrator')->insert($data);
    } 
}