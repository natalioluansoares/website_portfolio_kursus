<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOsanSai extends Model
{
    protected $table            = 'osan_sai';
    protected $primaryKey       = 'id_osan_sai';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_osan_sai', 'naran_osan_sai', 'total_osan_sai', 'data_osan_sai', 'horas_osan_sai', 'image_osan_sai', 'aktivo_osan_sai'];

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
        $this->table('osan_sai')->where('kode_osan_sai', $kode);
        if ($id != null) {
            $this->table('osan_sai')->where('id_osan_sai !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_organizasaun($saldo_portfolio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('osan_sai')->where('naran_osan_sai', $saldo_portfolio);
        if ($id != null) {
            $this->table('osan_sai')->where('id_osan_sai !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    public function getOsanSai()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('osan_sai');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function osanSaiPagination($num, $keyword = null)
    {
        $this->builder();

        if ($keyword != '') {
            $this->like('naran_osan_sai', $keyword);
            $this->orLike('total_osan_sai', $keyword);
            $this->orLike('data_osan_sai', $keyword);
        }
        $this->orderBy('id_osan_sai', 'DESC');
        return [
            'osansai' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterosansai($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_osan_sai >=', $start);
        $this->where('data_osan_sai <=', $end);
        return [
            'osansai' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
