<?php

namespace App\Controllers;

use App\Models\ModelFunsionario;
use App\Models\ModelMateriaKursus;
use App\Models\ModelMateriaProfessores;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Materiaprofessoresportfolio extends ResourceController
{
    protected $materiaprofessores;
    protected $professores;
    protected $kursus;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->materiaprofessores   = new ModelMateriaProfessores();   
        $this->professores          = new ModelFunsionario();
        $this->kursus               = new ModelMateriaKursus();
        $this->db                   = \Config\Database::connect();
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
                return redirect()->to(base_url(lang('materiaProfessores.materiaProfessoresPortfolioUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/materiaprofessores/materiaprofessores', $data);
    }

    public function materia($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->materiaprofessores->orderBy('id_materia_professores', 'DESC')->where('materia_professores', $id)->where('aktivo_materia_professores =', null)->materiaprofessoresPagination(20, $keyword);
         $data['professores'] = $this->professores->where('id_professores', $id)->professores();

         if (!$data['professores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->materiaprofessores->where('materia_professores', $id)->where('aktivo_materia_professores =', null)->filtermateriaprofessores($keyword);
            $data['professores'] = $this->professores->where('id_professores', $id)->professores();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresPortfolioUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->materiaprofessores->orderBy('id_materia_professores', 'DESC')->where('materia_professores', $id)->where('aktivo_materia_professores =', null)->materiaprofessoresPagination(20, $keyword);
            $data['professores'] = $this->professores->where('id_professores', $id)->professores();
            if (!$data['professores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/materiaprofessores/detailmateriaprofessores', $data);
    }
    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->materiaprofessores->orderBy('id_materia_professores', 'DESC')->where('materia_professores', $id)->where('aktivo_materia_professores =', 1)->materiaprofessoresPagination(20, $keyword);
         $data['professores'] = $this->professores->where('id_professores', $id)->professores();

         if (!$data['professores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->materiaprofessores->where('materia_professores', $id)->where('aktivo_materia_professores =', 1)->filtermateriaprofessores($keyword);
            $data['professores'] = $this->professores->where('id_professores', $id)->professores();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.hamosMateriaProfessoresPortfolioUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->materiaprofessores->orderBy('id_materia_professores', 'DESC')->where('materia_professores', $id)->where('aktivo_materia_professores =', 1)->materiaprofessoresPagination(20, $keyword);
            $data['professores'] = $this->professores->where('id_professores', $id)->professores();
            if (!$data['professores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/materiaprofessores/hamosmateriaprofessores', $data);
    }
    public function detailmateria($professores, $id = null)
    {
      $data['materia'] = $this->materiaprofessores->where('aktivo_materia_professores=', null)->where('materia_professores =', $professores)->where('id_materia_professores', $id)->materiaprofessores();
      $data['professores'] = $this->professores->where('aktivo_professores=', null)->where('id_professores', $professores)->resultprofessores();
        if ($data['materia'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        if ($data['professores'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        return view('funsionario/materiaprofessores/preparasaunmateriaprofessores', $data);  
    }
    public function aumenta($id = null)
    {
        $data['kursus'] = $this->kursus->where('aktivo_materia_kursus=', null)->findAll();
        $data['professores'] = $this->professores->where('aktivo_professores=', null)->where('id_professores', $id)->resultprofessores();
        if ($data['professores'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$id))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
        return view('administrator/materiaprofessores/aumentamateriaprofessores', $data);
    }

    public function createmateria()
    {
        $validate = $this->validate([
            'kode_materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaProfessores.kodeValidation').'',
                ],
            ],
            'materia_kursus_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaValidation').'',
                ],
            ],
            'materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            
            'data_materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $kode_materia_professores           = $this->request->getPost('kode_materia_professores');
            $materia_kursus_professores         = $this->request->getPost('materia_kursus_professores');
            $materia_professores                = $this->request->getPost('materia_professores');
            $data_materia_professores           = $this->request->getPost('data_materia_professores');

            $data = [
            'kode_materia_professores'          => $kode_materia_professores,
            'materia_kursus_professores'       => $materia_kursus_professores,
            'materia_professores'               => $materia_professores,
            'data_materia_professores'          => $data_materia_professores,
            'aktivo_materia_professores'        => null,
            ];
            $insert = $this->materiaprofessores->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresPortfolioUrlPortfolio').$materia_professores))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function editmateria($professores, $id = null)
    {

        $data['kursus'] = $this->kursus->where('aktivo_materia_kursus=', null)->findAll();
        $data['materia'] = $this->materiaprofessores->where('aktivo_materia_professores=', null)->where('materia_professores =', $professores)->where('id_materia_professores', $id)->materiaprofessores();
        $data['professores'] = $this->professores->where('aktivo_professores=', null)->where('id_professores', $professores)->resultprofessores();
            if ($data['materia'] == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
            if ($data['professores'] == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
            return view('administrator/materiaprofessores/trokamateriaprofessores', $data);  
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaProfessores.kodeValidation').'',
                ],
            ],
            'materia_kursus_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaValidation').'',
                ],
            ],
            'materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.materiaProfessoresValidation').'',
                ],
            ],
            
            'data_materia_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaProfessores.dataValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $kode_materia_professores           = $this->request->getPost('kode_materia_professores');
            $materia_kursus_professores         = $this->request->getPost('materia_kursus_professores');
            $materia_professores                = $this->request->getPost('materia_professores');
            $data_materia_professores           = $this->request->getPost('data_materia_professores');

            $data = [
            'kode_materia_professores'          => $kode_materia_professores,
            'materia_kursus_professores'        => $materia_kursus_professores,
            'materia_professores'               => $materia_professores,
            'data_materia_professores'          => $data_materia_professores,
            'aktivo_materia_professores'        => null,
            ];
            
            $insert = $this->materiaprofessores->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresPortfolioUrlPortfolio').$materia_professores))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_materia_professores = $this->request->getPost('aktivo_materia_professores');
        $id = $this->request->getPost('id');
        $data = [
            'id_materia_professores'        =>$id,
            'aktivo_materia_professores'    =>$aktivo_materia_professores,
        ];
        $insert = $this->db->table('materia_professores')->where(['id_materia_professores'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('materia_professores')
            ->set('aktivo_materia_professores',null,true)
            ->where('id_materia_professores ',$id)
            ->update();
        }else {

        $this->db->table('materia_professores')
            ->set('aktivo_materia_professores',null,true)
            ->where('aktivo_materia_professores is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->materiaprofessores->where('id_materia_professores', $id)->delete();
        return redirect()->back()->withInput()->with('success', ''.lang('materiaPortfolio.hamosValidation').'');
    }
}
