<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSalarioFunsionario extends Model
{
    protected $table            = 'salario_funsionario';
    protected $primaryKey       = 'id_salario_funsionario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['salario_funsionario', 'total_salario', 'aktivo_salario_funsionario'];

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
        $this->table('salario_funsionario')->where('salario_funsionario', $kode);
        if ($id != null) {
            $this->table('salario_funsionario')->where('id_salario_funsionario !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function getsalarioFunsionario()
    {
        $this->db = \Config\Database::connect();

        $builder = $this->db->table('salario_funsionario');

        $builder->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $builder->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function salarioFunsionarioPagination($num, $keyword = null)
    {
        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('titulo_funsionario', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_salario_funsionario', 'DESC');
        return [
            'salariofunsionario' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersalarioFunsionario($num){
        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_administrator >=', $start);
        $this->where('data_administrator <=', $end);
        return [
            'salariofunsionario' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function salarioFunsionario()
    {
        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resultsalarioFunsionario()
    {
        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
