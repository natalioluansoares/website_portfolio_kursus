<?php

namespace App\Controllers;

use App\Models\ModelCategorioBackendFrontend;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Categoriobackendfrontend extends ResourceController
{
    protected $helpers = ['portfolio'];
    protected $categorio;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->categorio = new ModelCategorioBackendFrontend();
    }
    
    public function categoriobackendfrontend($lian)
    {
         $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->categorio->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->filtercategorioproject($keyword);
            if ($data['categorio'] == null) {
                return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')))->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', null)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/categorioprojeito/categorioprojeito', $data);
    }

    public function hamos($lian)
    {
         $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', 1)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->categorio->where('aktivo_categorio_backend_frontend =', 1)->where('lian_categorio_backend_frontend =', $lian)->filtercategorioproject($keyword);
            if ($data['categorio'] == null) {
                return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.hamosCategorioBackendFrontendUrlPortfolio')))->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio_backend_frontend', 'DESC')->where('aktivo_categorio_backend_frontend =', 1)->where('lian_categorio_backend_frontend =', $lian)->categorioprojectPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/categorioprojeito/hamos', $data);
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('categorio_backend_frontend')
            ->set('aktivo_categorio_backend_frontend',null,true)
            ->where('id_categorio_backend_frontend',$id)
            ->update();
        }else {

        $this->db->table('categorio_backend_frontend')
            ->set('aktivo_categorio_backend_frontend',null,true)
            ->where('aktivo_categorio_backend_frontend is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('categoriobackendfrontendPortfolio.hamosCategorioBackendFrontendUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('categoriobackendfrontendPortfolio.hamosCategorioBackendFrontendUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }
    public function show($id = null)
    {
        //
    }

    
    public function new()
    {
        return view('administrator/categorioprojeito/aumentacategorioprojeito');
    }

    
    public function create()
    {

        $validate = $this->validate([
            'kode_categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.kodeValidation').'',
                ],
            ],
            'categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categoriobackendfrontendPortfolio.categorioValidation').'',
                ],
            ],

            'backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.projectValidation').'',
                ],
            ],

             'descripsaun_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categoriobackendfrontendPortfolio.descripsaunValidation').'',
                ],
            ],

            'data_categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.dataValidation').'',
                ],
            ],
            'image_categorio_projeito'=> [
            'rules' => 'uploaded[image_categorio_projeito]|mime_in[image_categorio_projeito,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_categorio_projeito,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $kode_categorio                             = $this->request->getPost('kode_categorio_backend_frontend');
            $descripsaun_categorio                      = $this->request->getPost('descripsaun_categorio');
            $categorio                                  = $this->request->getPost('categorio_backend_frontend');
            $backend_frontend                           = $this->request->getPost('backend_frontend');
            $data_categorio                             = $this->request->getPost('data_categorio_backend_frontend');
            $administrator_projeito_categorio           = $this->request->getPost('administrator_projeito_categorio');
            $lian_categorio_backend_frontend            = $this->request->getPost('lian_categorio_backend_frontend');
            $image                                      = $this->request->getFile('image_categorio_projeito');
            $datafoto                                   = $image->getRandomName();

            $data = [
                'kode_categorio_backend_frontend'   => $kode_categorio,
                'categorio_backend_frontend'        => $categorio,
                'backend_frontend'                  => $backend_frontend,
                'descripsaun_categorio'             => $descripsaun_categorio,
                'lian_categorio_backend_frontend'   => $lian_categorio_backend_frontend,
                'administrator_projeito_categorio'  => $administrator_projeito_categorio,
                'data_categorio_backend_frontend'   => $data_categorio,
                'image_categorio_projeito'          => $datafoto,
                'aktivo_categorio_backend_frontend' => null,
            ];
            $insert = $this->categorio->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categoriobackendfrontendPortfolio.errorValidation').'');
            }else{
                $image->move('uploads/fotocategorioprojeito/', $datafoto);
                return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')))->with('success',''.lang('categoriobackendfrontendPortfolio.successValidation').'');
            }
        }
    }
   
    public function edit($id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio_backend_frontend', $id)->first();
        if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('categoriobackendfrontendPortfolio.bukaValidation').'');
        }
        return view('administrator/categorioprojeito/trokacategorioprojeito', $data);
    }

    
    public function update($id = null)
    {
         $validate = $this->validate([
            'kode_categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.kodeValidation').'',
                ],
            ],
            'categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categoriobackendfrontendPortfolio.categorioValidation').'',
                ],
            ],

            'backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.projectValidation').'',
                ],
            ],

             'descripsaun_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categoriobackendfrontendPortfolio.descripsaunValidation').'',
                ],
            ],

            'data_categorio_backend_frontend'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categoriobackendfrontendPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $kode_categorio                             = $this->request->getPost('kode_categorio_backend_frontend');
            $descripsaun_categorio                      = $this->request->getPost('descripsaun_categorio');
            $categorio                                  = $this->request->getPost('categorio_backend_frontend');
            $backend_frontend                           = $this->request->getPost('backend_frontend');
            $administrator_projeito_categorio           = $this->request->getPost('administrator_projeito_categorio');
            $lian_categorio_backend_frontend            = $this->request->getPost('lian_categorio_backend_frontend');
            $data_categorio                             = $this->request->getPost('data_categorio_backend_frontend');
            
            $data = [
                'id_categorio_backend_frontend'     => $id,
                'kode_categorio_backend_frontend'   => $kode_categorio,
                'categorio_backend_frontend'        => $categorio,
                'descripsaun_categorio'             => $descripsaun_categorio,
                'backend_frontend'                  => $backend_frontend,
                'lian_categorio_backend_frontend'   => $lian_categorio_backend_frontend,
            'administrator_projeito_categorio'      => $administrator_projeito_categorio,
                'data_categorio_backend_frontend'   => $data_categorio,
                'aktivo_categorio_backend_frontend' => null,
            ];
            $insert = $this->categorio->update($id,$data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categoriobackendfrontendPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')))->with('success',''.lang('categoriobackendfrontendPortfolio.successValidation').'');
            }
        }
    }

    
    public function troka()
    {
        $aktivo_categorio = $this->request->getPost('aktivo_categorio_backend_frontend');
        $id = $this->request->getPost('id');
        $data = [
            'id_categorio_backend_frontend'        =>$id,
            'aktivo_categorio_backend_frontend'    =>$aktivo_categorio,
        ];
        $insert = $this->db->table('categorio_backend_frontend')->where(['id_categorio_backend_frontend'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('categoriobackendfrontendPortfolio.errorValidation').'');
        }else{
            return redirect()->to(base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio')))->with('success',''.lang('categoriobackendfrontendPortfolio.successValidation').'');
        }
    }
        
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->categorio->where('id_categorio_backend_frontend', $id)->delete();
        return redirect()->back()->with('success', ''.lang('categoriobackendfrontendPortfolio.hamosValidation').'');
    }
}
