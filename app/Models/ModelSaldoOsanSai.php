<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSaldoOsanSai extends Model
{
    protected $table            = 'saldo_osan_sai';
    protected $primaryKey       = 'id_saldo_sai';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['total_saldo_sai', 'data_saldo_sai', 'horas_saldo_sai', 'id_total_saldo_sai', 'id_total_saldo_sai_portfolio'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getsaldoOsanSai()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('saldo_osan_sai');
        $builder->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $builder->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');
        
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function saldoOsanSaiPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');
        if ($keyword != '') {
            $this->like('naran_osan_sai', $keyword);
            $this->orLike('total_saldo_sai', $keyword);
            $this->orLike('data_saldo_sai', $keyword);
            $this->orLike('horas_saldo_sai', $keyword);
        }
        $this->orderBy('id_saldo_sai', 'DESC');
        return [
            'saldoosansai' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersaldoOsanSais(){
        $request        = \Config\Services::request();
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_sai >=', $start);
        $this->where('data_saldo_sai <=', $end);
        $query = $this->findAll(); 
        return $query;
        
    }
    public function filtersaldoOsanSai($num){
        $request        = \Config\Services::request();
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_sai >=', $start);
        $this->where('data_saldo_sai <=', $end);
        return [
            'saldoosansai' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersaldoOsanSaiExport(){
        $request        = \Config\Services::request();
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_sai >=', $start);
        $this->where('data_saldo_sai <=', $end);
        $query = $this->findAll();
        return $query;
    }

    public function resultsaldoOsanSai()
    {
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $query = $this->findAll(); 
        return $query;
    }
    public function saldoOsan()
    {
        $this->join('osan_sai', 'saldo_osan_sai.id_total_saldo_sai = osan_sai.id_osan_sai', 
        'kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'left');
        $this->join('saldo_portfolio', 'saldo_osan_sai.id_total_saldo_sai_portfolio = saldo_portfolio.id_saldo_portfolio', 
        'kode_saldo_portfolio', 'saldo_portfolio', 'total_saldo_portfolio', 'left');

        $query = $this->first(); 
        return $query;
    }
}
