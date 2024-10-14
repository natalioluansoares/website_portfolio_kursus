<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelValores extends Model
{
    protected $table            = 'valores_estudante';
    protected $primaryKey       = 'id_valores';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['exame', 'texte', 'valores_professores', 'total_valores', 'data_valores_estudante', 'soal_exame', 'aktivo_valores_estudante'];

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
        $builder = $this->db->table('valores_estudante');

        $builder->select('valores_estudante.valores_professores, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores,  valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores, sistema.sistema');

        $builder->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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
    function valoresestudantePagination($num, $keyword = null)
    {
        $this->select('valores_estudante.valores_professores, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores, valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores, sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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
        $this->orderBy('id_valores', 'DESC');
        return [
            'valoresestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filtervaloresestudante($num)
    {
        $this->select('valores_estudante.valores_professores, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores,  valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores, sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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
        $this->where('data_horario_estudante >=', $start);
        $this->where('data_horario_estudante <=', $end);
        return [
            'valoresestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function resulthorarioestudante()
    {
        $this->select('valores_estudante.valores_professores, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus, materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores,  valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores,sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');
        
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

        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $query = $this->findAll(); 
        return $query;
    }

    // Estudante

    public function gethorarioestudanterow()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('valores_estudante');

        $estudante = helperEstudante()->naran_kompleto;

        $builder->select('valores_estudante.valores_professores, horario_estudante.id_horario_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores, administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores,  valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores,sistema.sistema');

        $builder->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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

        $query = $builder->where('naran_kompleto_estudante =', $estudante)->get()->getResult(); 
        return $query;
    }
    function rowvaloresestudantePagination($num, $keyword = null)
    {
        $estudante = helperEstudante()->id_estudante;
        $this->select('valores_estudante.id_valores, horario_estudante.id_horario_estudante, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores, valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores,sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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
            $this->like('naran_kompleto_estudante', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->where('soal_exame !=', null);
        $this->where('id_estudante =', $estudante);
        return [
            'valoresestudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function rowhorarioestudante()
    {
        // $estudante = helperEstudante()->id_estudante;
        $this->select('valores_estudante.id_valores, horario_estudante.id_horario_estudante, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores, valores_estudante.texte, valores_estudante.id_valores,sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

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

        $query = $this->findAll(); 
        return $query;
    }

    public function horarioestudante()
    {
        $estudante = helperEstudante()->id_estudante;
        $this->select('valores_estudante.valores_professores, estudante.id_estudante, 
        estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, valores_estudante.data_valores_estudante, valores_estudante.exame, valores_estudante.soal_exame, valores_estudante.total_valores,  valores_estudante.texte, valores_estudante.data_valores_estudante, valores_estudante.id_valores, sistema.sistema');

        $this->join('horario_estudante', 'valores_estudante.valores_professores = horario_estudante.id_horario_estudante', 'left');

        $this->join('estudante', 'horario_estudante.horario_estudante = estudante.id_estudante', 'left');

        $this->join('horario', 'horario_estudante.horario_professores_estudante = horario.id_horario', 
        'osan_kursus', 'left');
        
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

        $this->join('classe', 'horario.horario_classe = classe.id_classe', 
        'kode_classe', 'classe','left');

        $query = $this->where('id_estudante =', $estudante)->first(); 
        return $query;
    }
}
