<?php

namespace App\Controllers;

use App\Models\ModelAbsensiEstudante;
use App\Models\ModelFunsionario;
use App\Models\ModelHorarioEstudante;
use App\Models\ModelHorarioFunsionario;
use App\Models\ModelMateriaProfessores;
use App\Models\ModelPreparasaunMateria;
use App\Models\ModelRoom;
use App\Models\ModelValores;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Valoresfunsionario extends ResourceController
{
    protected $professores;
    protected $estudante;
    protected $horario;
    protected $preparasaun;
    protected $classe;
    protected $valores;
    protected $absensis;
    protected $materiaprofessores;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->professores = new ModelFunsionario();
        $this->estudante = new ModelHorarioEstudante();
        $this->horario = new ModelHorarioFunsionario();
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->classe = new ModelRoom();
        $this->valores = new ModelValores();
        $this->absensis = new ModelAbsensiEstudante();
        $this->materiaprofessores = new ModelMateriaProfessores();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->professores->where('aktivo_professores =', null)->filterprofessores($keyword);
            if ($data['professores'] == null) {
                return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/professores', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
         $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();

         if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', '');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->horario->where('horario_professores', $id)->where('horario_aktivo =', null)->filterhorarioprofessores($keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if ($data['horarioprofessores'] == null) {
                return redirect()->to(base_url(lang('horarioProfessores.showHorarioFunsionarioUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/detailhorarioprofessores', $data);
    }

    public function detailvalores($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->horarioestudantePagination(20, $keyword);

        $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

        if (!$data['horario']) {
        return redirect()->back()->withInput()->with('error', '');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->estudante->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->filterhorarioestudante($keyword);
            
            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();
            
            if ($data['horarioestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->horarioestudantePagination(20, $keyword);

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

            if (!$data['horario']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/valoresestudante', $data);
    }


    public function trabalho($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->valores->orderBy('id_valores', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_valores_estudante =', 1)->where('exame =', 'TPC')->valoresestudantePagination(20, $keyword);

        $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

        if (!$data['horario']) {
        return redirect()->back()->withInput()->with('error', '');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->valores->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->where('aktivo_valores_estudante =', 1)->where('exame =', 'TPC')->filtervaloresestudante($keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->resulthorarioestudante();

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->horarioprofessores();
            
            if ($data['valoresestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio').$horario))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->valores->orderBy('id_valores', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_valores_estudante =', 1)->where('exame =', 'TPC')->valoresestudantePagination(20, $keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->resulthorarioestudante();

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

            if (!$data['horario']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/valorestrabalhoestudante', $data);
    }


    public function processotrabalho()
    {
        $validate = $this->validate([
            'estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'tpc'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'soal'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $estudante      = $this->request->getPost('estudante');
            $tpc            = $this->request->getPost('tpc');
            $soal           = $this->request->getPost('soal');
            $data = array();
            foreach( $estudante as $k => $v){
            $data[$k]['exame']=$tpc;
            $data[$k]['soal_exame']=$soal;
            $data[$k]['aktivo_valores_estudante']=1;
            $data[$k]['valores_professores']=$v;
            }
            $insert = $this->valores->insertBatch($data);
    
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('sistemaPortfolio.successValidation').'');
            }
        }
    }

    public function temporariotrabalho()
    {

        $this->db->table('valores_estudante')
            ->set('aktivo_valores_estudante',null,true)
            ->where('exame =', 'TPC')
            ->where('aktivo_valores_estudante is NOT NULL', NULL, FALSE)
            ->update();
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }

    public function texteexame($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->valores->orderBy('id_valores', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_valores_estudante =', 1)->where('exame !=', 'TPC')->valoresestudantePagination(20, $keyword);

        $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

        if (!$data['horario']) {
        return redirect()->back()->withInput()->with('error', '');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->valores->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->where('aktivo_valores_estudante =', 1)->where('exame !=', 'TPC')->filtervaloresestudante($keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->resulthorarioestudante();

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->horarioprofessores();
            
            if ($data['valoresestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio').$horario))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->valores->orderBy('id_valores', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_valores_estudante =', 1)->where('exame !=', 'TPC')->valoresestudantePagination(20, $keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->resulthorarioestudante();

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

            if (!$data['horario']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/valoresexametexteestudante', $data);
    }

    public function processoexametexte()
    {
        $validate = $this->validate([
            'estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'exame'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'soal'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $estudante      = $this->request->getPost('estudante');
            $exame            = $this->request->getPost('exame');
            $texte          = $this->request->getPost('texte');
            $soal           = $this->request->getPost('soal');
            $data = array();
            foreach( $estudante as $k => $v){
            $data[$k]['exame']=$exame;
            $data[$k]['soal_exame']=$soal;
            $data[$k]['texte']=$texte;
            $data[$k]['aktivo_valores_estudante']=1;
            $data[$k]['valores_professores']=$v;
            }
            $insert = $this->valores->insertBatch($data);
    
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('sistemaPortfolio.successValidation').'');
            }
        }
    }

    public function inputvaloresexametexte()
    {
        $validate = $this->validate([
            'estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'exame'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'texte'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'valores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $estudante      = $this->request->getPost('estudante');
            $exame          = $this->request->getPost('exame');
            $texte          = $this->request->getPost('texte');
            $valores        = $this->request->getPost('valores');
            $data = array();
            $data['exame']=$exame;
            $data['total_valores']=$valores;
            $data['texte']=$texte;
            $data['aktivo_valores_estudante']=null;
            $data['valores_professores']=$estudante;

            $insert = $this->valores->insert($data);
    
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('sistemaPortfolio.successValidation').'');
            }
        }
    }
    public function valoresexametexte()
    {
        $validate = $this->validate([
            'valores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $idvalores      = $this->request->getPost('idvalores');
            $valores            = $this->request->getPost('valores');
            $data = [
                'id_valores' =>$idvalores,
                'total_valores' =>$valores,
                'aktivo_valores_estudante' =>null,
            ];
            $insert = $this->valores->update($idvalores, $data);
    
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('sistemaPortfolio.successValidation').'');
            }
        }
    }

    public function detailvaloresestudante($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->valores->orderBy('id_valores', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('exame !=', 'TPC')->valoresestudantePagination(20, $keyword);

        $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', '');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->valores->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->where('exame !=', 'TPC')->filtervaloresestudante($keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

            
            if ($data['valoresestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio').$horario))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->valores->orderBy('id_valores', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('exame !=', 'TPC')->valoresestudantePagination(20, $keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();


            if (!$data['estudante']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/valores/detailvaloresestudante', $data);
    }

    public function temporarioexametexte()
    {

        $this->db->table('valores_estudante')
            ->set('aktivo_valores_estudante',null,true)
            ->where('exame !=', 'TPC')
            ->where('aktivo_valores_estudante is NOT NULL', NULL, FALSE)
            ->update();
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }

    // Absensi

    public function detailabsensi($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $data['horarioestudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->resulthorarioestudante();

        $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

        if (!$data['horario']) {
        return redirect()->back()->withInput()->with('error', '');
        }

        return view('funsionario/absensi/absensi', $data);
    }

    public function detailabsensifunsionario($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->absensis->orderBy('id_absensi_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->absensiestudantePagination(20, $keyword);

        $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->absensis->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->filterabsensiestudante($keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

            
            if ($data['absensiestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.detailAbsensiEstudanteFUnsionarioUrlPortofolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->absensis->orderBy('id_absensi_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->absensiestudantePagination(20, $keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();


            if (!$data['estudante']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/absensi/detailabsensi', $data);
    }

    public function aumentaabsensi()
    {
            $post       = $this->request->getPost('absensi_estudantes');
            $post1      = $this->request->getPost('absensi');
            $post2      = $this->request->getPost('numero_absensi');
            $post3      = $this->request->getPost('data_absensi_estudante');
            $data = array();
            foreach($post as $k => $v){
                $data[$k]['absensi_estudantes']=$v;
            }
            foreach($post1 as $k => $a){
                $data[$k]['absensi']=$a;
            }

            foreach($post2 as $k => $n){
                $data[$k]['numero_absensi']=$n;
            }
            foreach($post3 as $k => $d){
                $data[$k]['data_absensi_estudante']=$d;
            }

            $insert = $this->absensis->insertBatch($data);
    
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('sistemaPortfolio.successValidation').'');
            }
    }
}
