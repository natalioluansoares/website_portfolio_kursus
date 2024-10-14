<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCategorioBackendFrontend extends Model
{
    protected $table            = 'categorio_backend_frontend';
    protected $primaryKey       = 'id_categorio_backend_frontend';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_categorio_backend_frontend', 'backend_frontend','categorio_backend_frontend', 'lian_categorio_backend_frontend','data_categorio_backend_frontend', 'aktivo_categorio_backend_frontend', 'descripsaun_categorio', 'administrator_projeito_categorio', 'image_categorio_projeito', 'image_categorio_projeito'];

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
        $this->table('categorio_backend_frontend')->where('kode_categorio_backend_frontend', $kode);
        if ($id != null) {
            $this->table('categorio_backend_frontend')->where('id_categorio_backend_frontend !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function cek_categorio($categorio, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('categorio_backend_frontend')->where('categorio_backend_frontend', $categorio);
        if ($id != null) {
            $this->table('categorio_backend_frontend')->where('id_categorio_backend_frontend !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getcategorioproject()
    {
        $this->db   = \Config\Database::connect();
        $builder = $this->table('categorio_backend_frontend');
        $builder->join('administrator', 'categorio_backend_frontend.administrator_projeito_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $nato = $this->get()->getResult();
        return $nato;
    }

    function categorioprojectPagination($num, $keyword = null)
    {
        $this->join('administrator', 'categorio_backend_frontend.administrator_projeito_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        if ($keyword != '') {
            $this->like('kode_categorio_backend_frontend', $keyword);
            $this->orLike('categorio_backend_frontend', $keyword);
            $this->orLike('backend_frontend', $keyword);
            $this->orLike('data_categorio_backend_frontend', $keyword);
        }
        $this->orderBy('id_categorio_backend_frontend', 'DESC');
        return [
            'categorio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtercategorioproject($num){
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->join('administrator', 'categorio_backend_frontend.administrator_projeito_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $this->where('data_categorio_backend_frontend >=', $start);
        $this->where('data_categorio_backend_frontend <=', $end);
        return [
            'categorio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function projeitocategorio()
    {
        $this->join('administrator', 'categorio_backend_frontend.administrator_projeito_categorio  = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $row = $this->first();
        return $row;
    }
}
