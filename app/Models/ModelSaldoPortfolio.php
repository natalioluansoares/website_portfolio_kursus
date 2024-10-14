<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSaldoPortfolio extends Model
{
    protected $table            = 'saldo_portfolio';
    protected $primaryKey       = 'id_saldo_portfolio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_saldo_portfolio', 'kode_saldo_portfolio','saldo_portfolio', 'total_saldo_portfolio', 'aktivo_saldo_portfolio','data_saldo_portfolio'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


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

    public function cek_kode($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('saldo_portfolio')->where('kode_saldo_portfolio', $kode);
        if ($id != null) {
            $this->table('saldo_portfolio')->where('id_saldo_portfolio !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_saldo($saldo_portfolio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('saldo_portfolio')->where('saldo_portfolio', $saldo_portfolio);
        if ($id != null) {
            $this->table('saldo_portfolio')->where('id_saldo_portfolio !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    function getsaldo()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('saldo_potfolio');
        $query = $builder->get()->getResult(); 
        return $query;  
    }
    function saldoPagination($num, $keyword = null)
    {
        $this->builder();
        if ($keyword != '') {
            $this->like('kode_saldo_portfolio', $keyword);
            $this->orLike('saldo_portfolio', $keyword);
            $this->orLike('data_saldo_portfolio', $keyword);
        }
        $this->orderBy('id_saldo_portfolio', 'DESC');
        return [
            'saldo' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtersaldo($num){
        $this->builder();
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_portfolio >=', $start);
        $this->where('data_saldo_portfolio <=', $end);
        return [
            'saldo' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
