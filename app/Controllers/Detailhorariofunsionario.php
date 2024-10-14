<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAccountProtfolio;
use App\Models\ModelFunsionario;
use App\Models\ModelHorarioFunsionario;
use App\Models\ModelMateriaProfessores;
use App\Models\ModelPreparasaunMateria;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\HTTP\ResponseInterface;

class Detailhorariofunsionario extends BaseController
{
    protected $professores;
    protected $preparasaun;
    protected $horario;
    protected $administrator;
    protected $materiaprofessores;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->professores = new ModelFunsionario();
        $this->horario = new ModelHorarioFunsionario();
        $this->preparasaun = new ModelPreparasaunMateria();
        $this->materiaprofessores = new ModelMateriaProfessores(); 
        $this->administrator = new ModelAccountProtfolio();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);

            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->horario->where('horario_aktivo =', null)->filterhorarioprofessores($keyword);
            if ($data['horarioprofessores'] == null) {
                return redirect()->to(base_url(lang('horarioProfessores.detailHotuHorarioProfessoresUrlPortfolio')))->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->horario->orderBy('id_horario', 'DESC')->where('horario_aktivo =', null)->horarioprofessoresPagination(20, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/horarioprofessores/detailhotuhorarioprofessores', $data);
    }
    public function pdfhorarioprofessores()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);

        $horarioprofessores = $this->horario->orderBy('id_horario', 'DESC')->where('horario_aktivo =', null)->resulthorarioprofessores();
        $administrator = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 1)
         ->getadministrator();
        // $diretor = $this->diretor->akundiretor();
        $data = [
            'title' => 'Project ANCT-TL',
            'horarioprofessores' =>$horarioprofessores,
            'administrator' =>$administrator,
        ];
        $view = view('funsionario/printhorarioprofessores/pdfhorarioprofessores', $data);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation (potrait, landscape)
        $dompdf->setPaper('portrait','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream((helperFunsionario()->naran_kompleto), array("Attachment" =>false));
    }
}
