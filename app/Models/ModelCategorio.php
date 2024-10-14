<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCategorio extends Model
{
    protected $table            = 'categorio';
    protected $primaryKey       = 'id_categorio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_categorio', 'categorio', 'data_categorio', 'aktivo_categorio', 'descripsaun_categorio', 'imagem_categorio', 'administrator_categorio '];

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
        $this->table('categorio')->where('kode_categorio', $kode);
        if ($id != null) {
            $this->table('categorio')->where('id_categorio !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_categorio($categorio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('categorio')->where('categorio', $categorio);
        if ($id != null) {
            $this->table('categorio')->where('id_categorio !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getcategorio()
    {
        $this->db   = \Config\Database::connect();
        $builder = $this->db->table('categorio');
        $builder->join('administrator', 'categorio.administrator_categorio = administrator.id_administrator', 
        'naran_kompleto', 'image_administrator', 'status_servisu', 'left');
        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $nato = $this->get()->getResult();
        return $nato;
    }

    function categorioPagination($num, $keyword = null)
    {
        $this->join('administrator', 'categorio.administrator_categorio = administrator.id_administrator', 
        'naran_kompleto', 'image_administrator', 'status_servisu', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        if ($keyword != '') {
            $this->like('kode_categorio', $keyword);
            $this->orLike('categorio', $keyword);
            $this->orLike('data_categorio', $keyword);
        }
        $this->orderBy('id_categorio', 'DESC');
        return [
            'categorio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtercategorio($num){
        $this->join('administrator', 'categorio.administrator_categorio = administrator.id_administrator', 
        'naran_kompleto', 'image_administrator', 'status_servisu', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_categorio >=', $start);
        $this->where('data_categorio <=', $end);
        return [
            'categorio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function categorio()
    {
        $this->join('administrator', 'categorio.administrator_categorio = administrator.id_administrator', 
        'naran_kompleto', 'image_administrator', 'status_servisu', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $categorio = $this->first();
        return $categorio;
    }
    public function resultcategorio()
    {
        $this->join('administrator', 'categorio.administrator_categorio = administrator.id_administrator', 
        'naran_kompleto', 'image_administrator', 'status_servisu', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $categorio = $this->findAll();
        return $categorio;
    }
}
