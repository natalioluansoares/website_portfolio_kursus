<?php

namespace App\Controllers;

use App\Models\ModelInputUpdateDelete;
use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Inputupdatedelete extends ResourceController
{
   protected $menu;
    protected $db;
    protected $sistema;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->menu = new ModelInputUpdateDelete();
        $this->sistema = new ModelSistema();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', null)->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->sistemaPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->sistema->where('aktivo_sistema =', null)->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->filtersistema($keyword);
            if ($data['sistema'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->sistema->orderBy('id_sistema', 'DESC')->where('aktivo_sistema =', null)->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->sistemaPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/menuinputupdatedelete/menuinputupdatedelete', $data);
    }

    
    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->menu->orderBy('id_direito_acesso_autromos', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->inputupdatedeletePagination(10, $keyword);
            
         $data ['keyword']= $keyword;
         $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

         if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->menu->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->filterinputupdatedelete($keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();
            if ($data['menu'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->menu->orderBy('id_direito_acesso_autromos', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->inputupdatedeletePagination(10, $keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

            if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/menuinputupdatedelete/detailinputupdatedelete', $data);
    }

    public function input()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso_autromos')->getWhere(['id_direito_acesso_autromos'=> $id])->getRow();
        
        if ($aktivo->troka_direito_acesso_autromos == 1) {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'aumenta_direito_acesso_autromos' => 0
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'aumenta_direito_acesso_autromos' => 1
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso_autromos')->getWhere(['id_direito_acesso_autromos'=> $id])->getRow();
        
        if ($aktivo->troka_direito_acesso_autromos == 1) {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'troka_direito_acesso_autromos' => 0
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'troka_direito_acesso_autromos' => 1
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function hamos()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso_autromos')->getWhere(['id_direito_acesso_autromos'=> $id])->getRow();
        
        if ($aktivo->hamos_direito_acesso_autromos == 1) {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'hamos_direito_acesso_autromos' => 0
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'hamos_direito_acesso_autromos' => 1
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivoinputan($input)
    { 
        $muda = $this->menu->where(['sistema' => $input])->rowinputupdatedelete();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->aumenta_direito_acesso_autromos == 0) {
                    $data = [
                '   aumenta_direito_acesso_autromos' => 1,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                '   aumenta_direito_acesso_autromos' => 0,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }
            }
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }

    public function aktivoupdate($input)
    { 
        $muda = $this->menu->where(['sistema' => $input])->rowinputupdatedelete();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->troka_direito_acesso_autromos == 0) {
                    $data = [
                '   troka_direito_acesso_autromos' => 1,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                '   troka_direito_acesso_autromos' => 0,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }
            }
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }

    public function aktivodelete($input)
    { 
        $muda = $this->menu->where(['sistema' => $input])->rowinputupdatedelete();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->hamos_direito_acesso_autromos == 0) {
                    $data = [
                '   hamos_direito_acesso_autromos' => 1,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                '   hamos_direito_acesso_autromos' => 0,
                    ];
                $insert = $this->db->table('direito_acesso_autromos')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }
            }
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }

    public function sistemainputupdatedelete()
    {
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso_autromos')->getWhere(['id_direito_acesso_autromos'=> $id])->getRow();
        
        if ($aktivo->troka_direito_acesso_autromos == 1 && $aktivo->hamos_direito_acesso_autromos == 1 && $aktivo->aumenta_direito_acesso_autromos == 1 ) {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'troka_direito_acesso_autromos' => 0,
                'aumenta_direito_acesso_autromos' => 0,
                'hamos_direito_acesso_autromos' => 0
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso_autromos ' => $id,
                'troka_direito_acesso_autromos' => 1,
                'aumenta_direito_acesso_autromos' => 1,
                'hamos_direito_acesso_autromos' => 1
            ];
             $insert = $this->db->table('direito_acesso_autromos')->where(['id_direito_acesso_autromos'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
}
