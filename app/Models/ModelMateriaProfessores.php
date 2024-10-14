<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMateriaProfessores extends Model
{
    protected $table            = 'materia_professores';
    protected $primaryKey       = 'id_materia_professores';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_materia_professores', 'materia_kursus_professores', 'materia_professores', 'data_materia_professores', 'aktivo_materia_professores'];

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

    public function getmateriaprofessores()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('materia_professores');
        $builder->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $builder->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function materiaprofessoresPagination($num, $keyword = null)
    {
        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

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
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_materia_professores', 'DESC');
        return [
            'materia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtermateriaprofessores($num){
        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_administrator >=', $start);
        $this->where('data_administrator <=', $end);
        return [
            'materia' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function materiaprofessores()
    {
        
        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resultmateriaprofessores()
    {
        
        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
