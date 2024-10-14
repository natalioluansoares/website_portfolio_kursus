<?php

namespace App\Controllers;
use App\Models\ModelsalarioProfessores;
use App\Models\ModelSalarioFunsionario;
use App\Models\ModelHorarioEstudante;
use App\Models\ModelMateriaKursus;
use App\Models\ModelMateria;

class Homeestudante extends BaseController
{
    
    protected $funsionario;
    protected $professores;
    protected $estudante;
    protected $kursus;
    protected $materia;
    protected $helpers = ['portfolio'];

    public function __construct()
    {
        $this->professores = new ModelsalarioProfessores();
        $this->funsionario = new ModelSalarioFunsionario();
        $this->kursus    = new ModelMateriaKursus();
        $this->materia = new ModelMateria();
        $this->estudante = new ModelHorarioEstudante();
    }
    public function index()
    {
        $data['professores'] = $this->professores->orderBy('id_salario_professores', 'DESC')->where('aktivo_salario_professores =', null)->where('sistema =', 'Professores')->resultSalarioProfessores();
        $data['funsionario'] = $this->funsionario->orderBy('id_salario_funsionario', 'DESC')->where('aktivo_salario_funsionario =', null)->resultsalarioFunsionario();
        $data['materia'] = $this->kursus->orderBy('id_materia_kursus', 'DESC')->where('aktivo_materia_kursus =', '0')->findAll();
        $data['materiaestudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->resulthorarioestudante();
        return view('estudante/homeestudante/index', $data);
    }
    public function detailmateria($lian = null, $professores = null,  $categorio = null)
    {
        $data['materia'] = $this->materia->orderBy('id_materia', 'ASC')->where('aktivo_materia =', null)->where('administrator_categorio', $professores)->where('lian_materia =', $lian)->where('categorio', $categorio)->where('aktivo_categorio =', null)->resultmateria();
        $data['row'] = $this->materia->orderBy('id_materia', 'ASC')->where('aktivo_materia =', null)->where('administrator_categorio', $professores)->where('lian_materia =', $lian)->where('categorio', $categorio)->where('aktivo_categorio =', null)->materia();
        if (!$data['materia']) {
            return redirect()->back()->withInput()->with('error', '');
         }
        if (!$data['row']) {
            return redirect()->back()->withInput()->with('error', '');
         }
        return view('estudante/homeestudante/detailmateria', $data);
    }
}
