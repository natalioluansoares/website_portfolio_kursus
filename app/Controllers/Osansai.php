<?php

namespace App\Controllers;

use App\Models\ModelOsanSai;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Osansai extends ResourceController
{
    protected $osansai;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
       $this->osansai = new ModelOsanSai(); 
       $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->osansai->orderBy('id_osan_sai', 'DESC')->where('aktivo_osan_sai =', null)->osanSaiPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->osansai->where('aktivo_osan_sai =', null)->filterosansai($keyword);
            if ($data['osansai'] == null) {
                return redirect()->to(base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio')))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->osansai->orderBy('id_osan_sai', 'DESC')->where('aktivo_osan_sai =', null)->osanSaiPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/osansai/osansai', $data);
    }

    public function show($id = null)
    {
        $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
        if (!$data['osansai']) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
        return view('administrator/osansai/trokaosansaiimage', $data);
    }
    public function updateimage($id = null)
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(''.lang('saldoprivadoPortfolio.errorValidation').'');
        }
        
        $validate = $this->validate([
            'image_osan_sai'=> [
            'rules' => 'uploaded[image_osan_sai]|mime_in[image_osan_sai,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_osan_sai,16384]',
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
        
        $dt = $this->osansai->getWhere(['id_osan_sai'=> $id])->getRow();
        $gambar = $dt->image_osan_sai;
        $path = 'uploads/fotosaldoprivado/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('image_osan_sai');
           $datafoto = $upload->getRandomName();
          
            $upload->move(WRITEPATH . '../public/uploads/fotosaldoprivado/', $datafoto);

            $data = [
                'id_osan_sai'     =>$id,
                'image_osan_sai'         => $datafoto,
            ];
            
            $narativa = $this->osansai->update($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
            }
        }
    }

    public function new()
    {
        return view('administrator/osansai/aumentaosansai');
    }

    public function create()
    {
    
        $validate = $this->validate([
            'kode_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.kodeOsanSaiValidation').'',
                ],
            ],
            'naran_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.naranOsanSaiValidation').'',
                ],
            ],
            'horas_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.timeOsanSaiValidation').'',
                ],
            ],
            'data_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.dataOsanSaiValidation').'',
                ],
            ],
            'image_osan_sai'=> [
            'rules' => 'uploaded[image_osan_sai]|mime_in[image_osan_sai,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_osan_sai,16384]',
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

            $kode_osan_sai          = $this->request->getPost('kode_osan_sai');
            $naran_osan_sai         = $this->request->getPost('naran_osan_sai');
            $horas_osan_sai         = $this->request->getPost('horas_osan_sai');
            $data_osan_sai          = $this->request->getPost('data_osan_sai');
            $image_osan_sai         = $this->request->getFile('image_osan_sai');
            $datafoto               =$image_osan_sai->getRandomName();
            if ($this->osansai->cek_kode($kode_osan_sai)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.ihaKodeValidation').'');
            }elseif ($this->osansai->cek_organizasaun($naran_osan_sai)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('osanSaiPortfolio.ihaOrganizasaunValidation').'');

            }else {
            $data = [
                'kode_osan_sai'             =>$kode_osan_sai,
                'naran_osan_sai'            =>$naran_osan_sai,
                'horas_osan_sai'            =>$horas_osan_sai,
                'data_osan_sai'             =>$data_osan_sai,
                'image_osan_sai'            =>$datafoto,
                'aktivo_osan_sai'           =>null,
            ];
                $insert = $this->osansai->insert($data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                    $image_osan_sai->move('uploads/fotosaldoprivado/', $datafoto);
                return redirect()->to(base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio')))->with('success',''.lang('osanSaiPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
        if (!$data['osansai']) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
        return view('administrator/osansai/trokaosansai', $data);
    }

    public function update($id = null)
    {
    
        $validate = $this->validate([
            'kode_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.kodeOsanSaiValidation').'',
                ],
            ],
            'naran_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.naranOsanSaiValidation').'',
                ],
            ],
            'horas_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.timeOsanSaiValidation').'',
                ],
            ],
            'data_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.dataOsanSaiValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $kode_osan_sai          = $this->request->getPost('kode_osan_sai');
            $naran_osan_sai         = $this->request->getPost('naran_osan_sai');
            $horas_osan_sai         = $this->request->getPost('horas_osan_sai');
            $data_osan_sai          = $this->request->getPost('data_osan_sai');
            if ($this->osansai->cek_kode($kode_osan_sai, $id)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.ihaKodeValidation').'');
            }elseif ($this->osansai->cek_organizasaun($naran_osan_sai, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('osanSaiPortfolio.ihaOrganizasaunValidation').'');

            }else {
            $data = [
                'kode_osan_sai'             =>$kode_osan_sai,
                'naran_osan_sai'            =>$naran_osan_sai,
                'horas_osan_sai'            =>$horas_osan_sai,
                'data_osan_sai'             =>$data_osan_sai,
                'aktivo_osan_sai'           =>null,
            ];
                $insert = $this->osansai->update($id, $data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio')))->with('success',''.lang('osanSaiPortfolio.successValidation').'');
                }
            }
        }
    }
    public function troka()
    {
        $aktivo_osan_sai = $this->request->getPost('aktivo_osan_sai');
        $id = $this->request->getPost('id');
        $data = [
            'id_osan_sai'        =>$id,
            'aktivo_osan_sai'    =>$aktivo_osan_sai,
        ];
        $insert = $this->db->table('osan_sai')->where(['id_osan_sai'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->osansai->orderBy('id_osan_sai', 'DESC')->where('aktivo_osan_sai =', 1)->osanSaiPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->osansai->where('aktivo_osan_sai =', 1)->filterosansai($keyword);
            if ($data['osansai'] == null) {
                return redirect()->to(base_url(lang('saldoprivadoPortfolio.hamosSaldoPrivadoUrlPortfolio')))->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->osansai->orderBy('id_osan_sai', 'DESC')->where('aktivo_osan_sai =', 1)->osanSaiPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/osansai/hamos', $data);
    }
    
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('osan_sai')
            ->set('aktivo_osan_sai',null,true)
            ->where('id_osan_sai',$id)
            ->update();
        }else {

        $this->db->table('osan_sai')
            ->set('aktivo_osan_sai',null,true)
            ->where('aktivo_osan_sai is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function hamoshotupermanente()
    {
        $data =  $this->osansai->where('aktivo_osan_sai =', 1)->findAll();
        foreach($data as $hamos){
            $this->osansai->where('id_osan_sai', $hamos->id_osan_sai)->delete();
        }
        return redirect()->back()->with('success', ''.lang('saldotamaPortfolio.hamosValidation').'');
    }
    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->osansai->where('id_osan_sai', $id)->delete();
        return redirect()->back()->with('success', ''.lang('saldotamaPortfolio.hamosValidation').'');
    }
}
