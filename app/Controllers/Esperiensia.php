<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelEsperiensia;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Esperiensia extends ResourceController
{
    protected $administrator;
    protected $esperiensia;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->esperiensia = new ModelEsperiensia();
        $this->administrator = new ModelAccountProtfolio();
        $this->db = \Config\Database::connect();
    }
    public function esperiensia($lian)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->esperiensia->orderBy('id_esperiensia', 'DESC')->where('aktivo_esperiensia =', null)->where('lian_esperiensia =', $lian)->esperiensiaPagination(9, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->esperiensia->where('aktivo_esperiensia =', null)->filteresperiensia($keyword);
            if ($data['esperiensia'] == null) {
                return redirect()->to(base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->esperiensia->orderBy('id_esperiensia', 'DESC')->where('aktivo_esperiensia =', null)->where('lian_esperiensia =', $lian)->esperiensiaPagination(9, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/esperiensia/esperiensia', $data);
    }
    public function hamos($lian)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->esperiensia->orderBy('id_esperiensia', 'DESC')->where('aktivo_esperiensia =', 1)->where('lian_esperiensia =', $lian)->esperiensiaPagination(9, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->esperiensia->where('aktivo_esperiensia =', 1)->where('lian_esperiensia =', $lian)->filteresperiensia($keyword);
            if ($data['esperiensia'] == null) {
                return redirect()->to(base_url(lang('esperiensiaPortfolio.hamosEsperiensiaUrlPortfolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->esperiensia->orderBy('id_esperiensia', 'DESC')->where('lian_esperiensia =', $lian)->where('aktivo_esperiensia =', 1)->esperiensiaPagination(9, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/esperiensia/hamos', $data);
    }

    public function detail($lian, $id)
    {
        $data['esperiensia'] = $this->esperiensia->where('id_esperiensia', $id)->where('aktivo_esperiensia =', null)->where('lian_esperiensia =', $lian)->esperiensia();
        if (!$data['esperiensia']) {
            return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
        }else {
            return view('administrator/esperiensia/detailesperiensia', $data);
        }
    }

    public function new()
    {
        $data['administrator'] = $this->administrator->where('sistema =', 'Administrator')->rowadministrator();
        return view('administrator/esperiensia/aumentaesperiensia', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'fatin_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.fatinValidation').'',
                ],
            ],
            'loron_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.dataValidation').'',
                ],
            ],

            'esperiensia_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.sistemaValidation').'',
                ],
            ],

            'lian_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.lianValidation').'',
                ],
            ],

            'image_esperiensia'=> [
            'rules' => 'uploaded[image_esperiensia]|mime_in[image_esperiensia,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_esperiensia,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
            'esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.esperiensiaValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $loron_esperiensia          = $this->request->getPost('loron_esperiensia');
            $fatin_esperiensia          = $this->request->getPost('fatin_esperiensia');
            $esperiensia                = $this->request->getPost('esperiensia');
            $lian_esperiensia           = $this->request->getVar('lian_esperiensia');
            $esperiensia_administrator  = $this->request->getPost('esperiensia_administrator');
            $image_esperiensia          = $this->request->getFile('image_esperiensia');
            $datafoto                   =$image_esperiensia->getRandomName();

            $data = [
                'loron_esperiensia'         => $loron_esperiensia,
                'fatin_esperiensia'         => $fatin_esperiensia,
                'esperiensia_administrator' => $esperiensia_administrator,
                'esperiensia'               => $esperiensia,
                'lian_esperiensia'          => $lian_esperiensia,
                'image_esperiensia'         => $datafoto,
                'aktivo_esperiensia'        => null,
            ];
            // dd($data);
           $insert = $this->esperiensia->insert($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.errorValidation').'');
            }else{
                $image_esperiensia->move('uploads/fotoesperiensia/', $datafoto);
                return redirect()->to(base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')))->with('success',''.lang('esperiensiaPortfolio.successValidation').'');
            }
        }
    }

    public function editesperiensia($lian,$id = null)
    {
        $data['administrator'] = $this->administrator->where('sistema =', 'Administrator')->rowadministrator();
        $data['esperiensia'] = $this->esperiensia->where('id_esperiensia', $id)->where('aktivo_esperiensia =', null)->where('lian_esperiensia =', $lian)->esperiensia();
        if (!$data['esperiensia']) {
            return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
        }else {
            # code...
            return view('administrator/esperiensia/trokaesperiensia', $data);
        }
    }

    public function update($id = null)
    {
        
        $validate = $this->validate([
            'fatin_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.fatinValidation').'',
                ],
            ],
            'loron_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.dataValidation').'',
                ],
            ],

            'esperiensia_administrator'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.sistemaValidation').'',
                ],
            ],

            'lian_esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.lianValidation').'',
                ],
            ],
            'esperiensia'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('esperiensiaPortfolio.esperiensiaValidation').'',
                ],
            ],
        ]);
 
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors()); 
        } else {
            $loron_esperiensia          = $this->request->getPost('loron_esperiensia');
            $fatin_esperiensia          = $this->request->getPost('fatin_esperiensia');
            $esperiensia                = $this->request->getPost('esperiensia');
            $esperiensia_administrator  = $this->request->getPost('esperiensia_administrator');
            $lian_esperiensia           = $this->request->getPost('lian_esperiensia');
                $data = [
                    'id_esperiensia'            => $id,
                    'loron_esperiensia'         => $loron_esperiensia,
                    'fatin_esperiensia'         => $fatin_esperiensia,
                    'esperiensia_administrator' => $esperiensia_administrator,
                    'esperiensia'               => $esperiensia,
                    'lian_esperiensia'          => $lian_esperiensia,
                    'aktivo_esperiensia'        => null,
                ];
                
                $narativa = $this->esperiensia->update($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.errorValidation').'');
            }else {
                    return redirect()->to(base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')))->with('success',''.lang('esperiensiaPortfolio.successValidation').'');
            }
        }
        
    }
    public function troka()
    {
        $aktivo_esperiensia = $this->request->getPost('aktivo_esperiensia');
        $id = $this->request->getPost('id');
        $data = [
            'id_esperiensia'        =>$id,
            'aktivo_esperiensia'    =>$aktivo_esperiensia,
        ];
        $insert = $this->db->table('esperiensia')->where(['id_esperiensia'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.esperiensiaUrlPortfolio').'');
            }else{
                return redirect()->to(base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')))->with('success',''.lang('esperiensiaPortfolio.successValidation').'');
            }
    }
    public function image($id=null)
    {
        $data['esperiensia'] = $this->esperiensia->where('id_esperiensia', $id)->where('aktivo_esperiensia =', null)->esperiensia();
        return view('administrator/esperiensia/trokafoto', $data);
    }
    
    public function processoimage($id=null)
    {
        $model = new ModelEsperiensia();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(''.lang('esperiensiaPortfolio.errorValidation').'');
        }
        
        $validate = $this->validate([
            'image_esperiensia'=> [
            'rules' => 'uploaded[image_esperiensia]|mime_in[image_esperiensia,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_esperiensia,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan pdf',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
 
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
        
        $dt = $model->esperiensiaRow($id)->getRow();
        $gambar = $dt->image_esperiensia;
        $path = 'uploads/fotoesperiensia/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('image_esperiensia');
           $datafoto = $upload->getRandomName();
          
            $upload->move(WRITEPATH . '../public/uploads/fotoesperiensia/', $datafoto);

            $data = [
                'image_esperiensia'         => $datafoto,
            ];
            
            // dd($data);
            $narativa = $model->updateEsperiensia($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('esperiensiaPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')))->with('success',''.lang('esperiensiaPortfolio.successValidation').'');
            }
        }
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id) {
            $data = [
                'id_esperiensia'        =>$id,
                'aktivo_esperiensia'    =>null,
            ];
            $this->db->table('esperiensia')->where('id_esperiensia', $id)->update($data);
        }else {

        $this->db->table('esperiensia')
            ->set('aktivo_esperiensia',null,true)
            ->where('aktivo_esperiensia is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function permanente(){

        $model = new ModelEsperiensia();
        $id = $this->request->getPost('id');
        $dt = $model->esperiensiaRow($id)->getRow();
        $model->hamosEsperiensia($id);
        $gambar = $dt->image_esperiensia;
        $path = '../public/uploads/fotoesperiensia/';
        if ($path) {
            unlink($path.$gambar);
            $this->esperiensia->where('id_esperiensia', $id)->delete();
        }
        return redirect()->back()->withInput()->with('success', ''.lang('esperiensiaPortfolio.hamosValidation').'');
    }
    
}
