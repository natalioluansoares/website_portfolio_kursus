<?php

namespace App\Controllers;

use App\Models\ModelOsanTamaPrivado;
use App\Models\ModelSaldoDonatorPrivado;
use App\Models\ModelSaldoPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Saldodonatorfunsionario extends ResourceController
{
    protected $privado;
    protected $tama;
    protected $saldo;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->privado = new ModelSaldoDonatorPrivado();
        $this->saldo = new ModelSaldoPortfolio();
        $this->tama = new ModelOsanTamaPrivado();
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
                return redirect()->to(base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioUrlPortofolio')))->with('error', ''.lang('saldoprivadoPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', null)->privadoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/saldodonatorfunsionario/saldodonatorfunsionario', $data);
    }

    public function detail($id)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);
         $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
         if (!$data['privado']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->tama->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTama($keyword);
            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            if ($data['saldotama'] == null) {
                return redirect()->to(base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioShowUrlPortofolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);
            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            if (!$data['privado']) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('funsionario/saldodonatorfunsionario/saldotamafunsionario', $data);
    }

    public function aumenta($id=null)
    {
         $data['saldo'] = $this->saldo->where('aktivo_saldo_portfolio =', null)->findAll();
        $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->findAll();
        $data['portfolio'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->findAll();
        $data['row'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
        if (!$data['row']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
         }
        return view('funsionario/saldodonatorfunsionario/aumentasaldotamafunsionario', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'id_total_privado'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldotamaPortfolio.organizasaunValidation').'',
                ],
            ],
            'id_total_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldotamaPortfolio.saldoValidation').'',
                ],
            ],
            'data_saldo_tama'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldotamaPortfolio.dataValidation').'',
                ],
            ],
            'total_saldo_tama'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('saldotamaPortfolio.totalValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $id_total_privado           = $this->request->getPost('id_total_privado');
            $id_total_portfolio         = $this->request->getPost('id_total_portfolio');
            $data_saldo_tama            = $this->request->getPost('data_saldo_tama');
            $total_saldo_tama           = $this->request->getPost('total_saldo_tama');
            $data = [
                'id_total_privado'      =>$id_total_privado,
                'id_total_portfolio'    =>$id_total_portfolio,
                'data_saldo_tama'       =>$data_saldo_tama,
                'total_saldo_tama'      =>$total_saldo_tama,
                'aktivo_saldo_tama'     =>null,
            ];

            // Saldo Donator
            $totalosanprivado = $this->db->table('saldo_donator_privado')->getWhere(['id_saldo_privado'=> $data['id_total_privado']])->getRow();
            $saldoprivado = [
            'total_saldo_privado' => $totalosanprivado->total_saldo_privado + $data['total_saldo_tama'],
            ];
            $this->db->table('saldo_donator_privado')->where(['id_saldo_privado'=>$data['id_total_privado']])->update($saldoprivado);

            // Saldo Total
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_portfolio']])->getRow();
            $saldoportfolio = [
            'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio	 + $data['total_saldo_tama'],
            ];
            $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_portfolio']])->update($saldoportfolio);

            // Insert Data Tama Donator
            $insert = $this->tama->insert($data);
            if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
            return redirect()->to(base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioShowUrlPortofolio').$id_total_privado ))->with('success',''.lang('saldotamaPortfolio.successValidation').'');
            }
        }
    }

    public function troka()
    {
        $aktivo_saldo_tama = $this->request->getPost('aktivo_saldo_tama');
        $total_saldo_tama = $this->request->getPost('total_saldo_tama');
        $id_total_portfolio = $this->request->getPost('id_total_portfolio');
        $id_total_privado = $this->request->getPost('id_total_privado');
        $id = $this->request->getPost('id');

            $totalosantama = $this->db->table('saldo_tama_donator')->getWhere(['id_saldo_tama'=> $id])->getRow();
            $saldotama = [
            'total_saldo_tama' => $totalosantama->total_saldo_tama + $total_saldo_tama,
            ];
            $this->db->table('saldo_tama_donator')->where(['id_saldo_tama'=> $id])->update($saldotama);
        $data = [
            'id_saldo_tama'         =>$id,
            'aktivo_saldo_tama'     =>$aktivo_saldo_tama,
            'id_total_portfolio'    =>$id_total_portfolio,
            'id_total_privado'      =>$id_total_privado,
            'total_saldo_tama'      =>$total_saldo_tama,
        ];

        // Saldo Donator
            $totalosanprivado = $this->db->table('saldo_donator_privado')->getWhere(['id_saldo_privado'=> $data['id_total_privado']])->getRow();
            $saldoprivado = [
            'total_saldo_privado' => $totalosanprivado->total_saldo_privado - $data['total_saldo_tama'],
            ];
            $this->db->table('saldo_donator_privado')->where(['id_saldo_privado'=>$data['id_total_privado']])->update($saldoprivado);

            // Saldo Total
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_portfolio']])->getRow();
            $saldoportfolio = [
            'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $data['total_saldo_tama'],
            ];
            $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_portfolio']])->update($saldoportfolio);

            $insert = $this->db->table('saldo_tama_donator')->where(['id_saldo_tama'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioShowUrlPortofolio').$id_total_privado))->with('success',''.lang('funsionarioPortfolio.hamosValidation').'');
            }
    }
}
