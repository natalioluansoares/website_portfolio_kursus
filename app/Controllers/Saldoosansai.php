<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelOsanSai;
use App\Models\ModelSaldoOsanSai;
use App\Models\ModelSaldoPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Saldoosansai extends ResourceController
{
    protected $db;
    protected $saldo;
    protected $osansai;
    protected $saldoosansai;
    protected $administrator;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->saldoosansai = new ModelSaldoOsanSai();
        $this->saldo = new ModelSaldoPortfolio();
        $this->osansai = new ModelOsanSai();
        $this->administrator = new ModelAccountProtfolio();
        $this->db = \Config\Database::connect();
    }


    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->saldoOsanSaiPagination(10, $keyword);

         $data['result'] = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->resultsaldoOsanSai();
         $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
        if ($data['osansai'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->saldoosansai->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->filtersaldoOsanSai(10, $keyword);
            $data['result'] = $this->saldoosansai->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->filtersaldoOsanSais(10, $keyword);
            $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
            if ($data['saldoosansai'] == null) {
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->saldoOsanSaiPagination(10, $keyword);
            $data['result'] = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->resultsaldoOsanSai();
            $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
            if ($data['osansai'] == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoosansai/saldoosansai', $data);
    }

    public function aumentasaldoosansai($id = null)
    {
        $data ['osansai'] = $this->osansai->where('id_osan_sai', $id)->findAll();
        $data ['row'] = $this->osansai->where('id_osan_sai', $id)->first();
        if (!$data ['row']) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
        $data ['totalsaldo'] = $this->saldo->findAll();
        return view('administrator/saldoosansai/aumentasaldoosansai', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'id_total_saldo_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.naranOsanSaiValidation').'',
                ],
            ],
            'id_total_saldo_sai_portfolio'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.naranValidation').'',
                ],
            ],
            'data_saldo_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.dataOsanSaiValidation').'',
                ],
            ],
            'horas_saldo_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.timeOsanSaiValidation').'',
                ],
            ],
            'total_saldo_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('osanSaiPortfolio.montanteValidation').'',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors(),);
        }else{

            $id_total_saldo_sai           = $this->request->getPost('id_total_saldo_sai');
            $id_total_saldo_sai_portfolio         = $this->request->getPost('id_total_saldo_sai_portfolio');
            $horas_saldo_sai            = $this->request->getPost('horas_saldo_sai');
            $data_saldo_sai            = $this->request->getPost('data_saldo_sai');
            $total_saldo_sai           = $this->request->getPost('total_saldo_sai');
            $data = [
                'id_total_saldo_sai'      =>$id_total_saldo_sai,
                'id_total_saldo_sai_portfolio'    =>$id_total_saldo_sai_portfolio,
                'horas_saldo_sai'       =>$horas_saldo_sai,
                'data_saldo_sai'       =>$data_saldo_sai,
                'total_saldo_sai'      =>$total_saldo_sai,
                'aktivo_saldo_sai'     =>0,
            ];
            

            // Saldo Total
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_sai_portfolio']])->getRow();

            if ($totalosanportfolio->total_saldo_portfolio > $data['total_saldo_sai']) {
                $saldoportfolio = [
                'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $data['total_saldo_sai'],
                ];
                $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_sai_portfolio']])->update($saldoportfolio);

                // Saldo Donator
                $totalosanprivado = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['id_total_saldo_sai']])->getRow();

                $saldoprivado = [
                'total_osan_sai' => $totalosanprivado->total_osan_sai + $data['total_saldo_sai'],
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['id_total_saldo_sai']])->update($saldoprivado);
                // Insert Data Tama Donator
                $insert = $this->saldoosansai->insert($data);
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.errorValidation').'');
                }else{
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id_total_saldo_sai))->with('success',''.lang('osanSaiPortfolio.successValidation').'');
                }
            }else {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.totalSaldoSais').'');
            }

        }
    }

    public function exportExcel($id = null)
    {
        $naran = helperSistema()->naran_kompleto;
        $saldoosansai= $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->resultsaldoOsanSai();
        if (null !== $this->request->getGet('filter-data')) {
            $saldoosansai = $this->saldoosansai->where('aktivo_saldo_sai =', '0')->where('id_total_saldo_sai', $id)->filtersaldoOsanSaiExport();
            if ($saldoosansai == null) {
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', ''.lang('osanSaiPortfolio.kodeOsanSai').'');
        $activeWorksheet->setCellValue('C1', ''.lang('osanSaiPortfolio.naranOsanSai').'');
        $activeWorksheet->setCellValue('D1', ''.lang('osanSaiPortfolio.naranSaldoOsan').'');
        $activeWorksheet->setCellValue('E1', ''.lang('osanSaiPortfolio.montanteOsanSai').'');
        $activeWorksheet->setCellValue('F1', ''.lang('osanSaiPortfolio.dataOsanSai').'');
        $activeWorksheet->setCellValue('G1', ''.lang('osanSaiPortfolio.timeOsanSai').'');
        $activeWorksheet->setCellValue('H1', ''.lang('osanSaiPortfolio.naranSaldoOsan').'');
        $activeWorksheet->setCellValue('I1', ''.lang('osanSaiPortfolio.naranOsanSai').'');

        $column = 2;
        foreach($saldoosansai as $portfolio){
            $activeWorksheet->setCellValue('A'.$column, ($column-1));
            $activeWorksheet->setCellValue('B'.$column, $portfolio->kode_osan_sai);
            $activeWorksheet->setCellValue('C'.$column, $portfolio->naran_osan_sai);
            $activeWorksheet->setCellValue('D'.$column, $portfolio->saldo_portfolio);
            $activeWorksheet->setCellValue('E'.$column, number_format($portfolio->total_saldo_sai, 2));
            $activeWorksheet->setCellValue('F'.$column, $portfolio->data_saldo_sai);
            $activeWorksheet->setCellValue('G'.$column, $portfolio->horas_saldo_sai);
            $activeWorksheet->setCellValue('H'.$column, $portfolio->id_total_saldo_sai_portfolio);
            $activeWorksheet->setCellValue('I'.$column, $portfolio->id_total_saldo_sai );
            $column++;
        }

        $activeWorksheet->getStyle('A1:I1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
       $spreadsheet->getActiveSheet()->getStyle('A1:I1')
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')
        ->getFill()->getStartColor()->setARGB('FFFF0000');
        $styleArray = [
            'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:I'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('G')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('H')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('I')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application\vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$naran.'.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('hello world.xlsx');
        $writer->save('php://output');
        exit();
    }

    public function importExcel()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();   
            }
            $spreadsheet = $reader->load($file);
            $saldoosansai = $spreadsheet->getActiveSheet()->toArray();
            foreach($saldoosansai as $key => $portfolio){
                if ($key == 0) {
                    continue;
                }
            // $saldo = 0;
                $data = [
                    'total_saldo_sai'               =>$portfolio[1],
                    'data_saldo_sai'                =>$portfolio[2],
                    'time_saldo_sai'                =>$portfolio[3],
                    'id_total_saldo_sai_portfolio' =>$portfolio[4],
                    'id_total_saldo_sai'           =>$portfolio[5],
                ];
                // $saldo += $data['total_saldo_sai'];
                // Saldo Donator
                $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_sai_portfolio']])->getRow();

                if ($totalosanportfolio->total_saldo_portfolio > $data['total_saldo_sai']) {
                    $saldoportfolio = [
                    'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $data['total_saldo_sai'],
                    ];
                    $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_sai_portfolio']])->update($saldoportfolio);

                    // Saldo Donator
                    $totalosanprivado = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['id_total_saldo_sai']])->getRow();

                    $saldoprivado = [
                    'total_osan_sai' => $totalosanprivado->total_osan_sai + $data['total_saldo_sai'],
                    ];
                    $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['id_total_saldo_sai']])->update($saldoprivado);
                }else {
                    return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.totalSaldoSais').'');
                }
                $insert = $this->saldoosansai->insert($data);
                }
                if (!$insert) {
                        return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.errorValidation').'');
                }else{
                return redirect()->back()->withInput()->with('success',''.lang('osanSaiPortfolio.successValidation').'');
                }
        }else {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
    }
    public function exportPdf($id = null)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);

        $naran = helperSistema()->naran_kompleto;
        $saldoosansai = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->resultsaldoOsanSai();
        $administrator = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 2)
         ->resultadministrator();
        if (null !== $this->request->getGet('filter-data')) {
            $saldoosansai = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '0')->filtersaldoOsanSaiExport();
            if ($saldoosansai == null) {
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }
        $data = [
            'title' => 'Project ANCT-TL',
            'saldoosansai' =>$saldoosansai,
            'administrator' =>$administrator,
        ];
        $view = view('administrator/saldoosansai/pdfsaldoosansai', $data);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation (potrait, landscape)
        $dompdf->setPaper('portrait','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(($naran), array("Attachment" =>false));
    }
    
    public function troka()
    {
        $aktivo_saldo_sai      = $this->request->getPost('aktivo_saldo_sai');
        $total_saldo_sai       = $this->request->getPost('total_saldo_sai');
        $id_total_saldo_sai_portfolio     = $this->request->getPost('id_total_saldo_sai_portfolio');
        $id_total_saldo_sai       = $this->request->getPost('id_total_saldo_sai');
        $id                     = $this->request->getPost('id');

            $totalosantama = $this->db->table('saldo_osan_sai')->getWhere(['id_saldo_sai'=> $id])->getRow();
            $saldotama = [
            'total_saldo_sai' => $totalosantama->total_saldo_sai + $total_saldo_sai,
            ];
            $this->db->table('saldo_osan_sai')->where(['id_saldo_sai'=> $id])->update($saldotama);
        $data = [
            'id_saldo_sai'         =>$id,
            'aktivo_saldo_sai'     =>$aktivo_saldo_sai,
            'id_total_saldo_sai_portfolio'    =>$id_total_saldo_sai_portfolio,
            'id_total_saldo_sai'      =>$id_total_saldo_sai,
            'total_saldo_sai'      =>$total_saldo_sai,
        ];

        // Saldo Donator
            $totalosanprivado = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['id_total_saldo_sai']])->getRow();
            $saldoprivado = [
            'total_osan_sai' => $totalosanprivado->total_osan_sai - $data['total_saldo_sai'],
            ];
            $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['id_total_saldo_sai']])->update($saldoprivado);

            // Saldo Total
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_sai_portfolio']])->getRow();
            $saldoportfolio = [
            'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $data['total_saldo_sai'],
            ];
            $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_sai_portfolio']])->update($saldoportfolio);

            $insert = $this->db->table('saldo_osan_sai')->where(['id_saldo_sai'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id_total_saldo_sai))->with('success',''.lang('funsionarioPortfolio.hamosValidation').'');
            }
    }

    public function hamos($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->saldoOsanSaiPagination(10, $keyword);

         $data['result'] = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->resultsaldoOsanSai();
         $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
        if ($data['osansai'] == null) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
        }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->saldoosansai->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->filtersaldoOsanSai(10, $keyword);
            $data['result'] = $this->saldoosansai->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->filtersaldoOsanSais(10, $keyword);
            $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
            if ($data['saldoosansai'] == null) {
                return redirect()->to(base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$id))->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->saldoOsanSaiPagination(10, $keyword);
            $data['result'] = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_saldo_sai =', '1')->resultsaldoOsanSai();
            $data['osansai'] = $this->osansai->where('id_osan_sai', $id)->first();
            if ($data['osansai'] == null) {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldoosansai/hamossaldoosansai', $data);
    }

    public function temporario()
    {
            $total_saldo_sai = $this->request->getPost('total_saldo_sai');
            $id_total_saldo_sai_portfolio = $this->request->getPost('id_total_saldo_sai_portfolio');
            $id_total_saldo_sai = $this->request->getPost('id_total_saldo_sai');
            $id = $this->request->getPost('id');
            $aktivo_saldo_sai = $this->request->getPost('aktivo_saldo_sai');

            $osanprivado = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $id_total_saldo_sai])->getRow();
            $saldoportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $id_total_saldo_sai_portfolio])->getRow();
                
            $totalosanprivado=$osanprivado->total_osan_sai;
            $suraosanprivado = $totalosanprivado + $total_saldo_sai;
                $this->db->table('osan_sai')->set('total_osan_sai', $suraosanprivado)
                ->where('id_osan_sai', $id_total_saldo_sai)
                ->update();
            
            $totalosanportfolio=$saldoportfolio->total_saldo_portfolio;
            $suraosanportfolio = $totalosanportfolio - $total_saldo_sai;
                $this->db->table('saldo_portfolio')->set('total_saldo_portfolio', $suraosanportfolio)
                ->where('id_saldo_portfolio', $id_total_saldo_sai_portfolio)
                ->update();

            $data = [
            'id_saldo_sai'         =>$id,
            'aktivo_saldo_sai'     =>$aktivo_saldo_sai,
            'id_total_saldo_sai_portfolio'    =>$id_total_saldo_sai_portfolio,
            'id_total_saldo_sai'      =>$id_total_saldo_sai,
            'total_saldo_sai'      =>$total_saldo_sai,
        ];

        $insert = $this->db->table('saldo_osan_sai')->where(['id_saldo_sai'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.errorValidation').'');
        }else{
            return redirect()->to(base_url(lang('osanSaiPortfolio.hamosSaldoOsanSaiUrlPortfolio').$id_total_saldo_sai))->with('success',''.lang('classePortfolio.successValidation').'');
        }
    }

    public function temporariohotu()
    {
            $total_saldo_sai = $this->request->getPost('total_saldo_sai');
            $id_total_saldo_sai_portfolio = $this->request->getPost('id_total_saldo_sai_portfolio');
            $id_total_saldo_sai = $this->request->getPost('id_total_saldo_sai');
            $aktivo_saldo_sai = $this->request->getPost('aktivo_saldo_sai');
            $id = $this->request->getPost('id');

            $idsaldoosansai = count($id);

            for ($i=0; $i < $idsaldoosansai; $i++) { 
    
                $data = [
                'id_saldo_sai'         =>$id[$i],
                'aktivo_saldo_sai'     => $aktivo_saldo_sai[$i],
                'id_total_saldo_sai_portfolio'    =>$id_total_saldo_sai_portfolio[$i],
                'id_total_saldo_sai'      =>$id_total_saldo_sai[$i],
                'total_saldo_sai'      =>$total_saldo_sai[$i],
            ];
            // Saldo Total
            $totalosanportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $data['id_total_saldo_sai_portfolio']])->getRow();

            if ($totalosanportfolio->total_saldo_portfolio > $data['total_saldo_sai']) {
                $saldoportfolio = [
                'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio - $data['total_saldo_sai'],
                ];
                $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_saldo_sai_portfolio']])->update($saldoportfolio);

                // Saldo Donator
                $totalosanprivado = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['id_total_saldo_sai']])->getRow();

                $saldoprivado = [
                'total_osan_sai' => $totalosanprivado->total_osan_sai + $data['total_saldo_sai'],
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['id_total_saldo_sai']])->update($saldoprivado);
            }else {
                return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.totalSaldoSais').'');
            }
            $insert = $this->db->table('saldo_osan_sai')->where(['id_saldo_sai'=>$id[$i]])->update($data);
        }
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('osanSaiPortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
        }

    }
    
    public function hamoshotupermanente($id = null)
    {
        $data = $this->saldoosansai->orderBy('id_saldo_sai', 'DESC')->where('id_total_saldo_sai ', $id)->where('aktivo_osan_sai =', null)->where('aktivo_saldo_sai =', '1')->resultsaldoOsanSai();
        foreach($data as $hamos){
            $this->saldoosansai->where('id_saldo_sai', $hamos->id_saldo_sai)->delete();
        }
        return redirect()->back()->with('success', ''.lang('saldotamaPortfolio.hamosValidation').'');
    }

    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->saldoosansai->where('id_saldo_sai', $id)->delete();
        return redirect()->back()->with('success', ''.lang('osanSaiPortfolio.hamosValidation').'');
    }
}
