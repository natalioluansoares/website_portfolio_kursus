<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSaldoPortfolio;
use App\Models\ModelTotalSaldoEstudante;
use CodeIgniter\HTTP\ResponseInterface;

class Totalsaldoestudante extends BaseController
{
    protected $payment;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->payment = new ModelTotalSaldoEstudante();
        $this->db = \Config\Database::connect();     
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
         $data = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('aktivo_total_saldo_estudante =',null)->totalOsanEstudantePagination(10, $keyword);
         $data['row'] = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('naran_total_saldo_estudante !=', 'Selu Kursus')->first();
         
         $data ['keyword']= $keyword;
         

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('aktivo_total_saldo_estudante =',null)->filterTotalOsanEstudante($keyword);
            $data['row'] = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('naran_total_saldo_estudante !=', 'Selu Kursus')->first();
            if ($data['osantotal'] == null) {
                return redirect()->to(base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')))->with('error', ''.lang('classePortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            $data = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('aktivo_total_saldo_estudante =',null)->totalOsanEstudantePagination(10, $keyword);
            $data['row'] = $this->payment->orderBy('id_total_saldo_estudante', 'DESC')->where('naran_total_saldo_estudante !=', 'Selu Kursus')->first();
            $data ['keyword']= $keyword;
            
         }
        return view('administrator/totalSaldoEstudante/totalSaldoEstudante', $data);
    }
    public function aumentatotalsaldoestudante()
    {
        return view('administrator/totalSaldoEstudante/aumentaTotalSaldoEstudante');
    }
    public function raitotalsaldoestudante()
    {
    
        $validate = $this->validate([
            'naran_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.organizasaunValidation').'',
                ],
            ],
            'descripsaun_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.descripsaunValidation').'',
                ],
            ],
            'data_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.dataValidation').'',
                ],
            ],
            'foto_total_saldo_estudante'=> [
            'rules' => 'uploaded[foto_total_saldo_estudante]|mime_in[foto_total_saldo_estudante,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_total_saldo_estudante,16384]',
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

            $naran_total_saldo_estudante = $this->request->getPost('naran_total_saldo_estudante');
            $descripsaun_total_saldo_estudante  = $this->request->getPost('descripsaun_total_saldo_estudante');
            $data_total_saldo_estudante         = $this->request->getPost('data_total_saldo_estudante');
            $foto_total_saldo_estudante               = $this->request->getFile('foto_total_saldo_estudante');
            $datafoto                   =$foto_total_saldo_estudante->getRandomName();
            
            if ($this->payment->cek_organizasaun($naran_total_saldo_estudante)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('totalSaldoEstudante.errorTransaksi').'');

            }elseif ($this->payment->cek_descripsaun($descripsaun_total_saldo_estudante)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaDescripsaunValidation').'');
            }else {
            $data = [
                'naran_total_saldo_estudante'       =>$naran_total_saldo_estudante,
                'descripsaun_total_saldo_estudante' =>$descripsaun_total_saldo_estudante,
                'data_total_saldo_estudante'        =>$data_total_saldo_estudante,
                'foto_total_saldo_estudante'        =>$datafoto,
                'aktivo_total_saldo_estudante	'   =>null,
            ];
                $insert = $this->payment->insert($data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                    $foto_total_saldo_estudante->move('uploads/fotosaldoprivado/', $datafoto);
                return redirect()->to(base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
                }
            }
        }
    }

    public function trokatotalsaldoestudante($id=null)
    {
        $data['saldoestudante'] = $this->payment->where('id_total_saldo_estudante', $id)->first();
        return view('administrator/totalSaldoEstudante/trokaTotalSaldoEstudante', $data);
    }

    public function trokaraitotalsaldoestudante($id=null)
    {
    
        $validate = $this->validate([
            'naran_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.organizasaunValidation').'',
                ],
            ],
            'descripsaun_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.descripsaunValidation').'',
                ],
            ],
            'data_total_saldo_estudante'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoprivadoPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $naran_total_saldo_estudante = $this->request->getPost('naran_total_saldo_estudante');
            $descripsaun_total_saldo_estudante  = $this->request->getPost('descripsaun_total_saldo_estudante');
            $data_total_saldo_estudante         = $this->request->getPost('data_total_saldo_estudante');
            
            if ($this->payment->cek_organizasaun($naran_total_saldo_estudante, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('totalSaldoEstudante.errorTransaksi').'');

            }elseif ($this->payment->cek_descripsaun($descripsaun_total_saldo_estudante, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoprivadoPortfolio.ihaDescripsaunValidation').'');
            }else {
            $data = [
                'id_total_saldo_estudante'          =>$id,
                'naran_total_saldo_estudante'       =>$naran_total_saldo_estudante,
                'descripsaun_total_saldo_estudante' =>$descripsaun_total_saldo_estudante,
                'data_total_saldo_estudante'        =>$data_total_saldo_estudante,
                'aktivo_total_saldo_estudante	'   =>null,
            ];
                $insert = $this->payment->update($id, $data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
                }
            }
        }
    }

    public function trokafotototalsaldoestudante($id=null)
    {
        $data['privado'] = $this->payment->where('id_total_saldo_estudante', $id)->first();
        return view('administrator/totalSaldoEstudante/trokafoto', $data);
    }

    public function trokaraifotototalsaldoestudante($id=null)
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(''.lang('saldoprivadoPortfolio.errorValidation').'');
        }
        
        $validate = $this->validate([
            'foto_total_saldo_estudante'=> [
            'rules' => 'uploaded[foto_total_saldo_estudante]|mime_in[foto_total_saldo_estudante,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_total_saldo_estudante,16384]',
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
        
        $dt = $this->payment->getWhere(['id_total_saldo_estudante'=> $id])->getRow();
        $gambar = $dt->foto_total_saldo_estudante;
        $path = 'uploads/fotosaldoprivado/';
        @unlink($path.$gambar);
           $upload = $this->request->getFile('foto_total_saldo_estudante');
           $datafoto = $upload->getRandomName();
          
            $upload->move(WRITEPATH . '../public/uploads/fotosaldoprivado/', $datafoto);

            $data = [
                'id_total_saldo_estudante'     =>$id,
                'foto_total_saldo_estudante'         => $datafoto,
            ];
            
            $narativa = $this->payment->update($id,$data);
            if (!$narativa) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoprivadoPortfolio.errorValidation').'');
            }else {
                return redirect()->to(base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')))->with('success',''.lang('saldoprivadoPortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_total_saldo_estudante = $this->request->getPost('aktivo_total_saldo_estudante');
        $id = $this->request->getPost('id');
        $data = [
            'id_total_saldo_estudante'        =>$id,
            'aktivo_total_saldo_estudante'    =>$aktivo_total_saldo_estudante,
        ];
        $insert = $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio')))->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }
    public function hamos()
    {
        $data['selukursus'] = $this->payment->where('naran_total_saldo_estudante =', 'Selu Kursus')->where('aktivo_total_saldo_estudante =',1)->findAll();
        $data['donatorkursus'] = $this->payment->where('naran_total_saldo_estudante =', 'Donator Kursus')->where('aktivo_total_saldo_estudante =',1)->findAll();
        $data['donator'] = $this->payment->where('naran_total_saldo_estudante =', 'Donator Kursus')->where('aktivo_total_saldo_estudante =',1)->findAll();
        return view('administrator/totalSaldoEstudante/temporarioTotalSaldoEstudante', $data);
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('total_saldo_estudante')
            ->set('aktivo_total_saldo_estudante',null,true)
            ->where('id_total_saldo_estudante',$id)
            ->update();
        }else {

        $this->db->table('total_saldo_estudante')
            ->set('aktivo_total_saldo_estudante',null,true)
            ->where('aktivo_total_saldo_estudante is NOT NULL', NULL, FALSE)
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

        $id = $this->request->getPost('id');
        $dt = $this->payment->getWhere(['id_total_saldo_estudante'=> $id])->getRow();
        $this->payment->delete(['id_total_saldo_estudante'=> $id]);
        $gambar = $dt->foto_total_saldo_estudante;
        $path = '../public/uploads/fotosaldoprivado/';
        if ($path) {
            unlink($path.$gambar);
            $this->payment->where('id_total_saldo_estudante', $id)->delete();
        }
        return redirect()->back()->with('success', ''.lang('saldoprivadoPortfolio.hamosValidation').'');
    }
}
