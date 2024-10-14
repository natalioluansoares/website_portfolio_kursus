<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelMenuAktivo;
use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Menuaktivo extends ResourceController
{
    protected $menu;
    protected $db;
    protected $sistema;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->menu = new ModelMenuAktivo();
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
        return view('administrator/menuacesso/menuacesso', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->menu->orderBy('id_menu_acesso', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->menuPagination(10, $keyword);
            
         $data ['keyword']= $keyword;
         $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

         if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->menu->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->filtermenu($keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();
            if ($data['menu'] == null) {
                return redirect()->to(base_url(lang('sistemaPortfolio.sistemaUrlPortfolio')))->with('error', ''.lang('sistemaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->menu->orderBy('id_menu_acesso', 'DESC')->where('sistema !=', 'Administrator')->where('sistema !=', 'Estudantes')->where('sistema =', $id)->menuPagination(10, $keyword);
            $data['sistema'] = $this->sistema->where('sistema =', $id)->first();

            if (!$data['sistema']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/menuacesso/detailmenuacesso', $data);
    }

    public function finansa()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_finansa == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_finansa' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_finansa' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivofinansa($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_finansa == 0) {
                    $data = [
                    'menu_finansa' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_finansa' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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
    
    public function funsionario()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_funsionario == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_funsionario' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_funsionario' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivofunsionario($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_funsionario == 0) {
                    $data = [
                    'menu_funsionario' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_funsionario' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function professores()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_profesores == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_profesores' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_profesores' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivoprofessores($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_profesores == 0) {
                    $data = [
                    'menu_profesores' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_profesores' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function estudante()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_estudante == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_estudante' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_estudante' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivoestudante($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_estudante == 0) {
                    $data = [
                    'menu_estudante' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_estudante' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function categoriamateria()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_kategoria_materia == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_kategoria_materia' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_kategoria_materia' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivocategoriomateria($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_kategoria_materia == 0) {
                    $data = [
                    'menu_kategoria_materia' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_kategoria_materia' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function projeitokursus()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_kursus_projeito == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_kursus_projeito' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_kursus_projeito' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivoprojeitokursus($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_kursus_projeito == 0) {
                    $data = [
                    'menu_kursus_projeito' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_kursus_projeito' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function classe()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_classe_horario == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_classe_horario' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_classe_horario' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivoclasse($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_classe_horario == 0) {
                    $data = [
                    'menu_classe_horario' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_classe_horario' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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

    public function certifikado()
    {
        
        $id = $this->request->getPost('id');
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_sertifikado == 1) {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_sertifikado' => 0
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso ' => $id,
                'menu_sertifikado' => 1
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }

    public function aktivocertifikado($input)
    {
        
        $muda = $this->menu->where(['sistema' => $input])->menuaktivo();
        foreach($muda as $aktivo){
            if ($aktivo->sistema == $input) {
                if ($aktivo->menu_sertifikado == 0) {
                    $data = [
                    'menu_sertifikado' => 1,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
                if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
                }else{
                    return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
                }
                }else{
                    $data = [
                    'menu_sertifikado' => 0,
                    ];
                $insert = $this->db->table('menu_acesso')->update($data);
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
        $aktivo = $this->db->table('menu_acesso')->getWhere(['id_menu_acesso'=> $id])->getRow();
        
        if ($aktivo->menu_profile == 1 && $aktivo->menu_finansa == 1 && $aktivo->menu_funsionario == 1 && $aktivo->menu_profesores == 1 && $aktivo->menu_estudante == 1 && $aktivo->menu_kategoria_materia == 1 && $aktivo->menu_kursus_projeito == 1 && $aktivo->menu_classe_horario == 1 && $aktivo->menu_sertifikado == 1) {
            $data = [
                'id_menu_acesso' => $id,
                'menu_profile' => 0,
                'menu_finansa' => 0,
                'menu_funsionario' => 0,
                'menu_profesores' => 0,
                'menu_estudante' => 0,
                'menu_kategoria_materia' => 0,
                'menu_kursus_projeito' => 0,
                'menu_classe_horario' => 0,
                'menu_sertifikado' => 0,
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }else {
            $data = [
                'id_menu_acesso' => $id,
                'menu_profile' => 1,
                'menu_finansa' => 1,
                'menu_funsionario' => 1,
                'menu_profesores' => 1,
                'menu_estudante' => 1,
                'menu_kategoria_materia' => 1,
                'menu_kursus_projeito' => 1,
                'menu_classe_horario' => 1,
                'menu_sertifikado' => 1,
            ];
             $insert = $this->db->table('menu_acesso')->where(['id_menu_acesso'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
        }
    }
}
