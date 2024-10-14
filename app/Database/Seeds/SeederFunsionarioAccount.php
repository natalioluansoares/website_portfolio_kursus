<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederFunsionarioAccount extends Seeder
{
    public function run()
    {
        $data =[
                'naran_primeiro_funsionario'  => 'Apriana Francisca Triforca',
                'naran_ikus_funsionario'  => 'Luan Soares',
                'naran_kompleto_funsionario'  => 'Apriana Francisca Triforca Luan Soares',
                'email_funsionario'       => 'aprianafranciscatriforcaluansoares@gmail.com',
                'sena'       => password_hash('12345',PASSWORD_BCRYPT),
                'jenero_funsionario'  => 'Feto',
                'fatin_moris_funsionario'  => 'Fatuberlio',
                'loron_moris_funsionario'  => '1997-12-23',
                'status_servisu_funsionario'  => 'Aktivo',
                'numero_telefone_funsionario'  => '+6282147675980',
                'numero_eleitural_funsionario'  => '6282147675980',
                'aktivo_funsionario'  => null,
                'sistema_funsionario'  => 2,
                ];

        $this->db->table('funsionario')->insert($data);
    }
}
