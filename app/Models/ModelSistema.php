<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSistema extends Model
{
    protected $table            = 'sistema';
    protected $primaryKey       = 'id_sistema';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_sistema', 'kode_sistema', 'sistema', 'data_sistema', 'aktivo_sistema'];

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
        $this->table('sistema')->where('kode_sistema', $kode);
        if ($id != null) {
            $this->table('sistema')->where('id_sistema !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_sistema($sistema, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('sistema')->where('sistema', $sistema);
        if ($id != null) {
            $this->table('sistema')->where('id_sistema !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    function getsistema()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('sistema');
        $query = $builder->get()->getResult(); 
        return $query;  
    }
    function sistemaPagination($num, $keyword = null)
    {
        $this->builder();
        if ($keyword != '') {
            $this->like('kode_sistema', $keyword);
            $this->orLike('sistema', $keyword);
            $this->orLike('data_sistema', $keyword);
        }
        $this->orderBy('id_sistema', 'DESC');
        return [
            'sistema' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtersistema($num){
        $this->builder();
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_sistema >=', $start);
        $this->where('data_sistema <=', $end);
        return [
            'sistema' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
