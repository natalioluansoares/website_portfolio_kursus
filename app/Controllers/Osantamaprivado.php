<?php

namespace App\Controllers;

use App\Models\ModelAccountProtfolio;
use App\Models\ModelOsanTamaPrivado;
use App\Models\ModelSaldoDonatorPrivado;
use App\Models\ModelSaldoPortfolio;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\RESTful\ResourceController;

class Osantamaprivado extends ResourceController
{
    protected $tama;
    protected $privado;
    protected $saldo;
    protected $administrator;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->tama = new ModelOsanTamaPrivado();
        $this->saldo = new ModelSaldoPortfolio();
        $this->privado = new ModelSaldoDonatorPrivado();
        $this->administrator = new ModelAccountProtfolio();
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
                return redirect()->to(base_url(lang('saldotamaPortfolio.saldoTamaUrlPortfolio')))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->privado->orderBy('id_saldo_privado', 'DESC')->where('aktivo_saldo_privado =', null)->privadoPagination(10, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldotamadonator/privado', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);
        $data['result'] = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->resultSaldotama();
         $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
         if (!$data['privado']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->tama->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTama(10, $keyword);
            // $data = $this->tama->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTama(10, $keyword);
            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            $data['result'] = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTamas($keyword);
            if ($data['saldotama'] == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);

            $data['result'] = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->resultSaldotama();

            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            if (!$data['privado']) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldotamadonator/saldotama', $data);
    }
    public function hamos($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', 1)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);
         $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
         if (!$data['privado']) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->tama->where('aktivo_saldo_tama =', 1)->where('id_total_privado', $id)->filtersaldoTama($keyword);
            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            if ($data['saldotama'] == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', 1)->where('id_total_privado', $id)->saldoTamaPagination(10, $keyword);
            $data['privado'] = $this->privado->where('id_saldo_privado', $id)->where('aktivo_saldo_privado =',null)->first();
            if (!$data['privado']) {
                return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
            $data ['keyword']= $keyword;
         }
        return view('administrator/saldotamadonator/hamos', $data);
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
        return view('administrator/saldotamadonator/aumentasaldotama', $data);
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
            return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id_total_privado ))->with('success',''.lang('saldotamaPortfolio.successValidation').'');
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
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id_total_privado))->with('success',''.lang('funsionarioPortfolio.hamosValidation').'');
            }
    }

    public function temporario()
    {
            $aktivo_saldo_tama = $this->request->getPost('aktivo_saldo_tama');
            $total_saldo_tama = $this->request->getPost('total_saldo_tama');
            $id_total_portfolio = $this->request->getPost('id_total_portfolio');
            $id_total_privado = $this->request->getPost('id_total_privado');
            $id = $this->request->getPost('id');

            $osanprivado = $this->db->table('saldo_donator_privado')->getWhere(['id_saldo_privado'=> $id_total_privado])->getRow();
            $saldoportfolio = $this->db->table('saldo_portfolio')->getWhere(['id_saldo_portfolio'=> $id_total_portfolio])->getRow();
                
            $totalosanprivado=$osanprivado->total_saldo_privado;
            $suraosanprivado = $totalosanprivado + $total_saldo_tama;
                $this->db->table('saldo_donator_privado')->set('total_saldo_privado', $suraosanprivado)
                ->where('id_saldo_privado', $id_total_privado)
                ->update();
            
            $totalosanportfolio=$saldoportfolio->total_saldo_portfolio;
            $suraosanportfolio = $totalosanportfolio + $total_saldo_tama;
                $this->db->table('saldo_portfolio')->set('total_saldo_portfolio', $suraosanportfolio)
                ->where('id_saldo_portfolio', $id_total_portfolio)
                ->update();

            $data = [
            'id_saldo_tama'         =>$id,
            'aktivo_saldo_tama'     =>$aktivo_saldo_tama,
            'id_total_portfolio'    =>$id_total_portfolio,
            'id_total_privado'      =>$id_total_privado,
            'total_saldo_tama'      =>$total_saldo_tama,
        ];

        $insert = $this->db->table('saldo_tama_donator')->where(['id_saldo_tama'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
        }else{
            return redirect()->to(base_url(lang('saldotamaPortfolio.hamosSaldoTamaUrlPortfolio').$id_total_privado))->with('success',''.lang('classePortfolio.successValidation').'');
        }
    }

    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->tama->where('id_saldo_tama', $id)->delete();
        return redirect()->back()->with('success', ''.lang('saldotamaPortfolio.hamosValidation').'');
    }

    public function exportExcel($id = null)
    {
        $naran = helperSistema()->naran_kompleto;
        $saldotama = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->resultSaldotama();
        if (null !== $this->request->getGet('filter-data')) {
            $saldotama = $this->tama->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTamaExport();
            if ($saldotama == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', ''.lang('saldotamaPortfolio.kodeSaldo').'');
        $activeWorksheet->setCellValue('C1', ''.lang('saldotamaPortfolio.organizasaunSaldo').'');
        $activeWorksheet->setCellValue('D1', ''.lang('saldotamaPortfolio.totalSaldo').'');
        $activeWorksheet->setCellValue('E1', ''.lang('saldotamaPortfolio.dataSaldo').'');
        $activeWorksheet->setCellValue('F1', ''.lang('saldotamaPortfolio.organizasaunSaldo').'');
        $activeWorksheet->setCellValue('G1', ''.lang('saldoPortfolio.Saldo').'');

        $column = 2;
        foreach($saldotama as $portfolio){
            $activeWorksheet->setCellValue('A'.$column, ($column-1));
            $activeWorksheet->setCellValue('B'.$column, $portfolio->kode_saldo_privado);
            $activeWorksheet->setCellValue('C'.$column, $portfolio->naran_organizasaun_privado);
            $activeWorksheet->setCellValue('D'.$column, number_format($portfolio->total_saldo_tama, 2));
            $activeWorksheet->setCellValue('E'.$column, $portfolio->data_saldo_tama);
            $activeWorksheet->setCellValue('F'.$column, $portfolio->id_total_privado);
            $activeWorksheet->setCellValue('G'.$column, $portfolio->id_total_portfolio);
            $column++;
        }

        $activeWorksheet->getStyle('A1:G1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
       $spreadsheet->getActiveSheet()->getStyle('A1:J1')
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')
        ->getFill()->getStartColor()->setARGB('FFFF0000');
        $styleArray = [
            'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:G'.($column-1))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('G')->setAutoSize(true);

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
            $osantama = $spreadsheet->getActiveSheet()->toArray();
            foreach($osantama as $key => $portfolio){
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'kode_saldo_privado' =>$portfolio[1],
                    'total_saldo_tama' =>$portfolio[2],
                    'data_saldo_tama' =>$portfolio[3],
                    'id_total_privado' =>$portfolio[4],
                    'id_total_portfolio' =>$portfolio[5],
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
                'total_saldo_portfolio' => $totalosanportfolio->total_saldo_portfolio + $data['total_saldo_tama'],
                ];
                $this->db->table('saldo_portfolio')->where(['id_saldo_portfolio'=>$data['id_total_portfolio']])->update($saldoportfolio);
                $insert = $this->tama->insert($data);
            }
            if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.errorValidation').'');
            }else{
            return redirect()->back()->withInput()->with('success',''.lang('saldotamaPortfolio.successValidation').'');
            }
        }else {
            return redirect()->back()->withInput()->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
        }
    }
    
    public function exportPdf($id = null)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);

        $naran = helperSistema()->naran_kompleto;
        $saldotama = $this->tama->orderBy('id_saldo_tama', 'DESC')->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->resultSaldotama();
        $administrator = $this->administrator->orderBy('id_administrator', 'DESC')->where('aktivo_administrator =', null)->where('sistema_administrator =', 2)
         ->resultadministrator();
        if (null !== $this->request->getGet('filter-data')) {
            $saldotama = $this->tama->where('aktivo_saldo_tama =', null)->where('id_total_privado', $id)->filtersaldoTamaExport();
            if ($saldotama == null) {
                return redirect()->to(base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$id))->with('error', ''.lang('saldotamaPortfolio.bukaValidation').'');
            }
         }
        $data = [
            'title' => 'Project ANCT-TL',
            'saldotama' =>$saldotama,
            'administrator' =>$administrator,
        ];
        $view = view('administrator/saldotamadonator/pdfSaldotama', $data);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation (potrait, landscape)
        $dompdf->setPaper('portrait','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(($naran), array("Attachment" =>false));
    }

    
}
