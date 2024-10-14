<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelFunsionario;
use App\Models\ModelHorarioEstudante;
use App\Models\ModelHorarioFunsionario;
use App\Models\ModelMateriaProfessores;
use App\Models\ModelPreparasaunMateria;
use App\Models\ModelOsanTamaEstudante;
use App\Models\ModelRoom;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Horarioestudante extends ResourceController
{
    protected $professores;
    protected $preparasaun;
    protected $horario;
    protected $classe;
    protected $osan;
    protected $materiaprofessores;
    protected $administrator;
    protected $horarioestudante;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->professores = new ModelFunsionario();
        $this->horario = new ModelHorarioFunsionario();
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->classe = new ModelRoom();
        $this->materiaprofessores = new ModelMateriaProfessores(); 
        $this->osan = new ModelOsanTamaEstudante();
        $this->administrator = new ModelAccountProtfolio();
        $this->horarioestudante = new ModelHorarioEstudante();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);

            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->horario->where('horario_aktivo =', null)->filterhorarioprofessores($keyword);
            if ($data['horarioprofessores'] == null) {
                return redirect()->to(base_url(lang('horarioProfessores.detailHotuHorarioProfessoresUrlPortfolio')))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('estudante/horario/index', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        
    }

    public function create()
    {
        $materia        = $this->request->getPost('materia');
        $kodemateria    = $this->request->getPost('kodemateria');
        $classe         = $this->request->getPost('classe');
        $professores    = $this->request->getPost('professores');
        $level          = $this->request->getPost('level');
        $loron          = $this->request->getPost('loron');
        $total          = $this->request->getPost('total');
        $propinas       = $this->request->getPost('propinas');
        $horas          = $this->request->getPost('horas');
        $dia            = $this->request->getPost('dia');
        $horario        = $this->request->getPost('horario');

        $data = [
            'materia_horario_estudante'     =>$materia,
            'kode_materia_estudante'        =>$kodemateria,
            'horario_professores_estudante' =>$horario,
            'horario_classe_estudante'      =>$classe,
            'horario_estudante'             =>helperEstudante()->id_estudante,
            'level_horario_estudante'       =>$level,
            'data_horario_estudante'        =>$dia,
            'loron_horario_estudante'       =>$loron,
            'horas_horario_estudante'       =>$horas,
            'total_horario_estudante'       =>$total,
            'propinas_estudante'            =>$propinas,
            'horario_aktivo_estudante'      =>null,
        ];
        $insert = $this->horarioestudante->insert($data);

        if ($insert) {
            $datahorario = $this->horarioestudante->where('id_horario_estudante', $insert)->first();

            $data = [
                'total_saldo_tama_estudante' =>null,
                'data_saldo_tama_estudante' =>date('Y-m-d'),
                'id_total_tama_donator' =>1,
                'id_total_tama_estudante' =>$datahorario->id_horario_estudante,
                'id_total_saldo_portfolio' =>8,
                'aktivo_total_saldo_estudantes' =>null,
            ];
            $insert = $this->osan->insert($data);
        }
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
        }

    }

    public function edit($id = null)
    {
        //
    }

    public function update($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        //
    }
}
