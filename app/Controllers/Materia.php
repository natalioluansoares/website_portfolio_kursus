<?php

namespace App\Controllers;

use App\Models\ModelCategorio;
use App\Models\ModelMateria;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Materia extends ResourceController
{
    protected $categorio;
    protected $materia;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->materia = new ModelMateria();
        $this->categorio = new ModelCategorio();
    }
    
    public function materia($lian,$id)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->materia->orderBy('id_materia', 'DESC')->where('categorio_materia', $id)->where('aktivo_materia =', null)->where('lian_materia =', $lian)->materiaPagination(20, $keyword);
         $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();

         if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->materia->where('categorio_materia', $id)->where('aktivo_materia =', null)->where('lian_materia =', $lian)->filtermateria($keyword);
            $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('materiaPortfolio.materiaUrlPortfolio').'/'.$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->materia->orderBy('id_materia', 'DESC')->where('categorio_materia', $id)->where('aktivo_materia =', null)->where('lian_materia = ', $lian)->materiaPagination(20, $keyword);
            $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
            if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/materia/materia', $data);
    }
    public function hamos($lian,$id)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->materia->orderBy('id_materia', 'DESC')->where('categorio_materia', $id)->where('aktivo_materia =', 1)->where('lian_materia =', $lian)->materiaPagination(9, $keyword);
          $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
         if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->materia->where('categorio_materia', $id)->where('aktivo_materia =', 1)->where('lian_materia =', $lian)->filtermateria($keyword);
            $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
            if ($data['materia'] == null) {
                return redirect()->to(base_url(lang('materiaPortfolio.hamosMateriaUrlPortfolio').'/'.$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->materia->orderBy('id_materia', 'DESC')->where('categorio_materia', $id)->where('aktivo_materia =', 1)->where('lian_materia =', $lian)->materiaPagination(9, $keyword);
             $data['categorio'] = $this->categorio->where('id_categorio', $id)->first();
             if (!$data['categorio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            $data ['keyword']= $keyword;
         }
        return view('administrator/materia/hamos', $data);
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('materia')
            ->set('aktivo_materia',null,true)
            ->where('id_materia',$id)
            ->update();
        }else {

        $this->db->table('materia')
            ->set('aktivo_materia',null,true)
            ->where('aktivo_materia is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }
    public function show($id = null)
    {
        
    }

    public function new()
    {
        $data['categorio'] = $this->categorio->where('aktivo_categorio =', null)->findAll();
        return view('administrator/materia/aumentamateria', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'categorio_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaPortfolio.tituloValidation').'',
                ],
            ],

            'data_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.dataValidation').'',
                ],
            ],
            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.facebookValidation').'',
                ],
            ],
            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.tiktokValidation').'',
                ],
            ],
            'lian_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.lianValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
        $categorio_materia      = $this->request->getPost('categorio_materia');
        $titulo_materia         = $this->request->getPost('titulo_materia');
        $data_materia           = $this->request->getPost('data_materia');
        $youtube                = $this->request->getPost('youtube');
        $facebook               = $this->request->getPost('facebook');
        $instagram              = $this->request->getPost('instagram');
        $tiktok                 = $this->request->getPost('tiktok');
        $lian_materia           = $this->request->getPost('lian_materia');
        $materia                = $this->request->getPost('materia');
        if ($this->materia->titulo_materia($titulo_materia)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('materiaPortfolio.ihaTituloValidation').'');
        }elseif ($this->materia->ihamateria($materia)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('materiaPortfolio.ihaMateriaValidation').'');
        }else {
            $data = [
                'categorio_materia'     => $categorio_materia,
                'lian_materia'          => $lian_materia,
                'data_materia'          => $data_materia,
                'youtube'               => $youtube,
                'facebook'              => $facebook,
                'instagram'             => $instagram,
                'tiktok'                => $tiktok,
                'titulo_materia'        => $titulo_materia,
                'materia'               => $materia,
                'aktivo_materia'        => null,
            ];
                $insert = $this->materia->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
                }else {
                    return redirect()->to(base_url(lang('materiaPortfolio.materiaUrlPortfolio').$categorio_materia))->with('success',''.lang('materiaPortfolio.successValidation'));
                }
            }
        }

    }
    public function editmateria($lian, $id = null)
    {
        $data['categorio'] = $this->categorio->where('aktivo_categorio =', null)->findAll();
        $data['materia'] = $this->materia->where('id_materia', $id)->where('lian_materia =', $lian)->materia();
        if (!$data['materia']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
        return view('administrator/materia/trokamateria', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'categorio_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.categorioValidation').'',
                ],
            ],
            'titulo_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('materiaPortfolio.tituloValidation').'',
                ],
            ],

            'data_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.dataValidation').'',
                ],
            ],
            'youtube'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.youtubeValidation').'',
                ],
            ],
            'facebook'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.facebookValidation').'',
                ],
            ],
            'instagram'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.instagramValidation').'',
                ],
            ],
            'tiktok'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.tiktokValidation').'',
                ],
            ],
            'lian_materia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('materiaPortfolio.lianValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
        $categorio_materia      = $this->request->getPost('categorio_materia');
        $titulo_materia         = $this->request->getPost('titulo_materia');
        $data_materia           = $this->request->getPost('data_materia');
        $youtube                = $this->request->getPost('youtube');
        $facebook               = $this->request->getPost('facebook');
        $instagram              = $this->request->getPost('instagram');
        $tiktok                 = $this->request->getPost('tiktok');
        $lian_materia           = $this->request->getPost('lian_materia');
        $materia                = $this->request->getPost('materia');
        if ($this->materia->titulo_materia($titulo_materia,$id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('materiaPortfolio.ihaTituloValidation').'');
        }elseif ($this->materia->ihamateria($materia,$id)->resultID->num_rows > 0) {
            return redirect()->back()->with('error', ''.lang('materiaPortfolio.ihaMateriaValidation').'');
        }else {
            $data = [
                'categorio_materia'     => $categorio_materia,
                'lian_materia'          => $lian_materia,
                'data_materia'          => $data_materia,
                'youtube'               => $youtube,
                'facebook'              => $facebook,
                'instagram'             => $instagram,
                'tiktok'                => $tiktok,
                'titulo_materia'        => $titulo_materia,
                'materia'               => $materia,
                'aktivo_materia'        => null,
            ];
                $insert = $this->materia->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
                }else {
                    return redirect()->to(base_url(lang('materiaPortfolio.materiaUrlPortfolio').$categorio_materia))->with('success',''.lang('materiaPortfolio.successValidation'));
                }
            }
        }
    }
    
     public function troka()
    {
        $aktivo_materia = $this->request->getPost('aktivo_materia');
        $id = $this->request->getPost('id');
        $data = [
            'id_materia'        =>$id,
            'aktivo_materia'    =>$aktivo_materia,
        ];
        $insert = $this->db->table('materia')->where(['id_materia'=>$id])->update($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.errorValidation').'');
        }else {
            return redirect()->back()->withInput()->with('success',''.lang('materiaPortfolio.hamosValidation'));
        }
    }
        
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->materia->where('id_materia', $id)->delete();
        return redirect()->back()->withInput()->with('success', ''.lang('materiaPortfolio.hamosValidation').'');
    }
}
