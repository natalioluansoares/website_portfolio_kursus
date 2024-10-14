<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRoom extends Model
{
    protected $table            = 'classe';
    protected $primaryKey       = 'id_classe';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_classe','kode_classe', 'classe', 'data_classe','aktivo_classe'];

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

    protected $db;
    public function cek_kode($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('classe')->where('kode_classe', $kode);
        if ($id != null) {
            $this->table('classe')->where('id_classe !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_classe($classe, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('classe')->where('classe', $classe);
        if ($id != null) {
            $this->table('classe')->where('id_classe !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }

    public function getRoom()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('classe');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function classePagination($num, $keyword = null)
    {
        $this->builder();
        if ($keyword !='') {
            $this->like('classe', $keyword);
            $this->orLike('kode_classe', $keyword);
            $this->orLike('data_classe', $keyword);
        }
        return [
            'classe' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterclasse($num){
        $this->builder();
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_classe >=', $start);
        $this->where('data_classe <=', $end);
        return [
            'classe' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
