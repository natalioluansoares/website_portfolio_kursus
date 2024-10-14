<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAbsensiEstudante;
use App\Models\ModelHorarioEstudante;
use App\Models\ModelValores;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\HTTP\ResponseInterface;

class Valoresestudante extends BaseController
{
    protected $valores;
    protected $estudante;
    protected $absensi;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->estudante = new ModelHorarioEstudante();
        $this->absensi = new ModelAbsensiEstudante();
        $this->valores = new ModelValores();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->estudantePagination(10, $keyword);

         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->estudante->filterhorarioestudante($keyword);
            
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->estudante->orderBy('id_horario_estudante', 'DESC')->estudantePagination(10, $keyword);

            $data ['keyword']= $keyword;
         }
        return view('estudante/valoresestudante/index',$data);
    }
    
    public function detailvaloresestudante($hahu=null, $remata=null, $horario=null, $materia=null, $level=null)
    {
        $data['valoresestudante'] = $this->valores->orderBy('id_valores', 'ASC')->where('valores_professores', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('exame !=', 'TPC')->rowhorarioestudante();
        

        $data['valores'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->rowhorarioestudante();

        if (!$data['valores']) {
            return redirect()->back()->withInput()->with('error', '');
         }
        
        $tama= $this->absensi->orderBy('id_absensi_estudante', 'ASC')->where('absensi_estudantes', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('absensi =', 'Tama')->sumabsensiestudante();
        $data['sumtama'] = $tama->numeroabsensi;


        $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', '');
        }
        $latama= $this->absensi->orderBy('id_absensi_estudante', 'ASC')->where('absensi_estudantes', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('absensi =', 'La Tama')->sumabsensiestudante();
        $data['sumlatama'] = $latama->numeroabsensi;

        $lisensa= $this->absensi->orderBy('id_absensi_estudante', 'ASC')->where('absensi_estudantes', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('absensi =', 'Lisensa')->sumabsensiestudante();
        $data['sumlisensa'] = $lisensa->numeroabsensi;



        return view('estudante/valoresestudante/detailvaloresestudante',$data);
        
    }

    public function detailabsensi($hahu=null, $remata=null, $horario=null, $materia=null, $level=null, $absensi=null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
       
        $data = $this->absensi->orderBy('id_absensi_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('absensi', $absensi)->absensiPagination(20, $keyword);

        $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

        if (!$data['estudante']) {
        return redirect()->back()->withInput()->with('error', '');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->absensi->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_horario_estudante', $materia)->where('level_horario_estudante', $level)->where('absensi', $absensi)->filterabsensi($keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();

            
            if ($data['absensiestudante'] == null) {
                return redirect()->to(base_url(lang('valoresEstudanteFunsionario.detailAbsensiEstudanteUrlPortofolio').$hahu.'/'.$remata.'/'.$horario.'/'.$materia.'/'.$level.'/'.$absensi))->with('error', '');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->absensi->orderBy('id_absensi_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->where('absensi', $absensi)->absensiPagination(20, $keyword);

            $data['estudante'] = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $horario)->where('data_horario_hahu', $hahu)->where('data_horario_remata', $remata)->where('materia_kursus', $materia)->where('level_materia_kursus', $level)->horarioestudante();


            if (!$data['estudante']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('estudante/valoresestudante/detailabsensiestudante', $data);
    }
    public function pdfvaloresestudante($id = null)
    {
        
        $dompdf = new Dompdf();
        $dompdf->getOptions()->getChroot();
        
        
        $valores = $this->estudante->orderBy('id_horario_estudante', 'DESC')->where('id_horario_estudante', $id)->rowhorarioestudante();
        $valoresestudante = $this->valores->orderBy('id_valores', 'DESC')->where('valores_professores', $id)->rowhorarioestudante();
        // $diretor = $this->diretor->akundiretor();
        $data = [
            'title' => 'Project ANCT-TL',
            'valores' =>$valores,
            'valoresestudante' =>$valoresestudante,
        ];
        $view = view('estudante/printvaloresestudante/pdfvaloresestudante', $data);
        
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation (potrait, landscape)
        $dompdf->setPaper('portrait','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream((helperEstudante()->naran_kompletos), array("Attachment" =>false));
    }
}