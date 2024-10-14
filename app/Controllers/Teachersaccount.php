<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelSistema;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Teachersaccount extends ResourceController
{
    protected $administrator;
    protected $sistema;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->administrator = new ModelAccountProtfolio();
        $this->sistema = new ModelSistema();
    }
    public function index()
    {
        
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)->administratorPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->administrator->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)->filteradministrator($keyword);
            if ($data['administrator'] == null) {
                return redirect()->to(base_url(lang('registoTeachers.registoUrlConta')))->with('error', ''.lang('registoTeachers.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 3)->administratorPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/registoteachers/registo', $data);
    }
    public function hamos()
    {
        
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', 1)->where('sistema_administrator =', 3)
         ->administratorPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->administrator->where('aktivo_administrator =', 1)->where('sistema_administrator =', 3)->filteradministrator($keyword);
            if ($data['administrator'] == null) {
                return redirect()->to(base_url(lang('registoTeachers.hamosRegistoUrlConta')))->with('error', ''.lang('registoTeachers.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', 1)->where('sistema_administrator =', 3)->where('id_sistema !=', 1)->administratorPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/registoteachers/hamosregisto', $data);
    }

    public function show($id = null)
    {
        
    }
    public function image($id=null)
    {
        $data['administrator'] = $this->administrator->where('id_administrator', $id)->administrator();
        return view('administrator/registoteachers/trokafoto', $data);
    }
    public function processoimage($id=null)
    {  
        $model = new ModelAccountProtfolio();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(''.lang('esperiensiaPortfolio.errorValidation').'');
        }
        
        $validate = $this->validate([
            'image_administrator'=> [
            'rules' => 'uploaded[image_administrator]|mime_in[image_administrator,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_administrator,16384]',
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
        
        $dt = $model->administratorRow($id)->getRow();
        $gambar = $dt->image_administrator;
        $path = 'uploads/fotoportfolio/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('image_administrator');
           $datafoto = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/uploads/fotoportfolio/', $datafoto);

            $data = [
                'image_administrator'         => $datafoto,
            ];
            
            // dd($data);
            $narativa = $model->updateAdministrator($id,$data);
            if (!$narativa) {
            return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.errorValidation').'');
            }else {
                    return redirect()->to(base_url(lang('registoTeachers.registoUrlConta')))->with('success',''.lang('registoTeachers.successValidation').'');
            }
        }
    }

    public function new()
    {
        $data ['sistema'] = $this->sistema->where('aktivo_sistema =', null)->where('id_sistema =', 3)->findAll();
        return view('administrator/registoteachers/aumentaregisto', $data);
    }

    public function create()
    {
        $validate =$this->validate([
            'naran_ikus' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.ikusValidation').'',
                ],
            ],
            'naran_primeiro' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.primeiroValidation').'',
                ],
            ],
            'naran_primeiro' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.primeiroValidation').'',
                ],
            ],
            'naran_kompleto' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.kompletoValidation').'',
                ],
            ],
            'email' => [
            'rules'=>'required|valid_email',
            'errors' => [
                'required'  => ''.lang('registoTeachers.emailValidation').'',
                'valid_email'  => 'Harus sesuai Struktur Email',
                ],
            ],
            'password' => [
            'rules'=> 'required|min_length[8]|matches[confpassword]',
            'errors' => [
                'required'  => ''.lang('registoTeachers.passwordValidation').'',
                'min_length'  => 'The password is too short and should be 8 characters long',
                'matches'  => 'Password Dont Match!',
                ],
            ],
            'confpassword' => [
            'rules'=> 'required|matches[password]',
            'errors' => [
                'required'  => ''.lang('registoTeachers.passwordValidation').'',
                'matches'  => 'Password Dont Match!',
                ],
            ],
            'jenero' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.jeneroValidation').'',
                ],
            ],
            'fatin_moris' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.fatinValidation').'',
                ],
            ],
            'loron_moris' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.loronValidation').'',
                ],
            ],
            'status_servisu' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.statusValidation').'',
                ],
            ],
            'sistema_administrator' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.sistemaValidation').'',
                ],
            ],
            'numero_whatsapp' => [
            'rules'=>'required',
            'errors' => [
                'required'  => ''.lang('registoTeachers.whatsappValidation').'',
                ],
            ],
            'numero_eleitural' => [
            'rules'=>'required|numeric',
            'errors' => [
                'required'  => ''.lang('registoTeachers.whatsappValidation').'',
                'numeric'  => 'Hanya Untuk Angka',
                ],
            ],
            'image_administrator'=> [
            'rules' => 'uploaded[image_administrator]|mime_in[image_administrator,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_administrator,16384]',
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
            $naran_kompleto         = $this->request->getPost('naran_kompleto');
            $email                  = $this->request->getPost('email');
            $password               = $this->request->getVar('password');
            $jenero                 = $this->request->getPost('jenero');
            $fatin_moris            = $this->request->getPost('fatin_moris');
            $loron_moris            = $this->request->getPost('loron_moris');
            $status_servisu         = $this->request->getPost('status_servisu');
            $sistema_administrator  = $this->request->getPost('sistema_administrator');
            $numero_whatsapp        = $this->request->getPost('numero_whatsapp');
            $numero_eleitural       = $this->request->getPost('numero_eleitural');
            $image                  = $this->request->getFile('image_administrator');
            $datafoto               = $image->getRandomName();
    
           
            if ($this->administrator->cek_naran($naran_kompleto)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('registoTeachers.ihaKompletoValidation').'');
            }elseif ($email == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.emailValidation').'');
            }elseif ($this->administrator->cek_email($email)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('registoTeachers.ihaEMailValidation').'');
            }else {
                $data = [
                    'naran_primeiro'        => $naran_primeiro,
                    'naran_ikus'            => $naran_ikus,
                    'naran_kompleto'        => $naran_kompleto,
                    'email'                 => $email,
                    'sena'                  => password_hash($password, PASSWORD_BCRYPT),
                    'jenero'                => $jenero,
                    'fatin_moris'           => $fatin_moris,
                    'loron_moris'           => $loron_moris,
                    'status_servisu'        => $status_servisu,
                    'numero_telefone'       => $numero_whatsapp,
                    'numero_eleitural'      => $numero_eleitural,
                    'aktivo_administrator'  => null,
                    'image_administrator'   => $datafoto,
                    'sistema_administrator' => $sistema_administrator,
                ];
                // dd($data);
        
               $insert = $this->administrator->insert($data);
               if ($insert) {
                $data =  $this->administrator->where('id_administrator' ,$insert)->first();
                $randomenu = rand(000,99999);
                $randomsidebar = rand(000,88888);
                $datamenu = [
                'id_menu_acesso' => $randomenu,
                'menu_profile' => 0,
                'menu_finansa' => 0,
                'menu_funsionario' => 0,
                'menu_profesores' => 0,
                'menu_estudante' => 0,
                'menu_kategoria_materia' => 0,
                'menu_kursus_projeito' => 0,
                'menu_classe_horario' => 0,
                'menu_sertifikado' => 0,
                'menu_sertifikado' => 0,
                'menu_administrator' => $data->id_administrator,
                ];
                $insert = $this->db->table('menu_acesso')->insert($datamenu);
                $datasidebar = [
                'id_direito_acesso' => $randomsidebar,
                'total_saldo' => 0,
                'total_osan_tama' => 0,
                'salario_funsionario' => 0,
                'salario_professores' => 0,
                'osan_impresta_funsionario' => 0,
                'osan_impresta_professores' => 0,
                'funsionario' => 0,
                'professores' => 0,
                'materia_professores' => 0,
                'estudante' => 0,
                'kategorio_materia' => 0,
                'materia' => 0,
                'kursus_projeito' => 0,
                'classe' => 0,
                'horario_kursus' => 0,
                'horario_kursus_hotu' => 0,
                'id_administrator_acesso' => $randomenu,
                ];
                $insert = $this->db->table('direito_acesso')->insert($datasidebar);
                
                $datainputupdatedelete = [
                    'troka_direito_acesso_autromos' => 0,
                    'aumenta_direito_acesso_autromos' => 0,
                    'hamos_direito_acesso_autromos' => 0,
                    'direito_accesso_id' => $randomsidebar
                ];
                $insert = $this->db->table('direito_acesso_autromos')->insert($datainputupdatedelete);
                }
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.errorValidation').'');
                }else{
                    $image->move('uploads/fotoportfolio/', $datafoto);
                    return redirect()->to(base_url(lang('registoTeachers.registoUrlConta')))->with('success',''.lang('registoTeachers.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data ['sistema'] = $this->sistema->where('aktivo_sistema =', null)->where('id_sistema =', 3)->findAll();
        $data['administrator'] = $this->administrator->where('id_administrator', $id)->where('id_sistema =', 3)->administrator();
        return view('administrator/registoteachers/trokaregisto', $data);
    }

    
    public function update($id = null)
    {
        $validate =$this->validate([
        'naran_ikus' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.ikusValidation').'',
            ],
        ],
        'naran_primeiro' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.primeiroValidation').'',
            ],
        ],
        'naran_primeiro' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.primeiroValidation').'',
            ],
        ],
        'naran_kompleto' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.kompletoValidation').'',
            ],
        ],
        'email' => [
        'rules'=>'required|valid_email',
        'errors' => [
            'required'  => ''.lang('registoTeachers.emailValidation').'',
            'valid_email'  => 'Harus sesuai Struktur Email',
            ],
        ],
        'jenero' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.jeneroValidation').'',
            ],
        ],
        'fatin_moris' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.fatinValidation').'',
            ],
        ],
        'loron_moris' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.loronValidation').'',
            ],
        ],
        'status_servisu' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.statusValidation').'',
            ],
        ],
        'sistema_administrator' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.sistemaValidation').'',
            ],
        ],
        'numero_whatsapp' => [
        'rules'=>'required',
        'errors' => [
            'required'  => ''.lang('registoTeachers.whatsappValidation').'',
            ],
        ],
        'numero_eleitural' => [
        'rules'=>'required|numeric',
        'errors' => [
            'required'  => ''.lang('registoTeachers.whatsappValidation').'',
            'numeric'  => 'Hanya Untuk Angka',
            ],
        ],
    ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else {
            $naran_primeiro         = $this->request->getPost('naran_primeiro');
            $naran_ikus             = $this->request->getPost('naran_ikus');
            $naran_kompleto         = $this->request->getPost('naran_kompleto');
            $email                  = $this->request->getPost('email');
            $jenero                 = $this->request->getPost('jenero');
            $fatin_moris            = $this->request->getPost('fatin_moris');
            $loron_moris            = $this->request->getPost('loron_moris');
            $status_servisu         = $this->request->getPost('status_servisu');
            $sistema_administrator  = $this->request->getPost('sistema_administrator');
            $numero_whatsapp        = $this->request->getPost('numero_whatsapp');
            $numero_eleitural       = $this->request->getPost('numero_eleitural');

             if ($this->administrator->cek_naran($naran_kompleto,$id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('registoTeachers.ihaKompletoValidation').'');
            }elseif ($email == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.emailValidation').'');
            }elseif ($this->administrator->cek_email($email,$id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('registoTeachers.ihaEMailValidation').'');
            }else {

                $data = [
                    'id_administrator'      => $id,
                    'naran_primeiro'        => $naran_primeiro,
                    'naran_ikus'            => $naran_ikus,
                    'naran_kompleto'        => $naran_kompleto,
                    'email'                 => $email,
                    'jenero'                => $jenero,
                    'fatin_moris'           => $fatin_moris,
                    'loron_moris'           => $loron_moris,
                    'status_servisu'        => $status_servisu,
                    'numero_telefone'       => $numero_whatsapp,
                    'numero_eleitural'      => $numero_eleitural,
                    'aktivo_administrator'  => null,
                    'sistema_administrator' => $sistema_administrator,
                ];                                                          
                $narativa = $this->administrator->update($id,$data);
                if (!$narativa) {
                    return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.errorValidation').'');
                }else {
                        return redirect()->to(base_url(lang('registoTeachers.registoUrlConta')))->with('success',''.lang('registoTeachers.successValidation').'');
                }
            }
        } 
    }

    public function troka()
    {
        $aktivo_administrator = $this->request->getPost('aktivo_administrator');
        $valido_administrator = $this->request->getPost('valido_administrator');
        $id = $this->request->getPost('id');
        $data = [
            'id_administrator'        =>$id,
            'aktivo_administrator'    =>$aktivo_administrator,
            'valido_administrator'    =>$valido_administrator,
        ];
        $insert = $this->db->table('administrator')->where(['id_administrator'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('registoTeachers.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('registoTeachers.registoUrlConta')))->with('success',''.lang('registoTeachers.successValidation').'');
            }
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('administrator')
            ->set('aktivo_administrator',null,true)
            ->where('id_administrator',$id)
            ->update();
        }else {

        $this->db->table('administrator')
            ->set('aktivo_administrator',null,true)
            ->where('aktivo_administrator is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('registoTeachers.hamosRegistoUrlConta')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('registoTeachers.hamosRegistoUrlConta')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function permanente(){
        
        $model = new ModelAccountProtfolio();
        $id = $this->request->getPost('id');
        $dt = $model->administratorRow($id)->getRow();
        $model->hamosAdministrator($id);
        $gambar = $dt->image_administrator;
        $path = '../public/uploads/fotoportfolio/';
        if ($path) {
            unlink($path.$gambar);
            $this->administrator->where('id_administrator', $id)->delete();
        }
        return redirect()->back()->with('success', ''.lang('registoTeachers.hamosValidation').'');
    }
}
