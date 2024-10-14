<?php

namespace App\Controllers;

use App\Models\ModelMateriaProfessores;
use App\Models\ModelPreparasaunMateria;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Preparasaunmateria extends ResourceController
{
    protected $materiaprofessores;
    protected $preparasaun;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->materiaprofessores = new ModelMateriaProfessores();   
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->db = \Config\Database::connect();
    }
    public function detailmateria($lian, $id = null)
    {
      $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->preparasaun->orderBy('aktivo_preparasaun_materia', 'DESC')->where('lian_preparasaun_materia', $lian)->where('level_preparasaun_materia', $id)->where('aktivo_materia_professores =', null)->preparasaunmateriaPagination(2, $keyword);
         $data['materiaprofessores'] = $this->materiaprofessores->where('id_materia_professores', $id)->materiaprofessores();
         $data['preparasaun'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('level_preparasaun_materia=', $id)->where('lian_preparasaun_materia=', $lian)->preparasaunmateria();

         if (!$data['materiaprofessores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->preparasaun->where('level_preparasaun_materia', $id)->where('lian_preparasaun_materia', $lian)->where('aktivo_preparasaun_materia =', null)->filtermateriaprofessores($keyword);
            $data['materiaprofessores'] = $this->materiaprofessores->where('id_materia_professores', $id)->materiaprofessores();

            $data['preparasaun'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('level_preparasaun_materia=', $id)->where('lian_preparasaun_materia=', $lian)->preparasaunmateria();
            if ($data['preparasaunmateria'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->preparasaun->orderBy('id_materia_professores', 'DESC')->where('lian_preparasaun_materia', $lian)->where('level_preparasaun_materia', $id)->where('aktivo_preparasaun_materia =', null)->preparasaunmateriaPagination(2, $keyword);
            $data['materiaprofessores'] = $this->materiaprofessores->where('id_materia_professores', $id)->materiaprofessores();
            $data['preparasaun'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('level_preparasaun_materia=', $id)->where('lian_preparasaun_materia=', $lian)->preparasaunmateria();
            if (!$data['materiaprofessores']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/preparasaunmateria/preparasaunmateria', $data);  
    }
    public function show($id = null)
    {
        //
    }
    public function aumenta($id)
    {
        $data['materiaprofessores'] = $this->materiaprofessores->where('aktivo_materia_professores=', null)->where('id_materia_professores', $id)->resultmateriaprofessores();
        if ($data['materiaprofessores'] == null) {
                return redirect()->to(base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$id))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
        return view('funsionario/preparasaunmateria/aumentapreparasaunmateria', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('preparasaunMateria.preparasaunValidation').'',
                ],
            ],
            'lian_preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('preparasaunMateria.lianValidation').'',
                ],
            ],
            'level_preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('preparasaunMateria.professoresValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $preparasaun_materia            = $this->request->getPost('preparasaun_materia');
            $lian_preparasaun_materia       = $this->request->getPost('lian_preparasaun_materia');
            $level_preparasaun_materia       = $this->request->getPost('level_preparasaun_materia');

            $data = [
            'preparasaun_materia'           => $preparasaun_materia,
            'level_preparasaun_materia'     => $level_preparasaun_materia,
            'lian_preparasaun_materia'      => $lian_preparasaun_materia,
            'aktivo_preparasaun_materia'    => null,
            ];
            
            $insert = $this->preparasaun->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('preparasaunMateria.preparasaunPreparasaunMateriaUrlPortfolio').$level_preparasaun_materia))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function editmateria($lian, $professores, $id = null)
    {
        $data['preparasaunmateria'] = $this->preparasaun->where('aktivo_preparasaun_materia=', null)->where('level_preparasaun_materia=', $professores)->where('id_preparasaun_materia', $id)->where('lian_preparasaun_materia=', $lian)->preparasaunmateria();

        $data['materiaprofessores'] = $this->materiaprofessores->where('aktivo_materia_professores=', null)->where('id_materia_professores', $professores)->resultmateriaprofessores();
        if ($data['preparasaunmateria'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        if ($data['materiaprofessores'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        return view('funsionario/preparasaunmateria/trokapreparasaunmateria', $data);  
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('preparasaunMateria.preparasaunValidation').'',
                ],
            ],
            'lian_preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('preparasaunMateria.lianValidation').'',
                ],
            ],
            'level_preparasaun_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('preparasaunMateria.professoresValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $preparasaun_materia            = $this->request->getPost('preparasaun_materia');
            $lian_preparasaun_materia       = $this->request->getPost('lian_preparasaun_materia');
            $level_preparasaun_materia       = $this->request->getPost('level_preparasaun_materia');

            $data = [
            'preparasaun_materia'           => $preparasaun_materia,
            'level_preparasaun_materia'     => $level_preparasaun_materia,
            'lian_preparasaun_materia'      => $lian_preparasaun_materia,
            'aktivo_preparasaun_materia'    => null,
            ];
            
            $insert = $this->preparasaun->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('preparasaunMateria.preparasaunPreparasaunMateriaUrlPortfolio').$level_preparasaun_materia))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_preparasaun_materia = $this->request->getPost('aktivo_preparasaun_materia');
        $id = $this->request->getPost('id');
        $data = [
            'id_preparasaun_materia'        =>$id,
            'aktivo_preparasaun_materia'    =>$aktivo_preparasaun_materia,
        ];
        $insert = $this->db->table('preparasaun_materia')->where(['id_preparasaun_materia'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }
}
