<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelFunsionario;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Professores extends ResourceController
{
    protected $professores;
    protected $administrator;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->professores = new ModelFunsionario();
        $this->administrator = new ModelAccountProtfolio();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->professores->where('aktivo_professores =', null)->filterprofessores($keyword);
            if ($data['professores'] == null) {
                return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/professores/professores', $data);
    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', '1')->professoresPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->professores->where('aktivo_professores =', '1')->filterprofessores($keyword);
            if ($data['professores'] == null) {
                return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', '1')->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/professores/hamos', $data);
    }
    public function show($id = null)
    {
        //
    }

    public function new()
    {
        $data['professores'] = $this->administrator->where('aktivo_administrator =', null)->getadministrator();
        return view('administrator/professores/aumentaprofessores', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'titulo_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('professoresPortfolio.tituloValidation').'',
                ],
            ],
            'conta_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('professoresPortfolio.professoresValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $titulo_professores        = $this->request->getPost('titulo_professores');
            $conta_administrator   = $this->request->getPost('conta_administrator');
            if ($this->professores->cek_naran($conta_administrator)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('funsionarioPortfolio.ihaKompletoValidation').'');
            }else {
                # code...
                $data = [
                    'titulo_professores'  => $titulo_professores,
                    'conta_administrator'       => $conta_administrator,
                ];
                
                $insert = $this->professores->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('success',''.lang('professoresPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['professores'] = $this->administrator->where('aktivo_administrator =', null)->getadministrator();
        $data['profe'] = $this->professores->where('aktivo_professores =', null)->where('id_professores', $id)->professores();
        if (!$data['profe']) {
            return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
        }
        return view('administrator/professores/trokaprofessores', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'titulo_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('professoresPortfolio.tituloValidation').'',
                ],
            ],
            'conta_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('professoresPortfolio.professoresValidation').'',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $titulo_professores        = $this->request->getPost('titulo_professores');
            $conta_administrator   = $this->request->getPost('conta_administrator');
            $titulo_professores        = $this->request->getPost('titulo_professores');
            $conta_administrator   = $this->request->getPost('conta_administrator');
            if ($this->professores->cek_naran($conta_administrator, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('funsionarioPortfolio.ihaKompletoValidation').'');
            }else {
            
                $data = [
                    'id_professores'        => $id,
                    'titulo_professores'    => $titulo_professores,
                    'conta_administrator'   => $conta_administrator,
                ];
                
                $insert = $this->professores->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('success',''.lang('professoresPortfolio.successValidation').'');
                }
            }
        }
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('professores')
            ->set('aktivo_professores',null,true)
            ->where('id_professores',$id)
            ->update();
        }else {

        $this->db->table('professores')
            ->set('aktivo_professores',null,true)
            ->where('aktivo_professores is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('professoresPortfolio.hamosProfessoresUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('professoresPortfolio.hamosProfessoresUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }
    public function troka()
    {
        $aktivo_professores = $this->request->getPost('aktivo_professores');
        $id = $this->request->getPost('id');
        $data = [
            'id_professores'        =>$id,
            'aktivo_professores'    =>$aktivo_professores,
        ];
        $insert = $this->db->table('professores')->where(['id_professores'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('professoresPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('success',''.lang('professoresPortfolio.successValidation').'');
            }
    }
        
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->professores->where('id_professores', $id)->delete();
        return redirect()->back()->with('success', ''.lang('professoresPortfolio.hamosValidation').'');
    }
}
