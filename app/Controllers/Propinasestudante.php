<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelOsanTamaEstudante;
class Propinasestudante extends BaseController
{
    protected $osan;
    public function __construct()
        {
            $this->db = \Config\Database::connect();
            $this->osan = new ModelOsanTamaEstudante();
        }
    public function index()
    {
        $data['donator'] = $this->osan->orderBy('id_saldo_tama_estudante', 'DESC')->where('naran_total_saldo_estudante =', 'Donator Kursus')->where('aktivo_total_saldo_estudantes =', null)->resultSaldoTamaEstudante();
        $data['selu'] = $this->osan->orderBy('id_saldo_tama_estudante', 'DESC')->where('naran_total_saldo_estudante =', 'Selu Kursus')->where('aktivo_total_saldo_estudantes =', null)->resultSaldoTamaEstudante();

        return view('estudante/propinas/propinas', $data);
     }
}
