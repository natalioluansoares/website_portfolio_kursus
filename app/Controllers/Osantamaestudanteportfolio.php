<?php

namespace App\Controllers;

use App\Models\ModelFunsionario;
use App\Models\ModelHorarioEstudante;
use App\Models\ModelHorarioFunsionario;
use App\Models\ModelMateriaProfessores;
use App\Models\ModelOsanTamaEstudante;
use App\Models\ModelPreparasaunMateria;
use App\Models\ModelSaldoPortfolio;
use App\Models\ModelTotalSaldoEstudante;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Osantamaestudanteportfolio extends ResourceController
{
    protected $professores;
    protected $estudante;
    protected $horario;
    protected $preparasaun;
    protected $classe;
    protected $valores;
    protected $osan;
    protected $absensis;
    protected $saldo;
    protected $payment;
    protected $materiaprofessores;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->professores = new ModelFunsionario();
        $this->estudante = new ModelHorarioEstudante();
        $this->horario = new ModelHorarioFunsionario();
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->materiaprofessores = new ModelMateriaProfessores();
        $this->payment = new ModelTotalSaldoEstudante();
        $this->osan = new ModelOsanTamaEstudante();
         $this->saldo = new ModelSaldoPortfolio();
    }
   
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->professores->where('aktivo_professores =', null)->filterprofessores($keyword);
            if ($data['professores'] == null) {
                return redirect()->to(base_url(lang('professoresPortfolio.professoresUrlPortfolio')))->with('error', ''.lang('professoresPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->professores->orderBy('id_professores', 'DESC')->where('aktivo_professores =', null)->professoresPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoTamaEstudante/professores', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
         $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();

         if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->horario->where('horario_professores', $id)->where('horario_aktivo =', null)->filterhorarioprofessores($keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if ($data['horarioprofessores'] == null) {
                return redirect()->to(base_url(lang('totalSaldoEstudante.mateiraProfessoresSaldoTamaEstudanteUrlPortfolio').$id))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_professores', $id)->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
            $data['preparasaun'] = $this->preparasaun->where('materia_professores', $id)->preparasaunmateria();
            if (!$data['preparasaun']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoTamaEstudante/detailmateriaprofessores', $data);
    }

    public function detailvalores($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->horarioestudantePagination(20, $keyword);

        $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

        if (!$data['horario']) {
        return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->estudante->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->filterhorarioestudante($keyword);
            
            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();
            
            if ($data['horarioestudante'] == null) {
                return redirect()->to(base_url(lang('totalSaldoEstudante.detailValoresSaldoTamaEstudanteUrlPortfolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('horario_professores_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('horario_aktivo_estudante =', null)->horarioestudantePagination(20, $keyword);

            $data['horario'] = $this->horario->where('id_horario', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioprofessores();

            if (!$data['horario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoTamaEstudante/detailHorarioEstudante', $data);
    }

    public function saldoTamaEstudantePropinasDonator($hahu=null, $remata=null, $horario=null, $materia=null, $level=null , $propinasDonator = null)
    {
        $data['osantamaestudante'] = $this->osan->orderBy('id_saldo_tama_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('naran_total_saldo_estudante ', $propinasDonator)->where('aktivo_total_saldo_estudantes =', null)->resultSaldoTamaEstudante();

        $data['saldo'] = $this->saldo->where('aktivo_saldo_portfolio =', null)->findAll();

        $data['privado'] = $this->payment->where('naran_total_saldo_estudante', $propinasDonator)->where('aktivo_total_saldo_estudante =', null)->first();
        if (!$data['privado']) {
        return redirect()->back()->withInput()->with('error', '');
        }

         $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', '');
        }

         if (null !== $this->request->getGet('filter-data')) {
            $data['osantamaestudante'] = $this->osan->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_total_saldo_estudantes =', null)->where('naran_total_saldo_estudante', $propinasDonator)->filterOsanTamaEstudantePropinasDonator();
            
            $data['privado'] = $this->payment->where('naran_total_saldo_estudante', $propinasDonator)->where('aktivo_total_saldo_estudante =', null)->first();

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();
            
            if ($data['osantamaestudante'] == null) {
                return redirect()->to(base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level.'/'.$propinasDonator))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }


         }
        return view('administrator/saldoTamaEstudante/saldoTamaEstudante', $data);
    }
    public function temporarioSaldoTamaEstudantePropinasDonator($hahu=null, $remata=null, $horario=null, $materia=null, $level=null , $propinasDonator = null)
    {
        $data['osantamaestudante'] = $this->osan->orderBy('id_saldo_tama_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('naran_total_saldo_estudante ', $propinasDonator)->where('aktivo_total_saldo_estudantes =', 1)->resultSaldoTamaEstudante();

        $data['saldo'] = $this->saldo->where('aktivo_saldo_portfolio =', null)->findAll();

        $data['privado'] = $this->payment->where('naran_total_saldo_estudante', $propinasDonator)->where('aktivo_total_saldo_estudante =', null)->first();
        if (!$data['privado']) {
        return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
        }

         $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
        }

         if (null !== $this->request->getGet('filter-data')) {
            $data['osantamaestudante'] = $this->osan->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('aktivo_total_saldo_estudantes =', 1)->where('naran_total_saldo_estudante', $propinasDonator)->filterOsanTamaEstudantePropinasDonator();
            
            $data['privado'] = $this->payment->where('naran_total_saldo_estudante', $propinasDonator)->where('aktivo_total_saldo_estudante =', null)->first();

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();
            
            if ($data['osantamaestudante'] == null) {
                return redirect()->to(base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level.'/'.$propinasDonator))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }


         }
        return view('administrator/saldoTamaEstudante/temporarioSaldoTamaEstudante', $data);
    }

    

    public function aumentaSaldoTamaEstudantePropinasDonator()
    {
        $total_saldo_tama_estudante =$this->request->getPost('total_saldo_tama_estudante');
        $data_saldo_tama_estudante =$this->request->getPost('data_saldo_tama_estudante');
        $id_total_tama_donator  =$this->request->getPost('id_total_tama_donator');
        $id_total_tama_estudante =$this->request->getPost('id_total_tama_estudante');
        $id_total_saldo_portfolio =$this->request->getPost('id_total_saldo_portfolio');
        $data = [
            'total_saldo_tama_estudante' =>$total_saldo_tama_estudante,
            'data_saldo_tama_estudante' =>$data_saldo_tama_estudante,
            'id_total_tama_donator' =>$id_total_tama_donator,
            'id_total_tama_estudante' =>$id_total_tama_estudante,
            'id_total_saldo_portfolio' =>$id_total_saldo_portfolio,
            'aktivo_total_saldo_estudantes' =>null,
        ];

        $totalsaldoestudante = $this->db->table('total_saldo_estudante')->getWhere(['id_total_saldo_estudante'=> $data['id_total_tama_donator']])->getRow();
        $saldoprivado = [
        'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante + $data['total_saldo_tama_estudante'],
        ];
        $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$data['id_total_tama_donator']])->update($saldoprivado);

        $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_portfolio']])->getRow();
        $saldoportfolio = [
        'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $data['total_saldo_tama_estudante'],
        ];
        $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_portfolio']])->update($saldoportfolio);

        $insert = $this->osan->insert($data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }

    public function trokaSaldoTamaEstudantePropinasDonator()
    {
        $id_saldo_tama_estudante =$this->request->getPost('id_saldo_tama_estudante');
        $total_saldo_tama_estudante =$this->request->getPost('total_saldo_tama_estudante');
        $data_saldo_tama_estudante =$this->request->getPost('data_saldo_tama_estudante');
        $id_total_tama_donator  =$this->request->getPost('id_total_tama_donator');
        $id_total_tama_estudante =$this->request->getPost('id_total_tama_estudante');
        $id_total_saldo_portfolio =$this->request->getPost('id_total_saldo_portfolio');


        $totalsaldo = $this->db->table('saldo_tama_estudante')->getWhere(['id_saldo_tama_estudante'=> $id_saldo_tama_estudante])->getRow();
        $osan =  $totalsaldo->total_saldo_tama_estudante;
        $new_osan = $osan + $total_saldo_tama_estudante;


        $totalsaldoestudante = $this->db->table('total_saldo_estudante')->getWhere(['id_total_saldo_estudante'=> $id_total_tama_donator])->getRow();

        $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=>$id_total_saldo_portfolio])
        ->getRow();

        $saldoprivado = [
            'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante - $totalsaldo->total_saldo_tama_estudante,
            ];

            $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$id_total_tama_donator])->update($saldoprivado);

        $saldoportfolio = [
            'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $totalsaldo->total_saldo_tama_estudante,
            ];
            $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id_total_saldo_portfolio])->update($saldoportfolio);


        $data = [
            'id_saldo_tama_estudante ' =>$id_saldo_tama_estudante ,
            'total_saldo_tama_estudante' =>$new_osan,
            'data_saldo_tama_estudante' =>$data_saldo_tama_estudante,
            'id_total_tama_donator' =>$id_total_tama_donator,
            'id_total_tama_estudante' =>$id_total_tama_estudante,
            'id_total_saldo_portfolio' =>$id_total_saldo_portfolio,
            'aktivo_total_saldo_estudantes' =>null,
        ];
        $saldoprivado = [
        'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante + $data['total_saldo_tama_estudante'],
        ];
        $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$data['id_total_tama_donator']])->update($saldoprivado);

        $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_portfolio']])->getRow();
        $saldoportfolio = [
        'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $data['total_saldo_tama_estudante'],
        ];
        $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_portfolio']])->update($saldoportfolio);

        $insert = $this->osan->update($id_saldo_tama_estudante, $data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }
    public function hamosSaldoTamaEstudantePropinasDonator()
    {
        $id                             =$this->request->getPost('id');
        $total_saldo_tama_estudante     =$this->request->getPost('total_saldo_tama_estudante');
        $id_total_tama_donator          =$this->request->getPost('id_total_tama_donator');
        $aktivo_total_saldo_estudantes  =$this->request->getPost('aktivo_total_saldo_estudantes');
        $id_total_saldo_portfolio       =$this->request->getPost('id_total_saldo_portfolio');

        // Saldo Tama Estudante
        $totalsaldoestudante = $this->db->table('total_saldo_estudante')->getWhere(['id_total_saldo_estudante'=> $id_total_tama_donator])->getRow();
        $saldoprivado = [
        'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante - $total_saldo_tama_estudante,
        ];
        $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$id_total_tama_donator])->update($saldoprivado);

        // Saldo Portfolio
        $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $id_total_saldo_portfolio])->getRow();
        $saldoportfolio = [
        'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $total_saldo_tama_estudante,
        ];
        $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id_total_saldo_portfolio])->update($saldoportfolio);

        $data = [
            'id_saldo_tama_estudante'       =>$id,
            'total_saldo_tama_estudante'    =>$total_saldo_tama_estudante,
            'id_total_tama_donator'         =>$id_total_tama_donator,
            'id_total_saldo_portfolio'      =>$id_total_saldo_portfolio,
            'aktivo_total_saldo_estudantes' =>$aktivo_total_saldo_estudantes,
        ];
        $insert = $this->osan->update($id, $data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }
    public function hamosTemporarioSaldoTamaEstudantePropinasDonator()
    {
        $id                             =$this->request->getPost('id');
        $total_saldo_tama_estudante     =$this->request->getPost('total_saldo_tama_estudante');
        $id_total_tama_donator          =$this->request->getPost('id_total_tama_donator');
        $id_total_saldo_portfolio       =$this->request->getPost('id_total_saldo_portfolio');

        // Saldo Tama Estudante
        $totalsaldoestudante = $this->db->table('total_saldo_estudante')->getWhere(['id_total_saldo_estudante'=> $id_total_tama_donator])->getRow();
        $saldoprivado = [
        'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante + $total_saldo_tama_estudante,
        ];
        $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$id_total_tama_donator])->update($saldoprivado);

        // Saldo Portfolio
        $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $id_total_saldo_portfolio])->getRow();
        $saldoportfolio = [
        'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $total_saldo_tama_estudante,
        ];
        $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id_total_saldo_portfolio])->update($saldoportfolio);

        $data = [
            'id_saldo_tama_estudante'       =>$id,
            'total_saldo_tama_estudante'    =>$total_saldo_tama_estudante,
            'id_total_tama_donator'         =>$id_total_tama_donator,
            'id_total_saldo_portfolio'      =>$id_total_saldo_portfolio,
            'aktivo_total_saldo_estudantes' =>null,
        ];
        
        $insert = $this->osan->update($id, $data);
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }

    public function hamosHotuTemporarioSaldoTamaEstudantePropinasDonator()
    {
        $id                             =$this->request->getPost('id');
        $total_saldo_tama_estudante     =$this->request->getPost('total_saldo_tama_estudante');
        $id_total_tama_donator          =$this->request->getPost('id_total_tama_donator');
        $id_total_saldo_portfolio       =$this->request->getPost('id_total_saldo_portfolio');
         $saldo = count($id);
         
         $data = [];
         for ($i=0; $i <$saldo; $i++) { 
            // Saldo Tama Estudante
            $totalsaldoestudante = $this->db->table('total_saldo_estudante')->getWhere(['id_total_saldo_estudante'=> $id_total_tama_donator[$i]])->getRow();
            $saldoprivado = [
            'total_saldo_estudante' => $totalsaldoestudante->total_saldo_estudante + $total_saldo_tama_estudante[$i],
            ];
            $this->db->table('total_saldo_estudante')->where(['id_total_saldo_estudante'=>$id_total_tama_donator[$i]])->update($saldoprivado);
    
            // Saldo Portfolio
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $id_total_saldo_portfolio[$i]])->getRow();
            $saldoportfolio = [
            'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $total_saldo_tama_estudante[$i],
            ];
            $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$id_total_saldo_portfolio[$i]])->update($saldoportfolio);
            $data = [
                'id_saldo_tama_estudante'       =>$id[$i],
                'total_saldo_tama_estudante'    =>$total_saldo_tama_estudante[$i],
                'id_total_tama_donator'         =>$id_total_tama_donator[$i],
                'id_total_saldo_portfolio'      =>$id_total_saldo_portfolio[$i],
                'aktivo_total_saldo_estudantes' =>null,
            ];
            $insert = $this->osan->update($id[$i], $data);
        }
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }

    public function permanenteHotuSaldoTamaEstudantePropinasDonator()
    {
        $id                             =$this->request->getPost('id');
         $saldo = count($id);
         
         for ($i=0; $i <$saldo; $i++) { 
            $this->osan->where('id_saldo_tama_estudante', $id[$i])->delete();
        }
        return redirect()->back()->with('success', ''.lang('saldotamaPortfolio.hamosValidation').'');
    }

    public function permanenteSaldoTamaEstudantePropinasDonator()
    {
        $id =$this->request->getPost('id');
        
        $insert = $this->osan->where('id_saldo_tama_estudante', $id)->delete();
        if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
        return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
        }
    }

}
