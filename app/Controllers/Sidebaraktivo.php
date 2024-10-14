<?php

namespace App\Controllers;

use App\Models\ModelSidebarAktivo;
use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Sidebaraktivo extends ResourceController
{
    protected $menu;
    protected $db;
    protected $sistema;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->menu = new ModelSidebarAktivo();
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
        return view('administrator/menusidebar/menusidebar', $data);
    }

    
    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->menu->orderBy('id_direito_acesso', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->sidebarPagination(10, $keyword);
            
         $data ['keyword']= $keyword;
         $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

         if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->menu->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->filtersidebar($keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();
            if ($data['menu'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->menu->orderBy('id_direito_acesso', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->sidebarPagination(10, $keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

            if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/menusidebar/detailmenusidebar', $data);
    }

    
    public function balanceamout()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->total_saldo == 1) {
            $data = [
                'id_direito_acesso ' => $id,
                'total_saldo' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso ' => $id,
                'total_saldo' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function donormoney()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->total_osan_tama == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'total_osan_tama' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'total_osan_tama' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function employeesalary()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->salario_funsionario == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'salario_funsionario' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'salario_funsionario' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function teachersalary()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->salario_professores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'salario_professores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'salario_professores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function receiveemployeesalary()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->simu_salario_funsionario == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'simu_salario_funsionario' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'simu_salario_funsionario' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function receiveteachersalary()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->simu_salario_professores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'simu_salario_professores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'simu_salario_professores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function moneysubsidy()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->osan_subsidio == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'osan_subsidio' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'osan_subsidio' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function employeemoneyloans()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->osan_impresta_funsionario == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'osan_impresta_funsionario' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'osan_impresta_funsionario' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function teachermoneyloans()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->osan_impresta_professores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'osan_impresta_professores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'osan_impresta_professores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function employee()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->funsionario == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'funsionario' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'funsionario' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function teacher()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->professores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'professores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'professores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
    public function value()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->valores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'valores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'valores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
    public function absence()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->absence == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'absence' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'absence' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function teachersciense()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->materia_professores == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'materia_professores' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'materia_professores' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function Students()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->estudante == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'estudante' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'estudante' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function sciensecategory()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->kategorio_materia == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'kategorio_materia' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'kategorio_materia' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function sciense()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->materia == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'materia' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'materia' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function courseproject()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->kursus_projeito == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'kursus_projeito' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'kursus_projeito' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function room()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->classe == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'classe' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'classe' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function courseschedule()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->horario_kursus == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'horario_kursus' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'horario_kursus' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function allcourseschedule()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->horario_kursus_hotu == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'horario_kursus_hotu' => 0
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'horario_kursus_hotu' => 1
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }



    public function aktivototalsidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->total_saldo == 0) {
                    $data = [
                    'total_saldo' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'total_saldo' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivodonatorsidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->total_osan_tama == 0) {
                    $data = [
                    'total_osan_tama' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'total_osan_tama' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivosalariofunsionariosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->salario_funsionario == 0) {
                    $data = [
                    'salario_funsionario' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'salario_funsionario' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivosalarioprofessoressidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->salario_professores == 0) {
                    $data = [
                    'salario_professores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'salario_professores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    public function aktivosimusalariofunsionariosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->simu_salario_funsionario == 0) {
                    $data = [
                    'simu_salario_funsionario' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'simu_salario_funsionario' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    public function aktivosimusalarioprofessoressidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->simu_salario_professores == 0) {
                    $data = [
                    'simu_salario_professores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'simu_salario_professores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivomoneysubsidy($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->osan_subsidio == 0) {
                    $data = [
                    'osan_subsidio' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'osan_subsidio' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivoimprestafunsionariosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->osan_impresta_funsionario == 0) {
                    $data = [
                    'osan_impresta_funsionario' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'osan_impresta_funsionario' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivoimprestaprofessoressidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->osan_impresta_professores == 0) {
                    $data = [
                    'osan_impresta_professores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'osan_impresta_professores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    
    public function aktivofunsionariosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->funsionario == 0) {
                    $data = [
                    'funsionario' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'funsionario' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    
    public function aktivoprofessoressidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->professores == 0) {
                    $data = [
                    'professores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'professores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivomateriaprofessoressidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->materia_professores == 0) {
                    $data = [
                    'materia_professores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'materia_professores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivoestudantesidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->estudante == 0) {
                    $data = [
                    'estudante' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'estudante' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    public function aktivovaluesidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->valores == 0) {
                    $data = [
                    'valores' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'valores' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    public function aktivoabsencesidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->absence == 0) {
                    $data = [
                    'absence' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'absence' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivomateriakategoriosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->kategorio_materia == 0) {
                    $data = [
                    'kategorio_materia' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'kategorio_materia' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivomateriasidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->materia == 0) {
                    $data = [
                    'materia' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'materia' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivokursusprojeitosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->kursus_projeito == 0) {
                    $data = [
                    'kursus_projeito' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'kursus_projeito' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivoclassesidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->classe == 0) {
                    $data = [
                    'classe' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'classe' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function aktivohorariosidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->horario_kursus == 0) {
                    $data = [
                    'horario_kursus' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'horario_kursus' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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
    
    public function aktivohorariohotusidebar($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->sidebaraktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->horario_kursus_hotu == 0) {
                    $data = [
                    'horario_kursus_hotu' => 1,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'horario_kursus_hotu' => 0,
                    ];
                $insert = $this->db->table('direito_acesso')->update($data);
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

    public function sistemamenuaktivo()
    {
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('direito_acesso')->getWhere(['id_direito_acesso'=> $id])->getRow();
        
        if ($aktivo->total_saldo == 1 && $aktivo->total_osan_tama == 1 && $aktivo->salario_funsionario == 1 && $aktivo->salario_professores == 1 && $aktivo->osan_impresta_funsionario == 1 && $aktivo->osan_impresta_professores == 1 && $aktivo->funsionario == 1 && $aktivo->professores == 1 && $aktivo->materia_professores == 1 && $aktivo->estudante == 1 && $aktivo->kategorio_materia == 1 && $aktivo->materia == 1 && $aktivo->classe == 1 && $aktivo->horario_kursus == 1  && $aktivo->horario_kursus_hotu == 1) {
            $data = [
                'id_direito_acesso' => $id,
                'total_saldo' => 0,
                'total_osan_tama' => 0,
                'salario_funsionario' => 0,
                'salario_professores' => 0,
                'simu_salario_funsionario' => 0,
                'simu_salario_professores' => 0,
                'osan_subsidio' => 0,
                'osan_impresta_funsionario' => 0,
                'osan_impresta_professores' => 0,
                'funsionario' => 0,
                'professores' => 0,
                'materia_professores' => 0,
                'estudante' => 0,
                'valores' => 0,
                'absence' => 0,
                'kategorio_materia' => 0,
                'materia' => 0,
                'kursus_projeito' => 0,
                'classe' => 0,
                'horario_kursus' => 0,
                'horario_kursus_hotu' => 0,
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_direito_acesso' => $id,
                'total_saldo' => 1,
                'total_osan_tama' => 1,
                'salario_funsionario' => 1,
                'salario_professores' => 1,
                'simu_salario_funsionario' => 1,
                'simu_salario_professores' => 1,
                'osan_subsidio' => 1,
                'osan_impresta_funsionario' => 1,
                'osan_impresta_professores' => 1,
                'funsionario' => 1,
                'professores' => 1,
                'materia_professores' => 1,
                'estudante' => 1,
                'valores' => 1,
                'absence' => 1,
                'kategorio_materia' => 1,
                'materia' => 1,
                'kursus_projeito' => 1,
                'classe' => 1,
                'horario_kursus' => 1,
                'horario_kursus_hotu' => 1,
            ];
             $insert = $this->db->table('direito_acesso')->where(['id_direito_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
    
}
