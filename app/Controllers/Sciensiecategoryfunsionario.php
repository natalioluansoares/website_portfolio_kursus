<?php

namespace App\Controllers;

use App\Models\ModelCategorio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Faker\Provider\Lorem;

class Sciensiecategoryfunsionario extends ResourceController
{
    protected $categorio;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
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
                return redirect()->to(base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')))->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', null)->categorioPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/categoriomateria/categoriomateria', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('funsionario/categoriomateria/aumentacategoriomateria');
    }

    public function create()
    {
        $validate = $this->validate([
            'kode_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.kodeValidation').'',
                ],
            ],
            'categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categorioPortfolio.categorioValidation').'',
                ],
            ],

            'data_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.dataValidation').'',
                ],
            ],

            'descripsaun_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.descriptionValidation').'',
                ],
            ],
            'imagem_categorio'=> [
            'rules' => 'uploaded[imagem_categorio]|mime_in[imagem_categorio,image/jpg,image/jpeg,image/gif,image/png]|max_size[imagem_categorio,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $kode_categorio             = $this->request->getPost('kode_categorio');
            $categorio                  = $this->request->getPost('categorio');
            $data_categorio             = $this->request->getPost('data_categorio');
            $descripsaun_categorio      = $this->request->getPost('descripsaun_categorio');
            $naran_professores          = $this->request->getPost('naran_professores');
            $image                      = $this->request->getFile('imagem_categorio');
            $datafoto                   = $image->getRandomName();
            $data = [
                'kode_categorio'            => $kode_categorio,
                'categorio'                 => $categorio,
                'data_categorio'            => $data_categorio,
                'descripsaun_categorio'     => $descripsaun_categorio,
                'imagem_categorio'          => $datafoto,
                'administrator_categorio '  => $naran_professores,
            ];
    
            $insert = $this->categorio->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.errorValidation').'');
            }else{
                $image->move('uploads/fotocategoriomateria/', $datafoto);
                return redirect()->to(base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
            }

        }
    }   
    public function edit($id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
        if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
        }
        return view('funsionario/categoriomateria/trokacategoriomateria', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.kodeValidation').'',
                ],
            ],
            'categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('categorioPortfolio.categorioValidation').'',
                ],
            ],

            'data_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.dataValidation').'',
                ],
            ],

            'descripsaun_categorio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('categorioPortfolio.descriptionValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $kode_categorio             = $this->request->getPost('kode_categorio');
            $categorio                  = $this->request->getPost('categorio');
            $data_categorio             = $this->request->getPost('data_categorio');
            $descripsaun_categorio      = $this->request->getPost('descripsaun_categorio');
            $naran_professores          = $this->request->getPost('naran_professores');
            $data = [
                'kode_categorio'            => $kode_categorio,
                'categorio'                 => $categorio,
                'data_categorio'            => $data_categorio,
                'descripsaun_categorio'     => $descripsaun_categorio,
                'administrator_categorio '  => $naran_professores,
            ];

    
            $insert = $this->categorio->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
            }

        }
    } 

    public function image($id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
        if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
        }
        return view('funsionario/categoriomateria/trokaimage', $data);
    }
    public function processoimage($id =null)
    {
        $validate = $this->validate([
            'imagem_categorio'=> [
            'rules' => 'uploaded[imagem_categorio]|mime_in[imagem_categorio,image/jpg,image/jpeg,image/gif,image/png]|max_size[imagem_categorio,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
 
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
        
        $dt = $this->categorio->getWhere(['id_categorio'=>$id])->getRow();
        $gambar = $dt->imagem_categorio;
        $path = 'uploads/fotocategoriomateria/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('imagem_categorio');
           $datafoto = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/uploads/fotocategoriomateria/', $datafoto);

            $data = [
                'imagem_categorio'         => $datafoto,
            ];
            
            // dd($data);
            $narativa = $this->categorio->update($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')))->with('success',''.lang('registoestudante.successValidation').'');
            }
        }
    }
     public function troka()
    {
        $aktivo_categorio = $this->request->getPost('aktivo_categorio');
        $id = $this->request->getPost('id');
        $data = [
            'id_categorio'        =>$id,
            'aktivo_categorio'    =>$aktivo_categorio,
        ];
        $insert = $this->db->table('categorio')->where(['id_categorio'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('sciensieCategoryFunsionario.sciensieCategoryFunsionarioUrlPortofolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
            }
    }
}
