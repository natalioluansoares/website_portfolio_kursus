<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelImprestaOsanProfessores extends Model
{
    protected $table            = 'osan_impresta_professores';
    protected $primaryKey       = 'id_osan_impresta_professores';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['osan_impresta_professores', 'total_osan_impresta', 'data_osan_impresta', 'horas_osan_impresta', 'aktivo_osan_impresta_professores'];

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

    public function getImprestaSalarioProfessores()
    {
        $this->db = \Config\Database::connect();

        $builder = $this->db->table('osan_impresta_professores');

        $builder->join('salario_professores', 'osan_impresta_professores.osan_impresta_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $builder->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function imprestaSalarioProfessoresPagination($num, $keyword = null)
    {
        $this->join('salario_professores', 'osan_impresta_professores.osan_impresta_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

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
        $this->orderBy('id_osan_impresta_professores', 'DESC');
        return [
            'imprestasalarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterImprestaSalarioProfessores($num)
    {
        $this->join('salario_professores', 'osan_impresta_professores.osan_impresta_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_osan_impresta >=', $start);
        $this->where('data_osan_impresta <=', $end);
        return [
            'imprestasalarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function imprestaSalarioProfessores()
    {
        $this->join('salario_professores', 'osan_impresta_professores.osan_impresta_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }

    public function resultimprestaSalarioProfessores()
    {
        $this->join('salario_professores', 'osan_impresta_professores.osan_impresta_professores = salario_professores.id_salario_professores', 
        'total_salario', 'left');

        $this->join('professores', 'salario_professores.salario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
