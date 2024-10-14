<?php

namespace App\Controllers;
use App\Models\ModelOsanSai;
use App\Models\ModelAccountProtfolio;
use App\Models\ModelSubsidioPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Subsidioportfolio extends ResourceController
{
    protected $osansai;
    protected $subsidio;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct(){
        $this->osansai = new ModelOsanSai();
        $this->subsidio = new ModelSubsidioPortfolio();
        $this->administrator = new ModelAccountProtfolio();
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
                return redirect()->to(base_url(lang('subsidioPortfolio.subsidioUrlPortfolio')))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->osansai->orderBy('id_osan_sai', 'DESC')->where('aktivo_osan_sai =', null)->osanSaiPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/subsidio/osansai', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai', $id)->subsidioPagination(10, $keyword);
         $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();

        if (!$data['osansai']) {
            return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
        }   
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->subsidio->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai', $id)->filtersubsidio(10,$keyword);
            $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();
            if ($data['subsidio'] == null) {
                return redirect()->to(base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$id))->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai', $id)->subsidioPagination(10, $keyword);
            $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();

            if (!$data['osansai']) {
                return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/subsidio/subsidio', $data);
    }

    
    public function newsubsidio($id = null)
    {
        $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->findAll();
        $data['administrator'] = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->resultadministrator();

         if (!$data['osansai']) {
            return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
        }

        return view('administrator/subsidio/aumentasubsidio',$data);
    }

    
    public function create()
    {
        $validate = $this->validate([
            'salario_subsidio_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('subsidioPortfolio.naranValidation').'',
                ],
            ],
            'salario_subsidio_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('subsidioPortfolio.subsidioValidation').'',
                ],
            ],
            'total_subsidio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.naranValidation').'',
                ],
            ],
            'horas_foti_subsidio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.timeValidation').'',
                ],
            ],
            'data_hahu_aktividade'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.dataHahuValidation').'',
                ],
            ],
            'data_remata_aktividade'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.dataRemataValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $salario_subsidio_funsionario             = $this->request->getPost('salario_subsidio_funsionario');
            $horas_foti_subsidio             = $this->request->getPost('horas_foti_subsidio');
            $salario_subsidio_osan_sai    = $this->request->getPost('salario_subsidio_osan_sai');
            $total_subsidio       = $this->request->getPost('total_subsidio');
            $data_remata_aktividade = $this->request->getPost('data_remata_aktividade');
            $data_hahu_aktividade  = $this->request->getPost('data_hahu_aktividade');
            $data = [
                'salario_subsidio_funsionario'            => $salario_subsidio_funsionario,
                'horas_foti_subsidio'              => $horas_foti_subsidio,
                'data_hahu_aktividade' => $data_hahu_aktividade,
                'total_subsidio'      => $total_subsidio,
                'salario_subsidio_osan_sai'   => $salario_subsidio_osan_sai,
                'data_remata_aktividade'=> $data_remata_aktividade,
            ];
            $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['salario_subsidio_osan_sai']])->getRow();


            if ($data['total_subsidio'] > $totalsaldoosansai->total_osan_sai) {
                return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_osan_sai' => $totalsaldoosansai->total_osan_sai - $data['total_subsidio'],
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['salario_subsidio_osan_sai']])->update($saldoimpresta);
        
                $insert = $this->subsidio->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$salario_subsidio_osan_sai))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    
    public function edit($id = null)
    {
        $data['subsidio'] = $this->subsidio->where('id_subsidio =', $id)->rowsubsidio();
        $data['administrator'] = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->resultadministrator();

         if (!$data['subsidio']) {
            return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
        }

        return view('administrator/subsidio/trokasubsidio',$data);
    }

    
    public function update($id = null)
    {
        $validate = $this->validate([
            'salario_subsidio_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('subsidioPortfolio.naranValidation').'',
                ],
            ],
            'salario_subsidio_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('subsidioPortfolio.subsidioValidation').'',
                ],
            ],
            'total_subsidio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.naranValidation').'',
                ],
            ],
            'horas_foti_subsidio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.timeValidation').'',
                ],
            ],
            'data_hahu_aktividade'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.dataHahuValidation').'',
                ],
            ],
            'data_remata_aktividade'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('subsidioPortfolio.dataRemataValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $salario_subsidio_funsionario             = $this->request->getPost('salario_subsidio_funsionario');
            $horas_foti_subsidio             = $this->request->getPost('horas_foti_subsidio');
            $salario_subsidio_osan_sai    = $this->request->getPost('salario_subsidio_osan_sai');
            $total_subsidio       = $this->request->getPost('total_subsidio');
            $data_remata_aktividade = $this->request->getPost('data_remata_aktividade');
            $data_hahu_aktividade  = $this->request->getPost('data_hahu_aktividade');

            $totalsubsidio = $this->db->table('subsidio')->getWhere(['id_subsidio'=>$id])->getRow();
            $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=>$salario_subsidio_osan_sai])->getRow();
            $saldoimpresta = [
            'total_osan_sai' => $totalsaldoosansai->total_osan_sai + $totalsubsidio->total_subsidio,
            ];
            $this->db->table('osan_sai')->where(['id_osan_sai'=>$salario_subsidio_osan_sai])->update($saldoimpresta);
            $data = [
                'salario_subsidio_funsionario'            => $salario_subsidio_funsionario,
                'horas_foti_subsidio'              => $horas_foti_subsidio,
                'data_hahu_aktividade' => $data_hahu_aktividade,
                'total_subsidio'      => $total_subsidio,
                'salario_subsidio_osan_sai'   => $salario_subsidio_osan_sai,
                'data_remata_aktividade'=> $data_remata_aktividade,
            ];
            $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['salario_subsidio_osan_sai']])->getRow();


            if ($data['total_subsidio'] > $totalsaldoosansai->total_osan_sai) {
                return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_osan_sai' => $totalsaldoosansai->total_osan_sai - $data['total_subsidio'],
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['salario_subsidio_osan_sai']])->update($saldoimpresta);
        
                $insert = $this->subsidio->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$salario_subsidio_osan_sai))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function trokasubsidio()
    {
        $id = $this->request->getPost('id');
        $aktivo_subsidio = $this->request->getPost('aktivo_subsidio');

        $data =[
            'id_subsidio '  =>$id,
            'aktivo_subsidio'  =>$aktivo_subsidio,
        ];
        $hamos  = $this->subsidio->update($id, $data);

        if (!$hamos) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('salarioFunsionario.hamosValidation').'');
        }
    }

    public function hamossubsidio($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai', $id)->subsidioPagination(10, $keyword);
         $data['result'] = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai =', $id)->resultsubsidio();
         $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();

        if (!$data['osansai']) {
            return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
        }   
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->subsidio->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai', $id)->filtersubsidio(10,$keyword);
            $data['result'] = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai =', $id)->resultsubsidio();
            $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();
            if ($data['subsidio'] == null) {
                return redirect()->to(base_url(lang('subsidioPortfolio.hamosSubsidioUrlPortfolio').$id))->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai ', $id)->subsidioPagination(10, $keyword);
            $data['result'] = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->where('salario_subsidio_osan_sai =', $id)->resultsubsidio();
            $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', $id)->first();

            if (!$data['osansai']) {
                return redirect()->back()->withInput()->with('error', ''.lang('subsidioPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/subsidio/hamossubsidio', $data);
    }
    public function temporariosubsidiohotu()
    {
        $id = $this->request->getPost('id');
        $numere = count($id);
        $aktivo_subsidio = $this->request->getPost('aktivo_subsidio');
        for ($i=0; $i < $numere; $i++) { 
            # code...
            $data = [
                'id_subsidio'       =>$id[$i],
                'aktivo_subsidio'   =>$aktivo_subsidio[$i],
            ];
            $update = $this->subsidio->update($id, $data);
        }
        if ($update) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }

    }

    public function temporariosubsidio()
    {
        $id = $this->request->getPost('id');
        $aktivo_subsidio = $this->request->getPost('aktivo_subsidio');

        $data = [
            'id_subsidio' =>$id,
            'aktivo_subsidio' =>$aktivo_subsidio,
        ];

        $update = $this->subsidio->update($id, $data);

        if ($update) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }

    }

    public function permanentesubsidiohotu()
    {
        $data = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '0')->resultsubsidio();
        foreach($data as $portfolio){
            $this->subsidio->where('id_subsidio', $portfolio->id_subsidio)->delete();
            
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', ''.lang('classePortfolio.hamosValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('funsionarioPortfolio.successValidation').'');
        }

    }
    public function hamospermanente()
    {
        $id = $this->request->getPost('id');
        $this->subsidio->where('id_subsidio', $id)->delete();

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', ''.lang('classePortfolio.hamosValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('funsionarioPortfolio.successValidation').'');
        }

    }

    public function exportPdf($id = null)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);

        $naran = helperSistema()->naran_kompleto;
        $subsidiofunsionario = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai =', $id)->resultsubsidio();
        $administrator = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('valido_administrator =', 1)->where('sistema_administrator =', 2)
         ->resultadministrator();
        if (null !== $this->request->getGet('filter-data')) {
            $subsidiofunsionario = $data = $this->subsidio->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai', $id)->filtersubsidioPdfExcel();
            if ($subsidiofunsionario == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }
        $data = [
            'title' => 'Project ANCT-TL',
            'subsidio' =>$subsidiofunsionario,
            'administrator' =>$administrator,
        ];
        $view = view('administrator/subsidio/pdfsubsidio', $data);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation (potrait, landscape)
        $dompdf->setPaper('portrait','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(($naran), array("Attachment" =>false));
    }

    public function exportExcel($id = null)
    {
        $naran = helperSistema()->naran_kompleto;
        $subsidiofunsionario = $this->subsidio->orderBy('id_subsidio', 'DESC')->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai =', $id)->resultsubsidio();
        if (null !== $this->request->getGet('filter-data')) {
            $subsidiofunsionario = $data = $this->subsidio->where('aktivo_subsidio =', '1')->where('salario_subsidio_osan_sai', $id)->filtersubsidioPdfExcel();
            if ($subsidiofunsionario == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', ''.lang('subsidioPortfolio.naranSubsidio').'');
        $activeWorksheet->setCellValue('C1', ''.lang('subsidioPortfolio.Subsidio').'');
        $activeWorksheet->setCellValue('D1', ''.lang('subsidioPortfolio.totalSubsidio').'');
        $activeWorksheet->setCellValue('E1', ''.lang('subsidioPortfolio.timeSubsidio').'');
        $activeWorksheet->setCellValue('F1', ''.lang('subsidioPortfolio.dataHahuSubsidio').'');
        $activeWorksheet->setCellValue('G1', ''.lang('subsidioPortfolio.dataRemataSubsidio').'');
        $activeWorksheet->setCellValue('H1', ''.lang('subsidioPortfolio.dataSubsidio').'');

        $column = 2;
        foreach( $subsidiofunsionario as $portfolio){
            $activeWorksheet->setCellValue('A'.$column, ($column-1));
            $activeWorksheet->setCellValue('B'.$column, $portfolio->naran_kompleto);
            $activeWorksheet->setCellValue('C'.$column, $portfolio->naran_osan_sai);
            $activeWorksheet->setCellValue('D'.$column, '$'.number_format($portfolio->total_subsidio,2));
            $activeWorksheet->setCellValue('E'.$column, $portfolio->horas_foti_subsidio);
            $activeWorksheet->setCellValue('F'.$column, $portfolio->data_hahu_aktividade);
            $activeWorksheet->setCellValue('G'.$column, $portfolio->data_remata_aktividade);
            $day = strtotime($portfolio->data_remata_aktividade) - strtotime($portfolio->data_hahu_aktividade);
            $hari = $day / 60 / 60 / 24;
            $activeWorksheet->setCellValue('H'.$column, $hari  .''.lang('subsidioPortfolio.dataSubsidio').'');
            $column++;
        }

        $activeWorksheet->getStyle('A1:H1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
       $spreadsheet->getActiveSheet()->getStyle('A1:H1')
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')
        ->getFill()->getStartColor()->setARGB('FFFF0000');
        $styleArray = [
            'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:H'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('G')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('H')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application\vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$naran.'.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('hello world.xlsx');
        $writer->save('php://output');
        exit();
    }
}
