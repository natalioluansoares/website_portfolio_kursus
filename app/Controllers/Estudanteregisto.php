<?php

namespace App\Controllers;

use App\Models\ModelAccountEstudante;
use App\Models\ModelEstudanteRegisto;
use App\Models\ModelRegistoEstudante;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Estudanteregisto extends ResourceController
{
    protected $registoestudante;
    protected $estudante;
    protected $db;
    protected $helpers = ['portfolio'];

    public function __construct()
    {
        $this->estudante = new ModelAccountEstudante();
        $this->registoestudante = new ModelEstudanteRegisto();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->registoestudante->orderBy('id_estudante_registo', 'DESC')->where('aktivo_estudante_registo =', null)->estudanteregistoPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->registoestudante->where('aktivo_estudante_registo =', null)->filterestudanteregisto($keyword);
            if ($data['estudante'] == null) {
                return redirect()->to(base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')))->with('error', ''.lang('registoestudante.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->registoestudante->orderBy('id_estudante_registo', 'DESC')->where('aktivo_estudante_registo =', null)->estudanteregistoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/estudante/estudante', $data);
    }

    public function new()
    {
        $data['estudante'] = $this->estudante->where('aktivo_estudante =', null)->where('aktivo_registo =', 1)->resultestudante();
        return view('funsionario/estudante/aumentaestudante', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'data_estudante_registo'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('registoestudante.dateValidation').'',
                ],
            ],
            'conta_estudante_registo'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('registoestudante.sistemaValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $conta_estudante_registo   = $this->request->getPost('conta_estudante_registo');
            $data_estudante_registo   = $this->request->getPost('data_estudante_registo');

            $estudante = $this->db->table('estudante')->getWhere(['id_estudante'=> $conta_estudante_registo])->getRow();
            $registo = [
            'aktivo_registo' => $estudante->aktivo_registo - 1,
            ];
            $this->db->table('estudante')->where(['id_estudante'=>$conta_estudante_registo])->update($registo);
            $data = [
                'conta_estudante_registo'       => $conta_estudante_registo,
                'data_estudante_registo'       => $data_estudante_registo,
            ];
    
            $insert = $this->registoestudante->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')))->with('success',''.lang('registoestudante.successValidation').'');
            }
        }
    }

     public function edit($id = null)
    {
        $data['estudante'] = $this->estudante->where('aktivo_estudante =', null)->where('aktivo_registo =', 1)->resultestudante();
        $data['student'] = $this->registoestudante->where('aktivo_estudante_registo =', null)->where('id_estudante_registo', $id)->estudanteregisto();
        if (!$data['student']) {
            return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.bukaValidation').'');
        }
        return view('funsionario/estudante/trokaestudante', $data);
    }
    public function update($id = null)
    {
        $validate = $this->validate([
            'data_estudante_registo'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('registoestudante.dateValidation').'',
                ],
            ],
            'conta_estudante_registo'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('registoestudante.sistemaValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $conta_estudante_registo   = $this->request->getPost('conta_estudante_registo');
            $data_estudante_registo   = $this->request->getPost('data_estudante_registo');
            $estudante = $this->db->table('estudante')->getWhere(['id_estudante'=> $conta_estudante_registo])->getRow();
            if ($estudante->aktivo_registo == 1) {
                $registo = [
                'aktivo_registo' => $estudante->aktivo_registo - 1,
                ];
                $this->db->table('estudante')->where(['id_estudante'=>$conta_estudante_registo])->update($registo);
                $data = [
                    'conta_estudante_registo'       => $conta_estudante_registo,
                    'data_estudante_registo'       => $data_estudante_registo,
                ];
    
                $insert = $this->registoestudante->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')))->with('success',''.lang('registoestudante.successValidation').'');
                }
            }else {
                $data = [
                    'conta_estudante_registo'       => $conta_estudante_registo,
                    'data_estudante_registo'       => $data_estudante_registo,
                ];
    
                $insert = $this->registoestudante->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')))->with('success',''.lang('registoestudante.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $aktivo_estudante_registo = $this->request->getPost('aktivo_estudante_registo');
        $id = $this->request->getPost('id');
        $data = [
            'id_estudante_registo'        =>$id,
            'aktivo_estudante_registo'    =>$aktivo_estudante_registo,
        ];
        $insert = $this->db->table('estudante_registo')->where(['id_estudante_registo'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('registuEstudanteFunsionario.estudanteRegistoUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
            }
    }
}
