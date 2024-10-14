<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPreparasaunMateria extends Model
{
    protected $table            = 'preparasaun_materia';
    protected $primaryKey       = 'id_preparasaun_materia';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['preparasaun_materia','lian_preparasaun_materia','level_preparasaun_materia','aktivo_preparasaun_materia'];

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

    public function getpreparasaunmateria()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('preparasaun_materia');
        $builder->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'data_materia_professores', 'materia_professores', 'left');

        $builder->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $builder->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function preparasaunmateriaPagination($num, $keyword = null)
    {
        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'data_materia_professores', 'materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
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
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_materia_professores', 'DESC');
        return [
            'preparasaunmateria' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterpreparasaunmateria($num)
    {
        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'data_materia_professores', 'materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

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
            'preparasaunmateria' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function preparasaunmateria()
    {
        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'data_materia_professores', 'materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resultpreparasaunmateria()
    {
        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'data_materia_professores', 'materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'materia_professores.materia_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
