<?php

namespace App\Controllers;

use App\Models\ModelSaldoDonatorPrivado;
use App\Models\ModelSaldoPortfolio;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Saldodonatorprivado extends  ResourceController
{
    protected $privado;
    protected $saldo;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->privado = new ModelSaldoDonatorPrivado();
        $this->saldo = new ModelSaldoPortfolio();
        $this->db = \Config\Database::connect();     
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', null)->privadoPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->privado->where('aktivo_saldo_privado =', null)->filterprivado($keyword);
            if ($data['privado'] == null) {
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')))->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', null)->privadoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoprivado/privado', $data);
    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', 1)->privadoPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->privado->where('aktivo_saldo_privado =', 1)->filterprivado($keyword);
            if ($data['privado'] == null) {
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.hamosSaldoPrivadoUrlPortfolio')))->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', 1)->privadoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoprivado/hamos', $data);
    }

    public function new()
    {
        return view('administrator/saldoprivado/aumentasaldoprivado');
    }

    public function create()
    {
    
        $validate = $this->validate([
            'kode_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.kodeValidation').'',
                ],
            ],
            'naran_organizasaun_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.organizasaunValidation').'',
                ],
            ],
            'descripsaun_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.descripsaunValidation').'',
                ],
            ],
            'data_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.dataValidation').'',
                ],
            ],
            'foto_privado'=> [
            'rules' => 'uploaded[foto_privado]|mime_in[foto_privado,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_privado,16384]',
            'errors' => [
                'uploaded' => 'Tenki Iha File Atu Upload',
                'mime_in' => 'File Extention Tenki Hanesan Foto',
                'max_size' => 'Ukuran File Maksimal 10 MB'
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $kode_saldo_privado         = $this->request->getPost('kode_saldo_privado');
            $naran_organizasaun_privado = $this->request->getPost('naran_organizasaun_privado');
            $descripsaun_saldo_privado  = $this->request->getPost('descripsaun_saldo_privado');
            $data_saldo_privado         = $this->request->getPost('data_saldo_privado');
            $foto_privado               = $this->request->getFile('foto_privado');
            $datafoto                   =$foto_privado->getRandomName();
            if ($this->privado->cek_kode($kode_saldo_privado)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.ihaKodeValidation').'');
            
            }elseif ($this->privado->cek_organizasaun($naran_organizasaun_privado)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaOrganizasaunValidation').'');

            }elseif ($this->privado->cek_descripsaun($descripsaun_saldo_privado)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaDescripsaunValidation').'');
            }else {
            $data = [
                'kode_saldo_privado'            =>$kode_saldo_privado,
                'naran_organizasaun_privado'    =>$naran_organizasaun_privado,
                'descripsaun_saldo_privado'     =>$descripsaun_saldo_privado,
                'data_saldo_privado'            =>$data_saldo_privado,
                'foto_privado'                  =>$datafoto,
                'aktivo_saldo_privado	'       =>null,
            ];
                $insert = $this->privado->insert($data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                    $foto_privado->move('uploads/fotosaldoprivado/', $datafoto);
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['privado'] = $this->privado->where('id_saldo_privado', $id)->first();
        if (!$data['privado']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
        }
        return view('administrator/saldoprivado/trokasaldoprivado', $data);
    }
    public function update($id = null)
    {
    
        $validate = $this->validate([
            'kode_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.kodeValidation').'',
                ],
            ],
            'naran_organizasaun_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.organizasaunValidation').'',
                ],
            ],
            'descripsaun_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.descripsaunValidation').'',
                ],
            ],
            'data_saldo_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $kode_saldo_privado         = $this->request->getPost('kode_saldo_privado');
            $naran_organizasaun_privado = $this->request->getPost('naran_organizasaun_privado');
            $descripsaun_saldo_privado  = $this->request->getPost('descripsaun_saldo_privado');
            $data_saldo_privado         = $this->request->getPost('data_saldo_privado');
            if ($this->privado->cek_kode($kode_saldo_privado, $id)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.ihaKodeValidation').'');
            
            }elseif ($this->privado->cek_organizasaun($naran_organizasaun_privado, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaOrganizasaunValidation').'');

            }elseif ($this->privado->cek_descripsaun($descripsaun_saldo_privado, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaDescripsaunValidation').'');
            }else {
            $data = [
                'id_saldo_privado'              =>$id,
                'kode_saldo_privado'            =>$kode_saldo_privado,
                'naran_organizasaun_privado'    =>$naran_organizasaun_privado,
                'descripsaun_saldo_privado'     =>$descripsaun_saldo_privado,
                'data_saldo_privado'            =>$data_saldo_privado,
                'aktivo_saldo_privado	'       =>null,
            ];
                $insert = $this->privado->update($id,$data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
                }
            }
        }
    }
    public function image($id=null)
    {
        $data['privado'] = $this->privado->where('id_saldo_privado', $id)->first();
        if (!$data['privado']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
        }
        return view('administrator/saldoprivado/trokafoto', $data);
    }
    public function processoimage($id=null)
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(''.lang('saldoprivadoPortfolio.errorValidation').'');
        }
        
        $validate = $this->validate([
            'foto_privado'=> [
            'rules' => 'uploaded[foto_privado]|mime_in[foto_privado,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_privado,16384]',
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
        
        $dt = $this->privado->getWhere(['id_saldo_privado'=> $id])->getRow();
        $gambar = $dt->foto_privado;
        $path = 'uploads/fotosaldoprivado/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('foto_privado');
           $datafoto = $upload->getRandomName();
          
            $upload->move(WRITEPATH . '../public/uploads/fotosaldoprivado/', $datafoto);

            $data = [
                'id_saldo_privado'     =>$id,
                'foto_privado'         => $datafoto,
            ];
            
            $narativa = $this->privado->update($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
            }
        }
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('saldo_donator_privado')
            ->set('aktivo_saldo_privado',null,true)
            ->where('id_saldo_privado',$id)
            ->update();
        }else {

        $this->db->table('saldo_donator_privado')
            ->set('aktivo_saldo_privado',null,true)
            ->where('aktivo_saldo_privado is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function troka()
    {
        $aktivo_saldo_privado = $this->request->getPost('aktivo_saldo_privado');
        $id = $this->request->getPost('id');
        $data = [
            'id_saldo_privado'        =>$id,
            'aktivo_saldo_privado'    =>$aktivo_saldo_privado,
        ];
        $insert = $this->db->table('saldo_donator_privado')->where(['id_saldo_privado'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio')))->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }

    public function permanente(){

        $id = $this->request->getPost('id');
        $dt = $this->privado->getWhere(['id_saldo_privado'=> $id])->getRow();
        $this->privado->delete(['id_saldo_privado'=> $id]);
        $gambar = $dt->foto_privado;
        $path = '../public/uploads/fotosaldoprivado/';
        if ($path) {
            unlink($path.$gambar);
            $this->privado->where('id_saldo_privado', $id)->delete();
        }
        return redirect()->back()->with('success', ''.lang('saldoprivadoPortfolio.hamosValidation').'');
    }
}

