<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelValores;
use CodeIgniter\HTTP\ResponseInterface;

class Perguntasestudante extends BaseController
{
    protected $valores;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->valores = new ModelValores();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->valores->orderBy('id_valores', 'DESC')->rowvaloresestudantePagination(5, $keyword);
        
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->valores->filtervaloresestudante($keyword);

            
            if ($data['valoresestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio')))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->valores->orderBy('id_valores', 'DESC')->rowvaloresestudantePagination(5, $keyword);

            $data ['keyword']= $keyword;
         }
        return view('estudante/profile/index',$data);
    }
    public function perguntas()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->valores->orderBy('id_valores', 'DESC')->rowvaloresestudantePagination(5, $keyword);
        
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->valores->filtervaloresestudante($keyword);

            
            if ($data['valoresestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.showValoresEstudanteFunsionarioUrlPortofolio')))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->valores->orderBy('id_valores', 'DESC')->rowvaloresestudantePagination(5, $keyword);

            $data ['keyword']= $keyword;
         }
        return view('estudante/profile/perguntas',$data);
    }
    public function detailperguntas($id = null)
    {
        $data['valores'] = $this->valores->orderBy('id_valores', 'DESC')->where('id_valores', $id)->horarioestudante();
        return view('estudante/profile/detailperguntas',$data);
    }
}
