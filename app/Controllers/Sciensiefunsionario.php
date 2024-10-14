<?php

namespace App\Controllers;

use App\Models\ModelCategorio;
use App\Models\ModelMateria;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Sciensiefunsionario extends ResourceController
{
    protected $categorio;
    protected $materia;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->materia = new ModelMateria();
        $this->categorio = new ModelCategorio();
    }
    public function index()
    {
         $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', null)->categorioPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->categorio->where('aktivo_categorio =', null)->filtercategorio($keyword);
            if ($data['categorio'] == null) {
                return redirect()->to(base_url(lang('sciensieFunsionario.sciensieFunsionarioUrlPortofolio')))->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', null)->categorioPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/materia/materia', $data);
    }

     public function materia($lian,$id)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->materia->orderBy('id_materia', 'DESC')->where('aktivo_materia =', null)->where('lian_materia =', $lian)->where('categorio_materia', $id)->materiaPagination(20, $keyword);
         $data['categorio'] = $this->categorio->where('id_categorio', $id)->categorio();
         if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', '');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->materia->where('aktivo_materia =', null)->where('lian_materia =', $lian)->where('categorio_materia', $id)->filtermateria($keyword);
            $data['categorio'] = $this->categorio->where('id_categorio', $id)->categorio();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('materiaPortfolio.materiaUrlPortfolio').'/'.$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->materia->orderBy('id_materia', 'DESC')->where('aktivo_materia =', null)->where('lian_materia = ', $lian)->where('categorio_materia', $id)->materiaPagination(20, $keyword);
            $data['categorio'] = $this->categorio->where('id_categorio', $id)->categorio();
            if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', '');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/materia/detailmateria', $data);
    }
    public function aumenta($id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio =', $id)->where('aktivo_categorio =', null)->findAll();
        $data['row'] = $this->categorio->where('id_categorio =', $id)->where('aktivo_categorio =', null)->categorio();
        if (!$data['row']) {
            return redirect()->back()->withInput()->with('error', '');
        }
        return view('funsionario/materia/aumentamateria', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'categorio_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaPortfolio.tituloValidation').'',
                ],
            ],

            'data_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.dataValidation').'',
                ],
            ],
            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.facebookValidation').'',
                ],
            ],
            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.tiktokValidation').'',
                ],
            ],
            'lian_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.lianValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
        $categorio_materia      = $this->request->getPost('categorio_materia');
        $titulo_materia         = $this->request->getPost('titulo_materia');
        $data_materia           = $this->request->getPost('data_materia');
        $youtube                = $this->request->getPost('youtube');
        $facebook               = $this->request->getPost('facebook');
        $instagram              = $this->request->getPost('instagram');
        $tiktok                 = $this->request->getPost('tiktok');
        $lian_materia           = $this->request->getPost('lian_materia');
        $materia                = $this->request->getPost('materia');
            $data = [
                'categorio_materia'         => $categorio_materia,
                'lian_materia'              => $lian_materia,
                'data_materia'              => $data_materia,
                'youtube'                   => $youtube,
                'facebook'                  => $facebook,
                'instagram'                 => $instagram,
                'tiktok'                    => $tiktok,
                'titulo_materia'            => $titulo_materia,
                'materia'                   => $materia,
                'aktivo_materia'            => null,
            ];
            $insert = $this->materia->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('sciensieFunsionario.showSciensieFunsionarioUrlPortfolio').$lian_materia.'/'.$categorio_materia))->with('success',''.lang('materiaPortfolio.successValidation'));
            }
        }

    }
    public function editmateria($lian,$categorio, $id = null)
    {
        $data['categorio'] = $this->categorio->where('aktivo_categorio =', null)->where('lian_categorio =', $lian)->resultcategorio();
        $data['materia'] = $this->materia->where('lian_materia =', $lian)->where('categorio_materia  =', $categorio)->where('id_materia', $id)->materia();
        if (!$data['materia']) {
            return redirect()->back()->withInput()->with('error', '');
         }
        if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', '');
         }
        return view('funsionario/materia/trokamateria', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'categorio_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaPortfolio.tituloValidation').'',
                ],
            ],

            'data_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.dataValidation').'',
                ],
            ],
            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.facebookValidation').'',
                ],
            ],
            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.tiktokValidation').'',
                ],
            ],
            'lian_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.lianValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
        $categorio_materia      = $this->request->getPost('categorio_materia');
        $titulo_materia         = $this->request->getPost('titulo_materia');
        $data_materia           = $this->request->getPost('data_materia');
        $youtube                = $this->request->getPost('youtube');
        $facebook               = $this->request->getPost('facebook');
        $instagram              = $this->request->getPost('instagram');
        $tiktok                 = $this->request->getPost('tiktok');
        $lian_materia           = $this->request->getPost('lian_materia');
        $materia                = $this->request->getPost('materia');
            $data = [
                'categorio_materia'         => $categorio_materia,
                'lian_materia'              => $lian_materia,
                'data_materia'              => $data_materia,
                'youtube'                   => $youtube,
                'facebook'                  => $facebook,
                'instagram'                 => $instagram,
                'tiktok'                    => $tiktok,
                'titulo_materia'            => $titulo_materia,
                'materia'                   => $materia,
                'aktivo_materia'            => null,
            ];
            $insert = $this->materia->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('sciensieFunsionario.showSciensieFunsionarioUrlPortfolio').$lian_materia.'/'.$categorio_materia))->with('success',''.lang('materiaPortfolio.successValidation'));
            }
        }

    }
    public function troka()
    {
        $aktivo_materia = $this->request->getPost('aktivo_materia');
        $id = $this->request->getPost('id');
        $data = [
            'id_materia'        =>$id,
            'aktivo_materia'    =>$aktivo_materia,
        ];
        $insert = $this->db->table('materia')->where(['id_materia'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }
        
}
