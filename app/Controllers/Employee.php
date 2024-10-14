<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelFunsionarioPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Employee extends ResourceController
{
   protected $funsionario;
    protected $administrator;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->funsionario = new ModelFunsionarioPortfolio();
        $this->administrator = new ModelAccountProtfolio();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->funsionario->orderBy('id_funsionario', 'DESC')->where('aktivo_funsionario =', null)->funsionarioPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->funsionario->where('aktivo_funsionario =', null)->filterfunsionario($keyword);
            if ($data['funsionario'] == null) {
                return redirect()->to(base_url(lang('employeeFunsionario.employeeUrlPortofolio')))->with('error', ''.lang('funsionarioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->funsionario->orderBy('id_funsionario', 'DESC')->where('aktivo_funsionario =', null)->funsionarioPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/employee/employee', $data);
    }

    public function new()
    {
        $data['funsionario'] = $this->administrator->where('aktivo_administrator =', null)->where('sistema =', 'Funsionario')->rowadministrator();
        return view('funsionario/employee/aumentaemployee', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'titulo_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('funsionarioPortfolio.tituloValidation').'',
                ],
            ],
            'conta_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('funsionarioPortfolio.funsionarioValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $titulo_funsionario        = $this->request->getPost('titulo_funsionario');
            $conta_administrator   = $this->request->getPost('conta_administrator');
            if ($this->funsionario->cek_naran($conta_administrator)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('funsionarioPortfolio.ihaKompletoValidation').'');
            }else {
                $data = [
                    'titulo_funsionario'  => $titulo_funsionario,
                    'conta_administrator'       => $conta_administrator,
                ];
        
                    $insert = $this->funsionario->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('employeeFunsionario.employeeUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['funsionario'] = $this->administrator->where('aktivo_administrator =', null)->where('sistema =', 'Funsionario')->rowadministrator();
        $data['profe'] = $this->funsionario->where('aktivo_funsionario =', null)->where('id_funsionario', $id)->where('sistema =', 'Funsionario')->funsionario();
        if (!$data['profe']) {
            return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.bukaValidation').'');
        }
        return view('funsionario/employee/trokaemployee', $data);
    }

    public function update($id = null)
    {
         $validate = $this->validate([
            'titulo_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('funsionarioPortfolio.tituloValidation').'',
                ],
            ],
            'conta_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('funsionarioPortfolio.funsionarioValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
                $titulo_funsionario        = $this->request->getPost('titulo_funsionario');
                $conta_administrator   = $this->request->getPost('conta_administrator');
                if ($this->funsionario->cek_naran($conta_administrator,$id)->resultID->num_rows > 0) {
                    return redirect()->back()->with('error', ''.lang('funsionarioPortfolio.ihaKompletoValidation').'');
                }else {
                $data = [
                    'id_funsionario'        => $id,
                    'titulo_funsionario'    => $titulo_funsionario,
                    'conta_administrator'   => $conta_administrator,
                ];
        
                $insert = $this->funsionario->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('employeeFunsionario.employeeUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $aktivo_funsionario = $this->request->getPost('aktivo_funsionario');
        $id = $this->request->getPost('id');
        $data = [
            'id_funsionario'        =>$id,
            'aktivo_funsionario'    =>$aktivo_funsionario,
        ];
        $insert = $this->db->table('funsionario')->where(['id_funsionario'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('employeeFunsionario.employeeUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
            }
    }
}
