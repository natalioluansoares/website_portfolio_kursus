<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSaldoPortfolio extends Seeder
{
    public function run()
    {
        $data = [
            'kode_saldo_portfolio' => '1009080P',
            'saldo_portfolio'    => 'Saldo Portfolio',
            'total_saldo_portfolio'    => null,
            'data_saldo_portfolio'    => 2024-03-07,
            'aktivo_saldo_portfolio'    => null,
        ];

        // Using Query Builder
        $insert=$this->db->table('saldo_portfolio');
        $insert->insert($data);
    }
}
