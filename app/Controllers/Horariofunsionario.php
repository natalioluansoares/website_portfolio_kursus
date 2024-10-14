<?php

namespace App\Controllers;

use App\Models\ModelFunsionario;
use App\Models\ModelHorarioFunsionario;
use App\Models\ModelMateriaProfessores;
use App\Models\ModelPreparasaunMateria;
use App\Models\ModelRoom;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Horariofunsionario extends ResourceController
{
    protected $professores;
    protected $preparasaun;
    protected $horario;
    protected $classe;
    protected $materiaprofessores;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->professores = new ModelFunsionario();
        $this->horario = new ModelHorarioFunsionario();
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->classe = new ModelRoom();
        $this->materiaprofessores = new ModelMateriaProfessores(); 
        $this->db = \Config\Database::connect();
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
                return redirect()->to(base_url(lang('horarioProfessores.horarioFunsionarioUrlPortofolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/horarioprofessores/horarioprofessores', $data);
    }
    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
         $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();

         if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->horario->where('horario_professores', $id)->where('horario_aktivo =', null)->filterhorarioprofessores($keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('horarioProfessores.showHorarioFunsionarioUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/horarioprofessores/detailhorarioprofessores', $data);
    }

    public function detailmateria($lian, $id = null)
    {
      $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->preparasaun->orderBy('aktivo_preparasaun_materia', 'DESC')->where('lian_preparasaun_materia', $lian)->where('level_preparasaun_materia', $id)->where('aktivo_materia_professores =', null)->preparasaunmateriaPagination(2, $keyword);
         $data['preparasaun'] = $this->preparasaun->where('level_preparasaun_materia', $id)->preparasaunmateria();

         if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->preparasaun->where('level_preparasaun_materia', $id)->where('lian_preparasaun_materia', $lian)->where('aktivo_preparasaun_materia =', null)->filtermateriaprofessores($keyword);
            $data['preparasaun'] = $this->preparasaun->where('level_preparasaun_materia', $id)->preparasaunmateria();
            if ($data['preparasaunmateria'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->preparasaun->orderBy('id_materia_professores', 'DESC')->where('lian_preparasaun_materia', $lian)->where('level_preparasaun_materia', $id)->where('aktivo_preparasaun_materia =', null)->preparasaunmateriaPagination(2, $keyword);
            $data['preparasaun'] = $this->preparasaun->where('level_preparasaun_materia', $id)->preparasaunmateria();
            if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/horarioprofessores/preparasaunmateria', $data);  
    }
    public function aumenta($id = null)
    {
        $data['classe'] = $this->classe->where('aktivo_classe=', null)->findAll();
        $data['preparasaun'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('materia_professores =', $id)->resultpreparasaunmateria();
        $data['row'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('materia_professores =', $id)->preparasaunmateria();
        if ($data['classe'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }

        if ($data['row'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }

        if ($data['preparasaun'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        return view('funsionario/horarioprofessores/aumentahorarioprofessores', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'materia_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaProfessores.kodeValidation').'',
                ],
            ],
            'horario_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaValidation').'',
                ],
            ],
            'horario_classe'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            'osan_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.levelValidation').'',
                ],
            ],
            'data_horario_hahu'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.preparasaunValidation').'',
                ],
            ],
            'data_horario_remata'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            'horas_tama_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'horas_sai_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'loron_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'total_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'total_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $materia_horario        = $this->request->getPost('materia_horario');
            $horario_professores    = $this->request->getPost('horario_professores');
            $horario_classe         = $this->request->getPost('horario_classe');
            $osan_kursus            = $this->request->getPost('osan_kursus');
            $data_horario_hahu      = $this->request->getPost('data_horario_hahu');
            $data_horario_remata    = $this->request->getPost('data_horario_remata');
            $horas_tama_kursus      = $this->request->getPost('horas_tama_kursus');
            $horas_sai_kursus       = $this->request->getPost('horas_sai_kursus');
            $loron_horario          = $this->request->getPost('loron_horario');
            $total_horario          = $this->request->getPost('total_horario');
            $total_estudante        = $this->request->getPost('total_estudante');

            $data = [
            'materia_horario'       => $materia_horario,
            'horario_professores'   => $horario_professores,
            'horario_classe'        => $horario_classe,
            'total_estudante'       => $total_estudante,
            'total_horario'         => $total_horario,
            'loron_horario'         => $loron_horario,
            'horas_sai_kursus'      => $horas_sai_kursus,
            'horas_tama_kursus'     => $horas_tama_kursus,
            'data_horario_remata'   => $data_horario_remata,
            'osan_kursus'           => $osan_kursus,
            'data_horario_hahu'     => $data_horario_hahu,
            'horario_aktivo'        => null,
            ];
            dd($data);
            $insert = $this->horario->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('horarioProfessores.showHorarioFunsionarioUrlPortfolio').$horario_professores))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
    
    public function edithorario($id = null, $horario)
    {
        $data['classe'] = $this->classe->where('aktivo_classe=', null)->findAll();
        $data['horario'] = $this->horario->where('horario_aktivo=', null)->where('materia_professores =', $id)->where('id_horario', $horario)->horarioprofessores();

        $data['preparasaun'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('materia_professores =', $id)->resultpreparasaunmateria();

        $data['row'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('materia_professores =', $id)->preparasaunmateria();

        if ($data['row'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }

        if ($data['preparasaun'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        return view('funsionario/horarioprofessores/trokahorarioprofessores', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'materia_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaProfessores.kodeValidation').'',
                ],
            ],
            'horario_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaValidation').'',
                ],
            ],
            'horario_classe'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            'osan_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.levelValidation').'',
                ],
            ],
            'data_horario_hahu'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.preparasaunValidation').'',
                ],
            ],
            'data_horario_remata'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            'horas_tama_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'horas_sai_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'loron_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'total_horario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
            'total_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $materia_horario        = $this->request->getPost('materia_horario');
            $horario_professores    = $this->request->getPost('horario_professores');
            $horario_classe         = $this->request->getPost('horario_classe');
            $osan_kursus            = $this->request->getPost('osan_kursus');
            $data_horario_hahu      = $this->request->getPost('data_horario_hahu');
            $data_horario_remata    = $this->request->getPost('data_horario_remata');
            $horas_tama_kursus      = $this->request->getPost('horas_tama_kursus');
            $horas_sai_kursus       = $this->request->getPost('horas_sai_kursus');
            $loron_horario          = $this->request->getPost('loron_horario');
            $total_horario          = $this->request->getPost('total_horario');
            $total_estudante        = $this->request->getPost('total_estudante');

            $data = [
            'materia_horario'       => $materia_horario,
            'horario_professores'   => $horario_professores,
            'horario_classe'        => $horario_classe,
            'total_estudante'       => $total_estudante,
            'total_horario'         => $total_horario,
            'loron_horario'         => $loron_horario,
            'horas_sai_kursus'      => $horas_sai_kursus,
            'horas_tama_kursus'     => $horas_tama_kursus,
            'data_horario_remata'   => $data_horario_remata,
            'osan_kursus'           => $osan_kursus,
            'data_horario_hahu'     => $data_horario_hahu,
            'horario_aktivo'        => null,
            ];
            $insert = $this->horario->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('horarioProfessores.showHorarioFunsionarioUrlPortfolio').$horario_professores))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $horario_aktivo = $this->request->getPost('horario_aktivo');
        $id = $this->request->getPost('id');
        $data = [
            'id_horario'        =>$id,
            'horario_aktivo'    =>$horario_aktivo,
        ];
        $insert = $this->db->table('horario')->where(['id_horario'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }
}
