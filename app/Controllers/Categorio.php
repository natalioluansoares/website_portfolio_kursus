<?php

namespace App\Controllers;

use App\Models\ModelCategorio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Categorio extends ResourceController
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
                return redirect()->to(base_url(lang('categorioPortfolio.categorioUrlPortfolio')))->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', null)->categorioPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/categorio/categorio', $data);
    }

    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', '1')->categorioPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->categorio->where('aktivo_categorio =', '1')->filtercategorio($keyword);
            if ($data['categorio'] == null) {
                return redirect()->to(base_url(lang('categorioPortfolio.hamosCategorioUrlPortfolio')))->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->categorio->orderBy('id_categorio', 'DESC')->where('aktivo_categorio =', '1')->categorioPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/categorio/hamos', $data);
    }
    
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('categorio')
            ->set('aktivo_categorio',null,true)
            ->where('id_categorio',$id)
            ->update();
        }else {

        $this->db->table('categorio')
            ->set('aktivo_categorio',null,true)
            ->where('aktivo_categorio is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('categorioPortfolio.hamosCategorioUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('categorioPortfolio.hamosCategorioUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    
    public function new()
    {
        return view('administrator/categorio/aumentacategorio');
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
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $kode_categorio   = $this->request->getPost('kode_categorio');
            $categorio        = $this->request->getPost('categorio');
            $data_categorio   = $this->request->getPost('data_categorio');
    
            if ($this->categorio->cek_kode($kode_categorio)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('categorioPortfolio.ihaKodeValidation').'');
            }elseif ($categorio == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.categorioValidation').'');
            }elseif ($this->categorio->cek_categorio($categorio)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('categorioPortfolio.ihaCategorioValidation').'');
            }else {
                $data = [
                    'kode_categorio'  => $kode_categorio,
                    'categorio'       => $categorio,
                    'data_categorio'  => $data_categorio,
                ];
        
               $insert = $this->categorio->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('categorioPortfolio.categorioUrlPortfolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
                }
            }

        }
    }

    
    public function edit($id = null)
    {
        $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
        if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.bukaValidation').'');
        }
        return view('administrator/categorio/trokacategorio', $data);
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
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $kode_categorio   = $this->request->getPost('kode_categorio');
        $categorio        = $this->request->getPost('categorio');
        $data_categorio   = $this->request->getPost('data_categorio');

        if ($this->categorio->cek_kode($kode_categorio, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('categorioPortfolio.ihaKodeValidation').'');
        }elseif ($categorio == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.categorioValidation').'');
        }elseif ($this->categorio->cek_categorio($categorio, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error',''.lang('categorioPortfolio.ihaCategorioValidation').'');
        }else {
            $data = [
                'id_categorio'  => $id,
                'kode_categorio'  => $kode_categorio,
                'categorio'       => $categorio,
                'data_categorio'  => $data_categorio,
            ];
    
           $insert = $this->categorio->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('categorioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('categorioPortfolio.categorioUrlPortfolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
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
                return redirect()->to(base_url(lang('categorioPortfolio.categorioUrlPortfolio')))->with('success',''.lang('categorioPortfolio.successValidation').'');
            }
    }
        
    public function permanente()
    {
         $id = $this->request->getPost('id');
        $this->categorio->where('id_categorio', $id)->delete();
        return redirect()->back()->with('success', ''.lang('categorioPortfolio.hamosValidation').'');
    }
}
