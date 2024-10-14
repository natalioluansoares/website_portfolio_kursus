<?php

namespace App\Controllers;

use App\Models\ModelSaldoPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Saldoportfolio extends ResourceController
{
    protected $saldo;
    protected $validate;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->saldo = new ModelSaldoPortfolio();
        $this->validate = \Config\Services::validation(); 
    }
    
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->saldo->orderBy('id_saldo_portfolio', 'DESC')->where('aktivo_saldo_portfolio =', null)->saldoPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->saldo->where('aktivo_saldo_portfolio =', null)->filtersaldo($keyword);
            if ($data['saldo'] == null) {
                return redirect()->to(base_url(lang('saldoPortfolio.saldoPortfolioUrlPortfolio')))->with('error', ''.lang('saldoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->saldo->orderBy('id_saldo_portfolio', 'DESC')->where('aktivo_saldo_portfolio =', null)->saldoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoportfolio/saldoportfolio', $data);
    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->saldo->orderBy('id_saldo_portfolio', 'DESC')->where('aktivo_saldo_portfolio =', 1)->saldoPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->saldo->where('aktivo_saldo_portfolio =', 1)->filtersaldo($keyword);
            if ($data['saldo'] == null) {
                return redirect()->to(base_url(lang('saldoPortfolio.hamosSaldoPortfolioUrlPortfolio')))->with('error', ''.lang('saldoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->saldo->orderBy('id_saldo_portfolio', 'DESC')->where('aktivo_saldo_portfolio =', 1)->saldoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoportfolio/hamos', $data);
    }

    
    public function show($id = null)
    {
        //
    }

    
    public function new()
    {
        return view('administrator/saldoportfolio/aumentasaldoportfolio');
    }

    
    public function create()
    {
    
        $validate = $this->validate([
            'kode_saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.kodeValidation').'',
                ],
            ],
            'saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.saldoValidation').'',
                ],
            ],
            'data_saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $kode = $this->request->getPost('kode_saldo_portfolio');
            $saldo = $this->request->getPost('saldo_portfolio');
            $data = $this->request->getPost('data_saldo_portfolio');
            
            if ($this->saldo->cek_kode($kode)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoPortfolio.ihaKodeValidation').'');
            
            }elseif ($this->saldo->cek_saldo($saldo)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoPortfolio.ihaSaldoValidation').'');
            }else {
            $data = [
                'kode_saldo_portfolio'  =>$kode,
                'saldo_portfolio'  =>$saldo,
                'data_saldo_portfolio'  =>$data,
            ];
                $insert = $this->saldo->insert($data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('saldoPortfolio.saldoPortfolioUrlPortfolio')))->with('success',''.lang('saldoPortfolio.successValidation').'');
                }
            }
        }
    }

    
    public function edit($id = null)
    {
        $data['saldo'] = $this->saldo->where('id_saldo_portfolio', $id)->where('aktivo_saldo_portfolio =', null)->first();
        if (!$data['saldo']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldoPortfolio.bukaValidation').'');
        }
        return view('administrator/saldoportfolio/trokasaldoportfolio', $data);
    }

    
    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.kodeValidation').'',
                ],
            ],
            'saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.saldoValidation').'',
                ],
            ],
            'data_saldo_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldoPortfolio.dataValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $kode = $this->request->getPost('kode_saldo_portfolio');
            $saldo = $this->request->getPost('saldo_portfolio');
            $data = $this->request->getPost('data_saldo_portfolio');
            
            if ($this->saldo->cek_kode($kode,$id)->resultID->num_rows > 0) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoPortfolio.ihaKodeValidation').'');
            
            }elseif ($this->saldo->cek_saldo($saldo,$id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error',''.lang('saldoPortfolio.ihaSaldoValidation').'');
            }else {
            $data = [
                'id_saldo_portfolio'  =>$id,
                'kode_saldo_portfolio'  =>$kode,
                'saldo_portfolio'  =>$saldo,
                'data_saldo_portfolio'  =>$data,
            ];
                $insert = $this->saldo->update($id, $data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('sistemaPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('saldoPortfolio.saldoPortfolioUrlPortfolio')))->with('success',''.lang('saldoPortfolio.successValidation').'');
                }
            }
        }
    }
    public function troka()
    {
        $aktivo_saldo_portfolio = $this->request->getPost('aktivo_saldo_portfolio');
        $id = $this->request->getPost('id');
        $data = [
            'id_saldo_portfolio'        =>$id,
            'aktivo_saldo_portfolio'    =>$aktivo_saldo_portfolio,
        ];
        $insert = $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldoPortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('saldoPortfolio.successValidation').'');
            }
    }
     
    
    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $data = [
            'id_saldo_portfolio'        =>$id,
            'aktivo_saldo_portfolio'    =>null,
        ];
        $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id])->update($data);
        }else {

        $this->db->table('saldo_portfolio')
            ->set('aktivo_saldo_portfolio',null,true)
            ->where('aktivo_saldo_portfolio is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url(lang('saldoPortfolio.hamosSaldoPortfolioUrlPortfolio')))->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->to(site_url(lang('saldoPortfolio.hamosSaldoPortfolioUrlPortfolio')))->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }
    public function permanente(){
        $id = $this->request->getPost('id');
        $this->saldo->where('id_saldo_portfolio', $id)->delete();
        return redirect()->back()->with('success', ''.lang('saldoPortfolio.hamosValidation').'');
    }

    public function delete($id = null)
    {
        //
    }
}
