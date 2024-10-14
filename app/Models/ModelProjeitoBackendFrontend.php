<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProjeitoBackendFrontend extends Model
{
    protected $table            = 'projeito_backend_frontend';
    protected $primaryKey       = 'id_backend_frontend';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo_backend_frontend','materia_backend_frontend', 'youtube', 'facebook', 'instagram', 'tiktok', 'lian_backend_frontend', 'data_backend_frontend', 'projeito_backend_frontend', 'aktivo_backend_frontend', 'source_projeito', 'projeito_administrator', 'descripsaun_backend_frontend'];

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

    public function titulo_backend_frontend($titulo, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('projeito_backend_frontend')->where('titulo_backend_frontend	', $titulo);
        if ($id != null) {
            $this->table('projeito_backend_frontend')->where('id_backend_frontend !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function materia_backend_frontend($materia, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('projeito_backend_frontend')->where('materia_backend_frontend', $materia);
        if ($id != null) {
            $this->table('projeito_backend_frontend')->where('id_backend_frontend !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getProjeito()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('projeito_backend_frontend');
        $builder->join('categorio_backend_frontend', 'projeito_backend_frontend.projeito_backend_frontend = categorio_backend_frontend.id_categorio_backend_frontend', 
        'categorio_backend_frontend', 'kode_categorio_backend_frontend', 'descripsaun_categorio', 'backend_frontend', 'left');


        $builder->join('administrator', 'projeito_backend_frontend.projeito_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function projeitoPagination($num, $keyword = null)
    {
        $this->builder();
        $this->join('categorio_backend_frontend', 'projeito_backend_frontend.projeito_backend_frontend = categorio_backend_frontend.id_categorio_backend_frontend', 
        'categorio_backend_frontend', 'kode_categorio_backend_frontend', 'descripsaun_categorio', 'backend_frontend', 'left');


        $this->join('administrator', 'projeito_backend_frontend.projeito_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        if ($keyword != '') {
            $this->like('kode_categorio_backend_frontend', $keyword);
            $this->orLike('categorio_backend_frontend', $keyword);
            $this->orLike('titulo_backend_frontend', $keyword);
            $this->orLike('materia_backend_frontend', $keyword);
            $this->orLike('backend_frontend	', $keyword);
            $this->orLike('data_backend_frontend	', $keyword);
        }
        $this->orderBy('id_backend_frontend', 'DESC');
        return [
            'backend' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterprojeito($num){
        $request        = \Config\Services::request();
        $this->join('categorio_backend_frontend', 'projeito_backend_frontend.projeito_backend_frontend = categorio_backend_frontend.id_categorio_backend_frontend', 
        'categorio_backend_frontend', 'kode_categorio_backend_frontend', 'descripsaun_categorio', 'backend_frontend', 'left');


        $this->join('administrator', 'projeito_backend_frontend.projeito_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

         $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');
        
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        


        $this->where('data_backend_frontend >=', $start);
        $this->where('data_backend_frontend <=', $end);
        return [
            'backend' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function projeitobackendfrontend()
    {
        
        $this->join('categorio_backend_frontend', 'projeito_backend_frontend.projeito_backend_frontend = categorio_backend_frontend.id_categorio_backend_frontend', 
        'categorio_backend_frontend', 'kode_categorio_backend_frontend', 'descripsaun_categorio', 'backend_frontend', 'left');


        $this->join('administrator', 'projeito_backend_frontend.projeito_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'kode_sistema', 'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
}
