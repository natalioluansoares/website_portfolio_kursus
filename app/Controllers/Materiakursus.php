<?php

namespace App\Controllers;

use App\Models\ModelMateriaKursus;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Materiakursus extends ResourceController
{
    protected $kursus;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
       $this->kursus    = new ModelMateriaKursus();
       $this->db        = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->kursus->orderBy('id_materia_kursus', 'DESC')->where('aktivo_materia_kursus =', '0')->materiaKursusPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->kursus->where('aktivo_materia_kursus =', '0')->filterMateriaKursus($keyword);
            if ($data['materiakursus'] == null) {
                return redirect()->to(base_url(lang('materiaKursusFunsionario.materiaKursusUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->kursus->orderBy('id_materia_kursus', 'DESC')->where('aktivo_materia_kursus =', '0')->materiaKursusPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/materiakursus/materiakursus', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('funsionario/materiakursus/aumentamateriakursus');
    }

    public function create()
    {
        $validate = $this->validate([
            'materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaKursusFunsionario.materiaValidation').'',
                ],
            ],
            'level_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.levelValidation').'',
                ],
            ],
            'preso_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.osanValidation').'',
                ],
            ],
            
            'data_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.dataValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $materia_kursus             = $this->request->getPost('materia_kursus');
            $level_materia_kursus       = $this->request->getPost('level_materia_kursus');
            $preso_materia_kursus       = $this->request->getPost('preso_materia_kursus');
            $data_materia_kursus        = $this->request->getPost('data_materia_kursus');

            $data = [
            'materia_kursus'            => $materia_kursus,
            'level_materia_kursus'      => $level_materia_kursus,
            'preso_materia_kursus'      => $preso_materia_kursus,
            'data_materia_kursus'       => $data_materia_kursus,
            'aktivo_materia_kursus'     => null,
            ];
            $insert = $this->kursus->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaKursusFunsionario.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('materiaKursusFunsionario.materiaKursusUrlPortfolio')))->with('success',''.lang('materiaKursusFunsionario.successValidation').'');
            }
        }
    }

    public function edit($id = null)
    {
        $data['materiakursus'] = $this->kursus->where('id_materia_kursus', $id)->first();
        return view('funsionario/materiakursus/trokamateriakursus', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaKursusFunsionario.materiaValidation').'',
                ],
            ],
            'level_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.levelValidation').'',
                ],
            ],
            'preso_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.osanValidation').'',
                ],
            ],
            
            'data_materia_kursus'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaKursusFunsionario.dataValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $materia_kursus             = $this->request->getPost('materia_kursus');
            $level_materia_kursus       = $this->request->getPost('level_materia_kursus');
            $preso_materia_kursus       = $this->request->getPost('preso_materia_kursus');
            $data_materia_kursus        = $this->request->getPost('data_materia_kursus');

            $data = [
            'materia_kursus'            => $materia_kursus,
            'level_materia_kursus'      => $level_materia_kursus,
            'preso_materia_kursus'      => $preso_materia_kursus,
            'data_materia_kursus'       => $data_materia_kursus,
            'aktivo_materia_kursus'     => null,
            ];

            $insert = $this->kursus->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaKursusFunsionario.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('materiaKursusFunsionario.materiaKursusUrlPortfolio')))->with('success',''.lang('materiaKursusFunsionario.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_materia_kursus = $this->request->getPost('aktivo_materia_kursus');
        $id = $this->request->getPost('id');
        $data = [
            'id_materia_kursus'        =>$id,
            'aktivo_materia_kursus'    =>$aktivo_materia_kursus,
        ];
        $insert = $this->db->table('materia_kursus')->where(['id_materia_kursus'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }
}
