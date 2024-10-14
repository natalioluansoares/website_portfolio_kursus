<?php

namespace App\Controllers;

use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Sistema extends ResourceController
{
    protected $sistema;
    protected $db;
    protected $helpers = ['portfolio'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->sistema = new ModelSistema();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', null)->sistemaPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->sistema->where('aktivo_sistema =', null)->filtersistema($keyword);
            if ($data['sistema'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', null)->sistemaPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/sistema/sistema', $data);
    }

    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', '1')->sistemaPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->sistema->where('aktivo_sistema =', '1')->filtersistema($keyword);
            if ($data['sistema'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.hamosSistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', '1')->sistemaPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/sistema/hamos', $data);
    }
    
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('sistema')
            ->set('aktivo_sistema',null,true)
            ->where('id_sistema',$id)
            ->update();
        }else {

        $this->db->table('sistema')
            ->set('aktivo_sistema',null,true)
            ->where('aktivo_sistema is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('sistemaPortfolio.hamosSistemaUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('sistemaPortfolio.hamosSistemaUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    
    public function new()
    {
        return view('administrator/sistema/aumentasistema');
    }

    
    public function create()
    {
        $validate = $this->validate([
            'kode_sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('sistemaPortfolio.sistemaValidation').'',
                ],
            ],

            'data_sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $kode_sistema   = $this->request->getPost('kode_sistema');
            $sistema        = $this->request->getPost('sistema');
            $data_sistema   = $this->request->getPost('data_sistema');
    
            if ($this->sistema->cek_kode($kode_sistema)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('sistemaPortfolio.ihaKodeValidation').'');
            }elseif ($this->sistema->cek_sistema($sistema)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('sistemaPortfolio.ihaSistemaValidation').'');
            }else {
                $data = [
                    'kode_sistema'  => $kode_sistema,
                    'sistema'       => $sistema,
                    'data_sistema'  => $data_sistema,
                ];
        
               $insert = $this->sistema->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('success',''.lang('sistemaPortfolio.successValidation').'');
                }
            }
        }
    }

    
    public function editsistema($id = null)
    {
        $data['sistema'] = $this->sistema->where('id_sistema', $id)->first();
        if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
        }
        return view('administrator/sistema/trokasistema', $data);
    }

    
    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.kodeValidation').'',
                ],
            ],
            'sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('sistemaPortfolio.sistemaValidation').'',
                ],
            ],

            'data_sistema'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('sistemaPortfolio.dataValidation').'',
                ],
            ],
        ]);
            if (!$validate) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
                # code...
                $kode_sistema   = $this->request->getPost('kode_sistema');
                $sistema        = $this->request->getPost('sistema');
                $data_sistema   = $this->request->getPost('data_sistema');
        
                if ($this->sistema->cek_kode($kode_sistema, $id)->resultID->num_rows > 0) {
                    return redirect()->back()->with('error', ''.lang('sistemaPortfolio.ihaKodeValidation').'');
                }elseif ($this->sistema->cek_sistema($sistema, $id)->resultID->num_rows > 0) {
                    return redirect()->back()->with('error',''.lang('sistemaPortfolio.ihaSistemaValidation').'');
                }else {
                $data = [
                    'id_sistema'  => $id,
                    'kode_sistema'  => $kode_sistema,
                    'sistema'       => $sistema,
                    'data_sistema'  => $data_sistema,
                ];
        
                $insert = $this->sistema->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('success',''.lang('sistemaPortfolio.successValidation').'');
                }
            }
        }
    }

   
    public function troka()
    {
        $aktivo_sistema = $this->request->getPost('aktivo_sistema');
        $id = $this->request->getPost('id');
        $data = [
            'id_sistema'        =>$id,
            'aktivo_sistema'    =>$aktivo_sistema,
        ];
        $insert = $this->db->table('sistema')->where(['id_sistema'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
        }else{
            return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('success',''.lang('sistemaPortfolio.successValidation').'');
        }
    }
        
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->sistema->where('id_sistema', $id)->delete();
        return redirect()->back()->with('success', ''.lang('sistemaPortfolio.hamosValidation').'');
    }
}
