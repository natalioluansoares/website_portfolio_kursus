<?php

namespace App\Controllers;

use App\Models\ModelCategorioBackendFrontend;
use App\Models\ModelProjeitoBackendFrontend;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Projeitobackend extends ResourceController
{
    protected $backend;
    protected $categorio;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->backend = new ModelProjeitoBackendFrontend();
        $this->categorio = new ModelCategorioBackendFrontend();
        $this->db = \Config\Database::connect();
    }
    public function projeitobackend($lian)
    {
         $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->categorio->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->filtercategorioproject($keyword);
            if ($data['categorio'] == null) {
                return redirect()->to(base_url(lang('projeitoBackendPortfolio.projeitoBackendFrontendUrlPortfolio')))->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            
            $data ['keyword']= $keyword;
         }
        return view('administrator/projeitobackend/categorioprojeito', $data);
    }

    
    public function hamos($lian, $id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->backend->orderBy('id_backend_frontend', 'DESC')->where('aktivo_backend_frontend =', 1)->where('projeito_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->projeitoPagination(10, $keyword);
        $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
        if (!$data['categorio']) {
                return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
            }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->backend->where('aktivo_backend_frontend =', 1)->where('projeito_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->filterprojeito($keyword);
            $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
            if ($data['backend'] == null) {
                return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')))->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->backend->orderBy('id_backend_frontend', 'DESC')->where('aktivo_backend_frontend =', 1)->where('projeito_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->projeitoPagination(10, $keyword);
             $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
             if (!$data['categorio']) {
                return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/projeitobackend/hamos', $data);
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('projeito_backend_frontend')
            ->set('aktivo_backend_frontend',null,true)
            ->where('id_backend_frontend',$id)
            ->update();
        }else {

        $this->db->table('projeito_backend_frontend')
            ->set('aktivo_backend_frontend',null,true)
            ->where('aktivo_backend_frontend is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function detailprojeito($lian, $id = null)
    {
        $data['portfolio'] = $this->backend->where('id_backend_frontend', $id)->where('lian_backend_frontend =', $lian)->projeitobackendfrontend();
        if (!$data['portfolio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/projeitobackend/detailprojeito', $data);
    }
    public function showbackend($lian, $id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->backend->orderBy('id_backend_frontend', 'DESC')->where('aktivo_backend_frontend =', null)->where('projeito_backend_frontend', $id)->where('lian_backend_frontend =', $lian)->projeitoPagination(10, $keyword);
         $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
            if (!$data['categorio']) {
                return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
            }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->backend->where('aktivo_backend_frontend =', null)->where('projeito_backend_frontend', $id)->where('lian_backend_frontend =', $lian)->filterprojeito($keyword);
            $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
            if ($data['backend'] == null) {
                return redirect()->to(base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$id))->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->backend->orderBy('id_backend_frontend', 'DESC')->where('aktivo_backend_frontend =', null)->where('projeito_backend_frontend', $id)->where('lian_backend_frontend =', $lian)->projeitoPagination(10, $keyword);
            $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
            if (!$data['categorio']) {
                return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/projeitobackend/detail', $data);
    }

    
    public function aumenta($lian, $id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->findAll();
        $data['row'] = $this->categorio->where('id_categorio_backend_frontend', $id)->where('lian_categorio_backend_frontend =', $lian)->first();
        if (!$data['row']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/projeitobackend/aumentaprojeitobackend', $data);

    }

    
    public function create()
    {
        $validate = $this->validate([

            'projeito_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.tituloValidation').'',
                ],
            ],

            'descripsaun_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('projeitoBackendPortfolio.descripsaunValidation').'',
                ],
            ],

            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.facebookValidation').'',
                ],
            ],

            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.tiktokValidation').'',
                ],
            ],

            'lian_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.lianValidation').'',
                ],
            ],

            'data_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('projeitoBackendPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
        
        $projeito_backend_frontend      = $this->request->getPost('projeito_backend_frontend');
        $titulo_backend_frontend        = $this->request->getPost('titulo_backend_frontend');
        $descripsaun_backend_frontend   = $this->request->getPost('descripsaun_backend_frontend');
        $data_backend_frontend          = $this->request->getPost('data_backend_frontend');
        $youtube                        = $this->request->getPost('youtube');
        $facebook                       = $this->request->getPost('facebook');
        $instagram                      = $this->request->getPost('instagram');
        $tiktok                         = $this->request->getPost('tiktok');
        $lian_backend_frontend          = $this->request->getPost('lian_backend_frontend');
        $materia_backend_frontend       = $this->request->getPost('materia_backend_frontend');
        $source_projeito                = $this->request->getPost('source_projeito');

         if ($this->backend->titulo_backend_frontend($titulo_backend_frontend)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('projeitoBackendPortfolio.ihaTituloValidation').'');
        }elseif ($this->backend->materia_backend_frontend($materia_backend_frontend)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('projeitoBackendPortfolio.ihaProjeitoBackendFrontendValidation').'');
        }else {

            $data = [
                'projeito_backend_frontend'         => $projeito_backend_frontend,
                'lian_backend_frontend'             => $lian_backend_frontend,
                'data_backend_frontend'             => $data_backend_frontend,
                'youtube'                           => $youtube,
                'facebook'                          => $facebook,
                'instagram'                         => $instagram,
                'tiktok'                            => $tiktok,
                'titulo_backend_frontend'           => $titulo_backend_frontend,
                'descripsaun_backend_frontend'      => $descripsaun_backend_frontend,
                'materia_backend_frontend'          => $materia_backend_frontend,
                'source_projeito'                   => $source_projeito,
                'projeito_administrator'            => helperSistema()->id_administrator,
                'aktivo_backend_frontend'           => null,
                ];
                
                $insert = $this->backend->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.errorValidation').'');
                }else {
                    return redirect()->to(base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$projeito_backend_frontend))->with('success',''.lang('projeitoBackendPortfolio.successValidation'));
                }
            }
        }
    }

    public function editbackend($lian, $id = null)
    {
        $data['backend'] = $this->backend->where('id_backend_frontend', $id)->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->projeitobackendfrontend();
        if (!$data['backend']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/projeitobackend/trokaprojeitobackend', $data);
    }

    
    public function update($id = null)
    {
        $validate = $this->validate([

            'projeito_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.tituloValidation').'',
                ],
            ],

            'descripsaun_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('projeitoBackendPortfolio.descripsaunValidation').'',
                ],
            ],

            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.facebookValidation').'',
                ],
            ],

            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.tiktokValidation').'',
                ],
            ],

            'lian_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('projeitoBackendPortfolio.lianValidation').'',
                ],
            ],

            'data_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('projeitoBackendPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
        
        $projeito_backend_frontend      = $this->request->getPost('projeito_backend_frontend');
        $titulo_backend_frontend        = $this->request->getPost('titulo_backend_frontend');
        $descripsaun_backend_frontend   = $this->request->getPost('descripsaun_backend_frontend');
        $data_backend_frontend          = $this->request->getPost('data_backend_frontend');
        $youtube                        = $this->request->getPost('youtube');
        $facebook                       = $this->request->getPost('facebook');
        $instagram                      = $this->request->getPost('instagram');
        $tiktok                         = $this->request->getPost('tiktok');
        $lian_backend_frontend          = $this->request->getPost('lian_backend_frontend');
        $materia_backend_frontend       = $this->request->getPost('materia_backend_frontend');
        $source_projeito                = $this->request->getPost('source_projeito');

        
        if ($this->backend->titulo_backend_frontend($titulo_backend_frontend, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('projeitoBackendPortfolio.ihaTituloValidation').'');
        }elseif ($this->backend->materia_backend_frontend($materia_backend_frontend, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('projeitoBackendPortfolio.ihaProjeitoBackendFrontendValidation').'');
        }else {
            $data = [
                'id_backend_frontend'               => $id,
                'lian_backend_frontend'             => $lian_backend_frontend,
                'data_backend_frontend'             => $data_backend_frontend,
                'youtube'                           => $youtube,
                'facebook'                          => $facebook,
                'instagram'                         => $instagram,
                'tiktok'                            => $tiktok,
                'titulo_backend_frontend'           => $titulo_backend_frontend,
                'descripsaun_backend_frontend'      => $descripsaun_backend_frontend,
                'materia_backend_frontend'          => $materia_backend_frontend,
                'source_projeito'                   => $source_projeito,
                'projeito_administrator'            => helperSistema()->id_administrator,
                'aktivo_backend_frontend'           => null,
                ];
                $insert = $this->backend->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.errorValidation').'');
                }else {
                    return redirect()->to(base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$projeito_backend_frontend))->with('success',''.lang('projeitoBackendPortfolio.successValidation'));
                }
            }
        }
    }

    
   public function troka()
    {
        $aktivo_backend_frontend = $this->request->getPost('aktivo_backend_frontend');
        $id = $this->request->getPost('id');
        $data = [
            'id_backend_frontend'        =>$id,
            'aktivo_backend_frontend'    =>$aktivo_backend_frontend,
        ];
        $insert = $this->db->table('projeito_backend_frontend')->where(['id_backend_frontend'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('projeitoBackendPortfolio.hamosValidation'));
        }
    }
        
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->backend->where('id_backend_frontend', $id)->delete();
        return redirect()->back()->withInput()->with('success', ''.lang('projeitoBackendPortfolio.hamosValidation').'');
    }
}
