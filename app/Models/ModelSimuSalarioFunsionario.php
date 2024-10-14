<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSimuSalarioFunsionario extends Model
{
    protected $table            = 'salario_simu_funsionario';
    protected $primaryKey       = 'id_salario_simu_funsionario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['salario_simu_funsionario', 'salario_osan_sai','horas_salario_simu_funsionario', 'total_simu_salario', 'total_simu_salario_impresta', 'data_salario_simu_funsionario', 'aktivo_salario_simu_funsionario'];

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

    public function getsimuSalarioFunsionario()
    {
        $this->db = \Config\Database::connect();

        $builder = $this->db->table('salario_simu_funsionario');

        $builder->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $builder->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $builder->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $builder->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function simuSalarioFunsionarioPagination($num, $keyword = null)
    {
        $this->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

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
        $this->orderBy('id_salario_simu_funsionario', 'DESC');
        return [
            'simusalariofunsionario' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtersimuSalarioFunsionario($num){
        $this->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_salario_simu_funsionario >=', $start);
        $this->where('data_salario_simu_funsionario <=', $end);
        return [
            'simusalariofunsionario' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersimuSalarioFunsionarios(){
        $this->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_salario_simu_funsionario >=', $start);
        $this->where('data_salario_simu_funsionario <=', $end);
        $query = $this->findAll(); 
        return $query;
    }
    public function resultSimuSalarioFunsionario()
    {
        $this->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
    public function simuSalarioFunsionario()
    {
        $this->join('salario_funsionario', 'salario_simu_funsionario.salario_simu_funsionario = salario_funsionario.id_salario_funsionario', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_funsionario.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('funsionario', 'salario_funsionario.salario_funsionario = funsionario.id_funsionario', 
        'titulo_funsionario', 'left');

        $this->join('administrator', 'funsionario.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
}
