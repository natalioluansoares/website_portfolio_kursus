<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

class ModelOsanTamaPrivado extends Model
{
    protected $table            = 'saldo_tama_donator';
    protected $primaryKey       = 'id_saldo_tama';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['total_saldo_tama', 'data_saldo_tama', 'aktivo_saldo_tama', 'id_total_privado','id_total_portfolio'];

    public function getsaldoTama()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('saldo_tama_donator');
        $builder->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $builder->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');
        
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function saldoTamaPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');
        if ($keyword != '') {
            $this->like('naran_organizasaun_privado', $keyword);
            $this->orLike('descripsaun_saldo_privado', $keyword);
            $this->orLike('total_saldo_privado', $keyword);
            $this->orLike('data_saldo_privado', $keyword);
        }
        $this->orderBy('id_saldo_privado', 'DESC');
        return [
            'saldotama' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersaldoTamas(){
        $request        = \Config\Services::request();
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_tama >=', $start);
        $this->where('data_saldo_tama <=', $end);
        $query = $this->findAll(); 
        return $query;
        
    }
    public function filtersaldoTama($num){
        $request        = \Config\Services::request();
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_tama >=', $start);
        $this->where('data_saldo_tama <=', $end);
        return [
            'saldotama' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersaldoTamaExport(){
        $request        = \Config\Services::request();
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_tama >=', $start);
        $this->where('data_saldo_tama <=', $end);
        $query = $this->findAll();
        return $query;
    }

    public function resultSaldotama()
    {
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $query = $this->findAll(); 
        return $query;
    }
    public function saldotama()
    {
        $this->join('saldo_donator_privado', 'saldo_tama_donator.id_total_privado = saldo_donator_privado.id_saldo_privado', 
        'kode_saldo_privado', 'naran_organizasaun_privado', 'total_saldo_privado', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_donator.id_total_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $query = $this->first(); 
        return $query;
    }
}
