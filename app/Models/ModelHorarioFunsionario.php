<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHorarioFunsionario extends Model
{
    protected $table            = 'horario';
    protected $primaryKey       = 'id_horario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['materia_horario', 'horario_professores', 'horario_classe', 'data_horario_hahu', 'data_horario_remata', 'loron_horario', 'total_horario', 'total_estudante', 'horario_aktivo', 'horas_tama_kursus', 'horas_sai_kursus', 'osan_kursus'];

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
    public function cek_horario($kode, $id=null)
    {
        $this->db   = \Config\Database::connect();
        $this->table('horario')->where('materia_horario', $kode);
        if ($id != null) {
            $this->table('horario')->where('id_horario !=', $id);
        }
        $nato = $this->get();
        return $nato;
    }
    public function gethorarioprofessores()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('horario');


        $builder->join('preparasaun_materia', 'horario.materia_horario = preparasaun_materia.id_preparasaun_materia', 
        'preparasaun_materia', 'left');

        $builder->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'level_materia_professores','left');

        $builder->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $builder->join('professores', 'horario.horario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $builder->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'materia_horario', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $builder->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $query = $builder->get()->getResult(); 
        return $query;
    }
    function horarioprofessoresPagination($num, $keyword = null)
    {
        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $this->join('preparasaun_materia', 'horario.materia_horario = preparasaun_materia.id_preparasaun_materia', 
        'preparasaun_materia', 'left');

        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'level_materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'horario.horario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'materia_horario', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

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
        $this->orderBy('id_horario', 'DESC');
        return [
            'horarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterhorarioprofessores($num)
    {
        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $this->join('preparasaun_materia', 'horario.materia_horario = preparasaun_materia.id_preparasaun_materia', 
        'preparasaun_materia', 'left');

        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'level_materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'horario.horario_professores = professores.id_professores', 
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
            'horarioprofessores' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function horarioprofessores()
    {
        
        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $this->join('preparasaun_materia', 'horario.materia_horario = preparasaun_materia.id_preparasaun_materia', 
        'preparasaun_materia', 'left');

        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'level_materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'horario.horario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
    public function resulthorarioprofessores()
    {
        
        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $this->join('preparasaun_materia', 'horario.materia_horario = preparasaun_materia.id_preparasaun_materia', 
        'preparasaun_materia', 'left');

        $this->join('materia_professores', 'preparasaun_materia.level_preparasaun_materia = materia_professores.id_materia_professores', 
        'kode_materia_professores', 'materia', 'level_materia_professores','left');

        $this->join('materia_kursus', 'materia_professores.materia_kursus_professores = materia_kursus.id_materia_kursus', 
        'materia_kursus','level_materia_kursus','preso_materia_kursus', 'left');

        $this->join('professores', 'horario.horario_professores = professores.id_professores', 
        'titulo_professores', 'left');

        $this->join('administrator', 'professores.conta_administrator = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');

        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->findAll(); 
        return $query;
    }
}
