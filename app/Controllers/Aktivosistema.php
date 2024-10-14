<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAccountProtfolio;
use App\Models\ModelAktivoSistema;
use CodeIgniter\HTTP\ResponseInterface;

class Aktivosistema extends BaseController
{
    protected $administrator;
    protected $aktivo;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->administrator = new ModelAccountProtfolio();
        $this->aktivo = new ModelAktivoSistema();
    }
    public function aktivoprofessores()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)
         ->administratorPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->administrator->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)->filteradministrator($keyword);
            if ($data['administrator'] == null) {
                return redirect()->to(base_url(lang('aktivosistema.aktivoProfessoresUrlPortfolio')))->with('error', ''.lang('registoAdministrator.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)->administratorPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/aktivosistema/aktivoprofessores', $data);
    }
    public function aktivofunsionario()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 2)
         ->administratorPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->administrator->where('aktivo_administrator =', null)->where('sistema_administrator =', 2)->filteradministrator($keyword);
            if ($data['administrator'] == null) {
                return redirect()->to(base_url(lang('aktivosistema.aktivoFunsionarioUrlPortfolio')))->with('error', ''.lang('registoAdministrator.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 2)->administratorPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/aktivosistema/aktivofunsionario', $data);
    }

    public function aktivo()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('administrator')->getWhere(['id_administrator'=> $id])->getRow();
        
        if ($aktivo->valido_administrator == 1) {
            $data = [
                'id_administrator' => $id,
                'valido_administrator' => 0
            ];
             $insert = $this->db->table('administrator')->where(['id_administrator'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_administrator' => $id,
                'valido_administrator' => 1
            ];
             $insert = $this->db->table('administrator')->where(['id_administrator'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
    
    public function aktivohotufunsionario()
    {
        
        $aktivo = $this->db->table('administrator')->getWhere(['sistema_administrator' => 2])->getRow();

        
        if ($aktivo->sistema_administrator == 2) {
            if ($aktivo->valido_administrator == 0) {
                $this->db->table('administrator')->set('valido_administrator', 1)
                ->where('sistema_administrator', $aktivo->sistema_administrator)
                ->update();
            }else{
                $this->db->table('administrator')->set('valido_administrator', 0)
                ->where('sistema_administrator', $aktivo->sistema_administrator)
                ->update();
            }
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }
    public function aktivohotuprofessores()
    {
        $aktivo = $this->db->table('administrator')->getWhere(['sistema_administrator' => 3])->getRow();

        if ($aktivo->sistema_administrator == 3) {
            if ($aktivo->valido_administrator == 0) {
                $this->db->table('administrator')->set('valido_administrator', 1)
                ->where('sistema_administrator', $aktivo->sistema_administrator)
                ->update();
            }else{
                $this->db->table('administrator')->set('valido_administrator', 0)
                ->where('sistema_administrator', $aktivo->sistema_administrator)
                ->update();
            }
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
        }
    }
}
