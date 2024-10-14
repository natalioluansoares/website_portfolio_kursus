<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMateria extends Model
{
    protected $table            = 'materia';
    protected $primaryKey       = 'id_materia';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['categorio_materia', 'titulo_materia', 'materia', 'data_materia', 'lian_materia', 'aktivo_materia','youtube', 'facebook', 'instagram', 'tiktok', 'materia_administrator'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation    
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

    public function titulo_materia($titulo, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('materia')->where('titulo_materia', $titulo);
        if ($id != null) {
            $this->table('materia')->where('id_materia !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function ihamateria($materia, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('materia')->where('materia', $materia);
        if ($id != null) {
            $this->table('materia')->where('id_materia !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getmateria()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('materia');
        $builder->join('categoria', 'materia.categorio_materia = categoria.id_categorio', 
        'categorio', 'kode_categorio', 'left');
        
        $builder->join('administrator', 'categorio.administrator_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function materiaPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('categorio', 'materia.categorio_materia = categorio.id_categorio', 
        'kode_materia', 'materia','left');

        $this->join('administrator', 'categorio.administrator_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        if ($keyword != '') {
            $this->like('kode_categorio', $keyword);
            $this->orLike('categorio', $keyword);
            $this->orLike('titulo_materia', $keyword);
            $this->orLike('materia', $keyword);
            $this->orLike('data_materia', $keyword);
        }
        $this->orderBy('id_materia', 'DESC');
        return [
            'materia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtermateria($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->join('categorio', 'materia.categorio_materia = categorio.id_categorio', 
        'kode_categorio', 'categorio','left');

        $this->join('administrator', 'categorio.administrator_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        $this->where('data_materia >=', $start);
        $this->where('data_materia <=', $end);
        return [
            'materia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function materia()
    {
        
        $this->join('categorio', 'materia.categorio_materia = categorio.id_categorio', 
        'kode_categorio', 'categorio','left');

        $this->join('administrator', 'categorio.administrator_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resultmateria()
    {
        
        $this->join('categorio', 'materia.categorio_materia = categorio.id_categorio', 
        'kode_categorio', 'categorio','left');

        $this->join('administrator', 'categorio.administrator_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator  = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
