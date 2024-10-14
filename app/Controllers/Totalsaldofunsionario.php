<?php

namespace App\Controllers;

use App\Models\ModelSaldoPortfolio;

class Totalsaldofunsionario extends BaseController
{
    protected $saldo;
    protected $validate;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->saldo = new ModelSaldoPortfolio();
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
        return view('funsionario/totalsaldofunsionario/totalsaldofunsionario', $data);
    }
}
