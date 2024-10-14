<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSimuSalarioProfessores extends Model
{
    protected $table            = 'salario_simu_professores';
    protected $primaryKey       = 'id_salario_simu_professores';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['salario_simu_professores', 'salario_osan_sai','horas_salario_simu_professores', 'total_simu_salario', 'total_simu_salario_impresta', 'data_salario_simu_professores', 'horas_salario_simu_professores', 'aktivo_salario_simu_professores'];

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

        $builder = $this->db->table('salario_simu_professores');

        $builder->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $builder->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $builder->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function simuSalarioFunsionarioPagination($num, $keyword = null)
    {
        $this->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('titulo_professores', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_salario_simu_professores', 'DESC');
        return [
            'simusalarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtersimuSalarioFunsionario($num){
        $this->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_salario_simu_professores >=', $start);
        $this->where('data_salario_simu_professores <=', $end);
        return [
            'simusalarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersimuSalarioFunsionarios(){
        $this->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_salario_simu_professores >=', $start);
        $this->where('data_salario_simu_professores <=', $end);
        $query = $this->findAll(); 
        return $query;
    }
    public function resultSimuSalarioFunsionario()
    {
        $this->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
    public function simuSalarioFunsionario()
    {
        $this->join('salario_professores', 'salario_simu_professores.salario_simu_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('osan_sai', 'salario_simu_professores.salario_osan_sai = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
}
