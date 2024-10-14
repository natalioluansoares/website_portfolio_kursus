<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSaldoDonatorPrivado extends Model
{
    protected $table            = 'saldo_donator_privado';
    protected $primaryKey       = 'id_saldo_privado';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_saldo_privado', 'naran_organizasaun_privado', 'descripsaun_saldo_privado', 'data_saldo_privado', 'foto_privado', 'aktivo_saldo_privado'];

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

    public function cek_kode($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('saldo_donator_privado')->where('kode_saldo_privado', $kode);
        if ($id != null) {
            $this->table('saldo_donator_privado')->where('id_saldo_privado !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_organizasaun($saldo_portfolio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('saldo_donator_privado')->where('naran_organizasaun_privado', $saldo_portfolio);
        if ($id != null) {
            $this->table('saldo_donator_privado')->where('id_saldo_privado !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_descripsaun($descripsaun, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('saldo_donator_privado')->where('descripsaun_saldo_privado', $descripsaun);
        if ($id != null) {
            $this->table('saldo_donator_privado')->where('id_saldo_privado !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    public function getprivado()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('saldo_donator_privado');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function privadoPagination($num, $keyword = null)
    {
        $this->builder();

        if ($keyword != '') {
            $this->like('naran_organizasaun_privado', $keyword);
            $this->orLike('descripsaun_saldo_privado', $keyword);
            $this->orLike('total_saldo_privado', $keyword);
            $this->orLike('data_saldo_privado', $keyword);
        }
        $this->orderBy('id_saldo_privado', 'DESC');
        return [
            'privado' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterprivado($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_saldo_privado >=', $start);
        $this->where('data_saldo_privado <=', $end);
        return [
            'privado' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
