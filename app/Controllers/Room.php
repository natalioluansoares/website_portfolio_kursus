<?php

namespace App\Controllers;

use App\Models\ModelRoom;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Room extends ResourceController
{
    protected $classe;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->classe = new ModelRoom();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
         $data = $this->classe->orderBy('id_classe', 'DESC')->where('aktivo_classe =', null)->classePagination(10, $keyword);
            
         $data ['keyword']= $keyword;
         

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->classe->where('aktivo_classe =', null)->filterclasse($keyword);
            if ($data['classe'] == null) {
                return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('error', ''.lang('classePortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            $data = $this->classe->orderBy('id_classe', 'DESC')->where('aktivo_classe =', null)->classePagination(10, $keyword);
            $data ['keyword']= $keyword;
            
         }
        return view('administrator/classe/classe', $data);

    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
         $data = $this->classe->orderBy('id_classe', 'DESC')->where('aktivo_classe =', 1)->classePagination(10, $keyword);
            
         $data ['keyword']= $keyword;
         

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->classe->where('aktivo_classe =', 1)->filterclasse($keyword);
            if ($data['classe'] == null) {
                return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('error', ''.lang('classePortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // if ($data ['keyword'] != null) {
            //     return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('error', ''.lang('classePortfolio.bukaValidation').'');
            // }
            // print_r($keyword);
            $data = $this->classe->orderBy('id_classe', 'DESC')->where('aktivo_classe =', 1)->classePagination(10, $keyword);
            $data ['keyword']= $keyword;
            
         }
        return view('administrator/classe/hamos', $data);

    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('classe')
            ->set('aktivo_classe',null,true)
            ->where('id_classe',$id)
            ->update();
        }else {

        $this->db->table('classe')
            ->set('aktivo_classe',null,true)
            ->where('aktivo_classe is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('classePortfolio.hamosClasseUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('classePortfolio.hamosClasseUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }
    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('administrator/classe/aumentaclasse');
    }

    public function create()
    {
        $validate = $this->validate([
            'kode_classe'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('classePortfolio.kodeValidation').'',
                ],
            ],
            'classe'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('classePortfolio.classeValidation').'',
                ],
            ],
            'data_classe'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('classePortfolio.dataValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            $kode_classe   = $this->request->getPost('kode_classe');
            $classe        = $this->request->getPost('classe');
            $data_classe   = $this->request->getPost('data_classe');
            if ($this->classe->cek_kode($kode_classe)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('classePortfolio.ihaKodeValidation').'');
            }elseif ($this->classe->cek_classe($classe)->resultID->num_rows > 0) {
            return redirect()->back()->with('error',''.lang('classePortfolio.ihaclasseValidation').'');
            }else {
                $random = rand(000,999897698976765439);
                $data = [
                'id_classe'    =>$random,
                'kode_classe'  => $kode_classe,
                'classe'       => $classe,
                'data_classe'  => $data_classe,
                'aktivo_classe'  => null,
                ];
    
                $insert = $this->classe->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('success',''.lang('classePortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['classe'] = $this->classe->where('id_classe', $id)->first();
        if (!$data['classe']) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.bukaValidation').'');
        }
        return view('administrator/classe/trokaclasse', $data);
    }

    public function update($id = null)
    {
        $kode_classe   = $this->request->getPost('kode_classe');
        $classe        = $this->request->getPost('classe');
        $data_classe   = $this->request->getPost('data_classe');
        if ($kode_classe == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.kodeValidation').'');
        }elseif ($this->classe->cek_kode($kode_classe, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('classePortfolio.ihaKodeValidation').'');
        }elseif ($classe == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.classeValidation').'');
        }elseif ($this->classe->cek_classe($classe, $id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error',''.lang('classePortfolio.ihaclasseValidation').'');
        }elseif ($data_classe == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.dataValidation').'');
        }else {
            $data = [
                'id_classe'    =>$id,
                'kode_classe'  => $kode_classe,
                'classe'       => $classe,
                'data_classe'  => $data_classe,
                'aktivo_classe'  => null,
            ];
           $insert = $this->classe->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_classe = $this->request->getPost('aktivo_classe');
        $id = $this->request->getPost('id');
        $data = [
            'id_classe'        =>$id,
            'aktivo_classe'    =>$aktivo_classe,
        ];
        $insert = $this->db->table('classe')->where(['id_classe'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('classePortfolio.classeUrlPortfolio')))->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }
        
    public function permanente()
    {
         $id = $this->request->getPost('id');
        $this->classe->where('id_classe', $id)->delete();
        return redirect()->back()->with('success', ''.lang('classePortfolio.hamosValidation').'');
    }
}
