<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFunsionario extends Model
{
    protected $table            = 'professores';
    protected $primaryKey       = 'id_professores';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo_professores', 'conta_administrator', 'aktivo_professores'];

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

    public function cek_naran($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('professores')->where('conta_administrator', $kode);
        if ($id != null) {
            $this->table('professores')->where('id_professores !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getprofessores()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('professores');
        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function professoresPagination($num, $keyword = null)
    {
        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_professores', 'DESC');
        return [
            'professores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterprofessores($num){
        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris','image_administrator', 'numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_administrator >=', $start);
        $this->where('data_administrator <=', $end);
        return [
            'professores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function professores()
    {
        
        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resultprofessores()
    {
        
        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
