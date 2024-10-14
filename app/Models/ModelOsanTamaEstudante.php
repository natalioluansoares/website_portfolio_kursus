<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOsanTamaEstudante extends Model
{
    protected $table            = 'saldo_tama_estudante';
    protected $primaryKey       = 'id_saldo_tama_estudante';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['total_saldo_tama_estudante', 'data_saldo_tama_estudante', 'id_total_tama_donator', 'id_total_tama_estudante', 'id_total_saldo_portfolio', 'aktivo_total_saldo_estudantes'];


    function resultSaldoTamaEstudante()
    {
        $this->select('saldo_tama_estudante.id_total_tama_estudante,saldo_tama_estudante.id_saldo_tama_estudante , saldo_tama_estudante.id_total_tama_donator, saldo_tama_estudante.id_total_saldo_portfolio, saldo_tama_estudante.aktivo_total_saldo_estudantes, saldo_tama_estudante.data_saldo_tama_estudante, saldo_tama_estudante.total_saldo_tama_estudante,total_saldo_estudante.naran_total_saldo_estudante, estudante.id_estudante, estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario,  horario.data_horario_hahu, horario.data_horario_remata, sistema.sistema');

        $this->join('total_saldo_estudante', 'saldo_tama_estudante.id_total_tama_donator = total_saldo_estudante.id_total_saldo_estudante','naran_total_saldo_estudante', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_estudante.id_total_saldo_portfolio = saldo_portfolio.id_saldo_portfolio','kode_saldo_portfolio', 'saldo_portfolio','left');

        $this->join('horario_estudante', 'saldo_tama_estudante.id_total_tama_estudante = horario_estudante.id_horario_estudante', 'left');

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
    function rowSaldoTamaEstudante()
    {
        $this->select('saldo_tama_estudante.id_total_tama_estudante, saldo_tama_estudante.id_total_tama_donator, saldo_tama_estudante.id_total_saldo_portfolio, total_saldo_estudante.naran_total_saldo_estudante, saldo_tama_estudante.aktivo_total_saldo_estudantes,saldo_tama_estudante.data_saldo_tama_estudante, saldo_tama_estudante.total_saldo_tama_estudante, estudante.id_estudante, estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus, horario.id_horario, sistema.sistema');

        $this->join('horario_estudante', 'saldo_tama_estudante.id_total_tama_estudante = horario_estudante.id_horario_estudante', 'left');
        $this->join('total_saldo_estudante', 'saldo_tama_estudante.id_total_tama_donator = total_saldo_estudante.id_total_saldo_estudante','naran_total_saldo_estudante', 'left');
        $this->join('saldo_portfolio', 'saldo_tama_estudante.id_total_saldo_portfolio = saldo_portfolio.id_saldo_portfolio','kode_saldo_portfolio', 'saldo_portfolio','left');


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

        $query = $this->first();
        return $query;
    }

    
    public function filterOsanTamaEstudantePropinasDonator()
    {
        $request        = \Config\Services::request();
        $this->select('saldo_tama_estudante.id_total_tama_estudante, saldo_tama_estudante.id_total_tama_donator, saldo_tama_estudante.id_total_saldo_portfolio, saldo_tama_estudante.data_saldo_tama_estudante,saldo_tama_estudante.aktivo_total_saldo_estudantes, saldo_tama_estudante.total_saldo_tama_estudante, total_saldo_estudante.naran_total_saldo_estudante,  estudante.id_estudante, estudante.naran_kompletos as naran_kompleto_estudante,administrator.naran_kompleto as naran_kompleto_professores,  administrator.image_administrator, professores.titulo_professores,horario_estudante.id_horario_estudante, horario_estudante.kode_materia_estudante, horario_estudante.materia_horario_estudante, horario_estudante.horario_classe_estudante, horario_estudante.level_horario_estudante, horario_estudante.data_horario_estudante, horario_estudante.horas_horario_estudante, horario_estudante.loron_horario_estudante, horario_estudante.total_horario_estudante, materia_professores.id_materia_professores, materia_kursus.level_materia_kursus,materia_kursus.materia_kursus,horario.data_horario_hahu, horario.data_horario_remata, horario.id_horario, sistema.sistema');

        $this->join('horario_estudante', 'saldo_tama_estudante.id_total_tama_estudante = horario_estudante.id_horario_estudante', 'left');
        
        $this->join('total_saldo_estudante', 'saldo_tama_estudante.id_total_tama_donator = total_saldo_estudante.id_total_saldo_estudante','naran_total_saldo_estudante', 'left');

        $this->join('saldo_portfolio', 'saldo_tama_estudante.id_total_saldo_portfolio = saldo_portfolio.id_saldo_portfolio','kode_saldo_portfolio', 'saldo_portfolio','left');

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

        
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        // $this->where('naran_total_saldo_estudante =', 'Donator Kursus');
        $this->where('data_saldo_tama_estudante >=', $start);
        $this->where('data_saldo_tama_estudante <=', $end);
        $query = $this->findAll();
        return $query;
    }
    
    
}
