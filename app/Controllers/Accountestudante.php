<?php

namespace App\Controllers;

use App\Models\ModelAccountEstudante;
use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Accountestudante extends ResourceController
{
    protected $estudante;
    protected $sistema;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
      $this->estudante = new ModelAccountEstudante();
      $this->sistema = new ModelSistema(); 
      $this->db = \Config\Database::connect();
    }
    public function index()
    {
        
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->estudante->orderBy('id_estudante', 'DESC')->where('aktivo_estudante =', null)->where('sistema_estudante =', 4)
         ->estudantePagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->estudante->where('aktivo_estudante =', null)->where('sistema_estudante =', 4)->filterestudante($keyword);
            if ($data['estudante'] == null) {
                return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('error', ''.lang('registoestudante.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->estudante->orderBy('id_estudante', 'DESC')->where('aktivo_estudante =', null)->where('sistema_estudante =', 4)->estudantePagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/registoestudante/registo', $data);
    }

    public function hamos()
    {
        
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->estudante->orderBy('id_estudante', 'DESC')->where('aktivo_estudante =', 1)->where('sistema_estudante =', 4)
         ->estudantePagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->estudante->where('aktivo_estudante =', 1)->where('sistema_estudante =', 4)->filterestudante($keyword);
            if ($data['estudante'] == null) {
                return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('error', ''.lang('registoestudante.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->estudante->orderBy('id_estudante', 'DESC')->where('aktivo_estudante =', 1)->where('sistema_estudante =', 4)->estudantePagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/registoestudante/hamosregisto', $data);
    }

    public function new()
    {
        $data ['sistema'] = $this->sistema->where('aktivo_sistema =', null)->where('id_sistema =', 4)->findAll();
        return view('administrator/registoestudante/aumentaregisto', $data);
    }

    public function create()
    {
        $validate =$this->validate([
            'naran_ikus' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.ikusValidation').'',
                ],
            ],
            'naran_primeiro' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.primeiroValidation').'',
                ],
            ],
            'naran_primeiro' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.primeiroValidation').'',
                ],
            ],
            'naran_kompletos' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.kompletoValidation').'',
                ],
            ],
            'emails' => [
            'rules'=>'required|valid_email',
            'errors' => [
                'required'  => ''.lang('registoestudante.emailValidation').'',
                'valid_email'  => 'Harus sesuai Struktur Email',
                ],
            ],
            'password' => [
            'rules'=> 'required|min_length[8]|matches[confpassword]',
            'errors' => [
                'required'  => ''.lang('registoestudante.passwordValidation').'',
                'min_length'  => 'The password is too short and should be 8 characters long',
                'matches'  => 'Password Dont Match!',
                ],
            ],
            'confpassword' => [
            'rules'=> 'required|matches[password]',
            'errors' => [
                'required'  => ''.lang('registoestudante.passwordValidation').'',
                'matches'  => 'Password Dont Match!',
                ],
            ],
            'jenero' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.jeneroValidation').'',
                ],
            ],
            'fatin_moris' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.fatinValidation').'',
                ],
            ],
            'loron_moris' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.loronValidation').'',
                ],
            ],
            'status_servisu' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.statusValidation').'',
                ],
            ],
            'sistema_estudante' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.sistemaValidation').'',
                ],
            ],
            'numero_whatsapp' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoestudante.whatsappValidation').'',
                ],
            ],
            'numero_eleitural' => [
            'rules'=>'required|numeric',
            'errors' => [
                'required'  => ''.lang('registoestudante.whatsappValidation').'',
                'numeric'  => 'Hanya Untuk Angka',
                ],
            ],
            'image_estudante'=> [
            'rules' => 'uploaded[image_estudante]|mime_in[image_estudante,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_estudante,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            # code...
            $naran_primeiro         = $this->request->getPost('naran_primeiro');
            $naran_ikus             = $this->request->getPost('naran_ikus');
            $naran_kompletos         = $this->request->getPost('naran_kompletos');
            $email                  = $this->request->getPost('email');
            $password               = $this->request->getVar('password');
            $jenero                 = $this->request->getPost('jenero');
            $fatin_moris            = $this->request->getPost('fatin_moris');
            $loron_moris            = $this->request->getPost('loron_moris');
            $status_servisu         = $this->request->getPost('status_servisu');
            $sistema_estudante  = $this->request->getPost('sistema_estudante');
            $numero_whatsapp        = $this->request->getPost('numero_whatsapp');
            $numero_eleitural       = $this->request->getPost('numero_eleitural');
            $image                  = $this->request->getFile('image_estudante');
            $datafoto               = $image->getRandomName();
    
           
            if ($this->estudante->cek_naran($naran_kompletos)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('registoestudante.ihaKompletoValidation').'');
            }elseif ($email == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.emailValidation').'');
            }elseif ($this->estudante->cek_email($email)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('registoestudante.ihaEMailValidation').'');
            }else {
                $data = [
                    'naran_primeiro'        => $naran_primeiro,
                    'naran_ikus'            => $naran_ikus,
                    'naran_kompletos'        => $naran_kompletos,
                    'email'                 => $email,
                    'sena'                  => password_hash($password, PASSWORD_BCRYPT),
                    'jenero'                => $jenero,
                    'fatin_moris'           => $fatin_moris,
                    'loron_moris'           => $loron_moris,
                    'status_servisu'        => $status_servisu,
                    'numero_telefone'       => $numero_whatsapp,
                    'numero_eleitural'      => $numero_eleitural,
                    'aktivo_estudante'      => null,
                    'image_estudante'       => $datafoto,
                    'valido_estudante'       => 0,
                    'valido_estudante'       => date('Y-M-d'),
                    'sistema_estudante'     => $sistema_estudante,
                ];
                // dd($data);
        
               $insert = $this->estudante->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
                }else{
                    $image->move('uploads/fotoestudante/', $datafoto);
                    return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('success',''.lang('registoestudante.successValidation').'');
                }
            }
        }
    }

     public function edit($id = null)
    {
        $data ['sistema'] = $this->sistema->where('aktivo_sistema =', null)->where('id_sistema =', 4)->findAll();
        $data['estudante'] = $this->estudante->where('id_estudante', $id)->estudante();
        if (!$data['estudante']) {
            return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.bukaValidation').'');
        }
        return view('administrator/registoestudante/trokaregisto', $data);
    }

    public function update($id = null)
    {
        $validate =$this->validate([
        'naran_ikus' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.ikusValidation').'',
            ],
        ],
        'naran_primeiro' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.primeiroValidation').'',
            ],
        ],
        'naran_primeiro' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.primeiroValidation').'',
            ],
        ],
        'naran_kompletos' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.kompletoValidation').'',
            ],
        ],
        'email' => [
        'rules'=>'required|valid_email',
        'errors' => [
            'required'  => ''.lang('registoestudante.emailValidation').'',
            'valid_email'  => 'Harus sesuai Struktur Email',
            ],
        ],
        'jenero' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.jeneroValidation').'',
            ],
        ],
        'fatin_moris' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.fatinValidation').'',
            ],
        ],
        'loron_moris' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.loronValidation').'',
            ],
        ],
        'status_servisu' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.statusValidation').'',
            ],
        ],
        'sistema_estudante' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.sistemaValidation').'',
            ],
        ],
        'numero_whatsapp' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoestudante.whatsappValidation').'',
            ],
        ],
        'numero_eleitural' => [
        'rules'=>'required|numeric',
        'errors' => [
            'required'  => ''.lang('registoestudante.whatsappValidation').'',
            'numeric'  => 'Hanya Untuk Angka',
            ],
        ],
    ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $naran_primeiro         = $this->request->getPost('naran_primeiro');
            $naran_ikus             = $this->request->getPost('naran_ikus');
            $naran_kompletos         = $this->request->getPost('naran_kompletos');
            $email                  = $this->request->getPost('email');
            $jenero                 = $this->request->getPost('jenero');
            $fatin_moris            = $this->request->getPost('fatin_moris');
            $loron_moris            = $this->request->getPost('loron_moris');
            $status_servisu         = $this->request->getPost('status_servisu');
            $sistema_estudante  = $this->request->getPost('sistema_estudante');
            $numero_whatsapp        = $this->request->getPost('numero_whatsapp');
            $numero_eleitural       = $this->request->getPost('numero_eleitural');

             if ($this->estudante->cek_naran($naran_kompletos,$id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('registoestudante.ihaKompletoValidation').'');
            }elseif ($email == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.emailValidation').'');
            }elseif ($this->estudante->cek_email($email,$id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('registoestudante.ihaEMailValidation').'');
            }else {

                $data = [
                    'id_estudante'      => $id,
                    'naran_primeiro'        => $naran_primeiro,
                    'naran_ikus'            => $naran_ikus,
                    'naran_kompletos'        => $naran_kompletos,
                    'email'                 => $email,
                    'jenero'                => $jenero,
                    'fatin_moris'           => $fatin_moris,
                    'loron_moris'           => $loron_moris,
                    'status_servisu'        => $status_servisu,
                    'numero_telefone'       => $numero_whatsapp,
                    'numero_eleitural'      => $numero_eleitural,
                    'aktivo_estudante'      => null,
                    'sistema_estudante'     => $sistema_estudante,
                ];                                                          
                $narativa = $this->estudante->update($id,$data);
                if (!$narativa) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
                }else {
                        return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('success',''.lang('registoestudante.successValidation').'');
                }
            }
        } 
    }
    public function image($id=null)
    {
        $data['estudante'] = $this->estudante->where('id_estudante', $id)->estudante();
        if (!$data['estudante']) {
            return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.bukaValidation').'');
        }
        return view('administrator/registoestudante/trokafoto', $data);
    }
    public function processoimage($id=null)
    {  
        $validate = $this->validate([
            'image_estudante'=> [
            'rules' => 'uploaded[image_estudante]|mime_in[image_estudante,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_estudante,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
 
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
        
        $dt = $this->estudante->getWhere(['id_estudante'=>$id])->getRow();
        $gambar = $dt->image_estudante;
        $path = 'uploads/fotoestudante/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('image_estudante');
           $datafoto = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/uploads/fotoestudante/', $datafoto);

            $data = [
                'image_estudante'         => $datafoto,
            ];
            
            // dd($data);
            $narativa = $this->estudante->update($id,$data);
            if (!$narativa) {
            return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
            }else {
                    return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('success',''.lang('registoestudante.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_estudante = $this->request->getPost('aktivo_estudante');
        $valido_estudante = $this->request->getPost('valido_estudante');
        $id = $this->request->getPost('id');
        $data = [
            'id_estudante'        =>$id,
            'aktivo_estudante'    =>$aktivo_estudante,
            'valido_estudante'    =>$valido_estudante,
        ];
        $insert = $this->db->table('estudante')->where(['id_estudante'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoestudante.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('registoestudante.registoUrlConta')))->with('success',''.lang('registoestudante.successValidation').'');
            }
    }
    public function temporario($id = null)
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('estudante')
            ->set('aktivo_estudante',null,true)
            ->set('valido_estudante','1',true)
            ->where('id_estudante',$id)
            ->update();
        }else {

        $this->db->table('estudante')
            ->set('aktivo_estudante',null,true)
            ->set('valido_estudante','1',true)
            ->where('aktivo_estudante is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('registoestudante.hamosRegistoUrlConta')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('registoestudante.hamosRegistoUrlConta')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function permanente($id = null)
    {

        $id = $this->request->getPost('id');
        $dt = $this->estudante->getWhere(['id_estudante'=>$id])->getRow();
        $this->estudante->delete(['id_estudante', $id]);
        $gambar = $dt->image_estudante;
        $path = '../public/uploads/fotoestudante/';
        if ($path) {
            unlink($path.$gambar);
            $this->estudante->where('id_estudante', $id)->delete();
        }
        return redirect()->back()->with('success', ''.lang('registoestudante.hamosValidation').'');
    }
}
