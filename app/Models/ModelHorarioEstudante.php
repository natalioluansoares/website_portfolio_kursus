<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHorarioEstudante extends Model
{
    protected $table            = 'horario_estudante';
    protected $primaryKey       = 'id_horario_estudante ';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['materia_horario_estudante', 'kode_materia_estudante', 'horario_professores_estudante', 'horario_estudante', 'horario_classe_estudante', 'level_horario_estudante', 'data_horario_estudante', 'loron_horario_estudante', 'horas_horario_estudante', 'total_horario_estudante', 'propinas_estudante', 'horario_aktivo_estudante'];

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

    public function gethorarioestudante()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('horario_estudante');

        $builder->select('horario_estudante.horario_estudante, estudante.id_estudante, horario_estudante.id_horario_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.propinas_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus,sistema.sistema');

        $builder->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $builder->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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
    function horarioestudantePagination($num, $keyword = null)
    {
        $this->select('horario_estudante.horario_estudante, estudante.id_estudante, horario_estudante.id_horario_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante,  horario_estudante.propinas_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante,  materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus,sistema.sistema, horario.osan_kursus');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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
            $this->like('naran_kompletos', $keyword);
            $this->orLike('naran_kompleto', $keyword);
        }
        $this->orderBy('id_horario_estudante', 'DESC');
        return [
            'horarioestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filterhorarioestudante($num)
    {
       $this->select('horario_estudante.horario_estudante, estudante.id_estudante, horario_estudante.id_horario_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, horario_estudante.propinas_estudante,  materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus, sistema.sistema');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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
            'horarioestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function horarioestudante()
    {
        $this->select('horario_estudante.horario_estudante, estudante.id_estudante, horario_estudante.id_horario_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, horario_estudante.propinas_estudante,   materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus, sistema.sistema');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');
        
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
    public function resulthorarioestudante()
    {
       $this->select('horario_estudante.horario_estudante, horario_estudante.id_horario_estudante, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.id_administrator, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator,professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, horario_estudante.propinas_estudante,   materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus, sistema.sistema');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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


    // Estudante

    function estudantePagination($num, $keyword = null)
    {
        $estudante = helperEstudante()->id_estudante;
        $this->select('horario_estudante.horario_estudante, horario_estudante.id_horario_estudante, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, horario_estudante.propinas_estudante,   materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus, sistema.sistema');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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
        $this->orderBy('id_horario_estudante', 'DESC');
        $this->where('id_estudante =', $estudante);
        return [
            'horarioestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function rowhorarioestudante()
    {
        $estudante = helperEstudante()->id_estudante;
        $this->select('horario_estudante.horario_estudante, horario_estudante.id_horario_estudante, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante, administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante,horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, horario_estudante.propinas_estudante,   materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, horario.id_horario, horario.data_horario_hahu, horario.data_horario_remata, materia_kursus.materia_kursus, sistema.sistema');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');

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

        $query = $this->where('id_estudante =', $estudante)->first(); 
        return $query;
    }
}
