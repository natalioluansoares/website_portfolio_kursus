<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTotalSaldoEstudante extends Model
{
    protected $table            = 'total_saldo_estudante';
    protected $primaryKey       = 'id_total_saldo_estudante';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['naran_total_saldo_estudante', 'descripsaun_total_saldo_estudante', 'data_total_saldo_estudante', 'foto_total_saldo_estudante', 'aktivo_total_saldo_estudante'];

    public function cek_organizasaun($saldo_portfolio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('total_saldo_estudante')->where('naran_total_saldo_estudante', $saldo_portfolio);
        if ($id != null) {
            $this->table('total_saldo_estudante')->where('id_total_saldo_estudante !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_descripsaun($descripsaun, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('total_saldo_estudante')->where('descripsaun_total_saldo_estudante', $descripsaun);
        if ($id != null) {
            $this->table('total_saldo_estudante')->where('id_total_saldo_estudante !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    public function getTotalOsanEstudante()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('classe');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function totalOsanEstudantePagination($num, $keyword = null)
    {
        $this->builder();
        if ($keyword !='') {
            $this->like(' naran_total_saldo_estudante', $keyword);
            $this->orLike(' descripsaun_total_saldo_estudante', $keyword);
            $this->orLike('data_total_saldo_estudante', $keyword);
        }
        return [
            'osantotal' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterTotalOsanEstudante($num){
        $this->builder();
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_total_saldo_estudante >=', $start);
        $this->where('data_total_saldo_estudante <=', $end);
        return [
            'osantotal' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

}
