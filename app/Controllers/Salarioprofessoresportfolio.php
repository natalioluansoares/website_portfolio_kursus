<?php

namespace App\Controllers;

use App\Models\ModelFunsionario;
use App\Models\ModelImprestaOsanProfessores;
use App\Models\ModelOsanSai;
use App\Models\ModelsalarioProfessores;
use App\Models\ModelSimuSalarioFunsionario;
use App\Models\ModelSimuSalarioProfessores;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Salarioprofessoresportfolio extends ResourceController
{
    protected $osansai;
    protected $impresta;
    protected $salario;
    protected $professores;
    protected $simufunsionario;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->salario = new ModelsalarioProfessores();
        $this->simufunsionario = new ModelSimuSalarioProfessores();
        $this->professores = new ModelFunsionario();
        $this->impresta = new ModelImprestaOsanProfessores();
        $this->osansai = new ModelOsanSai();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->salario->orderBy('id_salario_professores', 'DESC')->where('aktivo_salario_professores =', null)->where('sistema =', 'Professores')->salarioProfessoresPagination(5, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->salario->where('aktivo_salario_professores =', null)->where('sistema =', 'Professores')->filtersalarioProfessores($keyword);
            if ($data['salarioprofessores'] == null) {
                return redirect()->to(base_url(lang('salarioProfessores.salarioProfessoresUrlPortofolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->salario->orderBy('id_salario_professores', 'DESC')->where('aktivo_salario_professores =', null)->where('sistema =', 'Professores')->salarioProfessoresPagination(5, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/salarioprofessores/salarioprofessores', $data);
    }
    public function hamos()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->salario->orderBy('id_salario_professores', 'DESC')->where('aktivo_salario_professores =', 1)->where('sistema =', 'Professores')->salarioProfessoresPagination(5, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->salario->where('aktivo_salario_professores =', 1)->where('sistema =', 'Professores')->filtersalarioProfessores($keyword);
            if ($data['salarioprofessores'] == null) {
                return redirect()->to(base_url(lang('salarioProfessores.salarioProfessoresUrlPortofolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->salario->orderBy('id_salario_professores', 'DESC')->where('aktivo_salario_professores =', 1)->where('sistema =', 'Professores')->salarioProfessoresPagination(5, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/salarioprofessores/hamossalarioprofessores', $data);
    }

    
    public function show($id = null)
    {
        //
    }

    public function new()
    {
        $data['professores'] = $this->professores->where('aktivo_professores =', null)->where('sistema =', 'Professores')->resultprofessores();
        return view('administrator/salarioprofessores/aumentasalarioprofessores', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'total_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioProfessores.totalValidation').'',
                ],
            ],
            'salario_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioProfessores.naranValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_salario          = $this->request->getPost('total_salario');
            $salario_professores    = $this->request->getPost('salario_professores');
            if ($this->salario->cek_naran($salario_professores)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('salarioProfessores.ihaNaranValidation').'');
            }else {
                $data = [
                    'total_salario'  => $total_salario,
                    'salario_professores'       => $salario_professores,
                ];
        
                    $insert = $this->salario->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('salarioProfessores.salarioFunsionarioProfessoresUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores ', $id)->salarioProfessores();
        $data['professores'] = $this->professores->where('aktivo_professores =', null)->resultprofessores();
        if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/salarioprofessores/trokasalarioprofessores', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'total_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioProfessores.totalValidation').'',
                ],
            ],
            'salario_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioProfessores.naranValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_salario          = $this->request->getPost('total_salario');
            $salario_professores    = $this->request->getPost('salario_professores');
            if ($this->salario->cek_naran($salario_professores, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('salarioProfessores.ihaNaranValidation').'');
            }else {
                $data = [
                    'total_salario'  => $total_salario,
                    'salario_professores'       => $salario_professores,
                ];
        
                    $insert = $this->salario->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('salarioProfessores.salarioFunsionarioProfessoresUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $aktivo_salario_professores = $this->request->getPost('aktivo_salario_professores');
        $id = $this->request->getPost('id');
        $data = [
            'id_salario_professores'        =>$id,
            'aktivo_salario_professores'    =>$aktivo_salario_professores,
        ];
        $insert = $this->db->table('salario_professores')->where(['id_salario_professores'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }

    public function temporario()
    {
        $id = $this->request->getPost('id');
        if ($id !=null) {
            $this->db->table('salario_professores')
            ->set('aktivo_salario_professores',null,true)
            ->where('id_salario_professores',$id)
            ->update();
        }else {

        $this->db->table('salario_professores')
            ->set('aktivo_salario_professores',null,true)
            ->where('aktivo_salario_professores is NOT NULL', NULL, FALSE)
            ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }
    }

    public function permanente()
    {
         $id = $this->request->getPost('id');
        $this->salario->where('id_salario_professores', $id)->delete();
        return redirect()->back()->with('success', ''.lang('classePortfolio.hamosValidation').'');
    }


    // Simu Salario professores
    public function salario($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '0')->where('salario_simu_professores=', $id)->simuSalarioFunsionarioPagination(10, $keyword);
        $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();
        $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '0')->where('salario_simu_professores=', $id)->resultSimuSalarioFunsionario();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->simufunsionario->where('aktivo_salario_simu_professores =', '0')->where('salario_simu_professores=', $id)->filtersimuSalarioFunsionario(10, $keyword);
            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '0')->where('salario_simu_professores=', $id)->filtersimuSalarioFunsionarios($keyword);
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();
            if ($data['simusalarioprofessores'] == null) {
                return redirect()->to(base_url(lang('salarioProfessores.simuSalarioFunsionarioProfessoresUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('salario_simu_professores=', $id)->where('aktivo_salario_simu_professores =', '0')->simuSalarioFunsionarioPagination(10, $keyword);

            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '0')->where('salario_simu_professores=', $id)->resultSimuSalarioFunsionario();
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/simusalarioprofessores/simusalarioprofessores', $data);
    }

    public function newsalario($id = null)
    {
        $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', 1)->findAll();
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores', $id)->resultSalarioProfessores();
        if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_professores =', null)->where('osan_impresta_professores', $id)->resultimprestaSalarioProfessores();
        return view('administrator/simusalarioprofessores/aumentasimusalarioprofessores', $data);
    }

    public function createsalario()
    {
        $validate = $this->validate([
            'total_simu_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioFunsionario.totalValidation').'',
                ],
            ],
            'total_simu_salario_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioFunsionario.imprestaValidation').'',
                ],
            ],
            'salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.naranValidation').'',
                ],
            ],
            'salario_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.salarioValidation').'',
                ],
            ],
            'data_salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_simu_salario             = $this->request->getPost('total_simu_salario');
            $salario_osan_sai             = $this->request->getPost('salario_osan_sai');
            $total_simu_salario_impresta    = $this->request->getPost('total_simu_salario_impresta');
            $salario_simu_professores       = $this->request->getPost('salario_simu_professores');
            $horas_salario_simu_professores = $this->request->getPost('horas_salario_simu_professores');
            $data_salario_simu_professores  = $this->request->getPost('data_salario_simu_professores');
            $data = [
                'total_simu_salario'            => $total_simu_salario,
                'salario_osan_sai'              => $salario_osan_sai,
                'data_salario_simu_professores' => $data_salario_simu_professores,
                'salario_simu_professores'      => $salario_simu_professores,
                'total_simu_salario_impresta'   => $total_simu_salario_impresta,
                'horas_salario_simu_professores'=> $horas_salario_simu_professores,
            ];
            $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $data['salario_osan_sai']])->getRow();


            if ($data['total_simu_salario'] > $totalsaldoosansai->total_osan_sai) {
                return redirect()->back()->withInput()->with('error', ''.lang('imprestaSalarioFunsionario.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_osan_sai' => $totalsaldoosansai->total_osan_sai - $data['total_simu_salario'],
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$data['salario_osan_sai']])->update($saldoimpresta);
        
                $insert = $this->simufunsionario->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('salarioProfessores.simuSalarioFunsionarioProfessoresUrlPortfolio').$salario_simu_professores))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }
    public function editsalario($id = null, $simu = null)
    {
        $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', 1)->findAll();
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores', $simu)->resultsalarioProfessores();
        $data['simusalario'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '0')->where('id_salario_simu_professores', $id)->where('salario_simu_professores', $simu)->simuSalarioFunsionario();
         if (!$data['simusalario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_professores =', null)->where('osan_impresta_professores', $id)->resultimprestaSalarioProfessores();
        return view('administrator/simusalarioprofessores/trokasimusalarioprofessores', $data);
    }

    public function updatesalario($id = null)
    {
        $validate = $this->validate([
             'total_simu_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioFunsionario.systemValidation').'',
                ],
            ],
            'salario_osan_sai'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.salarioValidation').'',
                ],
            ],
            'salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.naranValidation').'',
                ],
            ],
            'data_salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_salario_simu_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $salario_osan_sai             = $this->request->getPost('salario_osan_sai');
            $salario_simu_professores       = $this->request->getPost('salario_simu_professores');
            $total_simu_salario  = $this->request->getPost('total_simu_salario');
            $horas_salario_simu_professores = $this->request->getPost('horas_salario_simu_professores');
            $data_salario_simu_professores  = $this->request->getPost('data_salario_simu_professores');
            if ($total_simu_salario == 0) {
                $totalsimusalario = $this->db->table('salario_professores')->getWhere(['id_salario_professores '=> $salario_simu_professores])->getRow();
                $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $salario_osan_sai])->getRow();
                $saldoimpresta = [
                'total_osan_sai' => $totalsaldoosansai->total_osan_sai + $totalsimusalario->total_salario,
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$salario_osan_sai])->update($saldoimpresta);
            }
            $data = [
                'id_salario_simu_professores'   => $id,
                'salario_osan_sai'              => $salario_osan_sai,
                'salario_simu_professores'      => $salario_simu_professores,
                'data_salario_simu_professores' => $data_salario_simu_professores,
                'total_simu_salario'            => $total_simu_salario,
                'horas_salario_simu_professores'=> $horas_salario_simu_professores,
            ];
            $insert = $this->simufunsionario->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('salarioProfessores.simuSalarioFunsionarioProfessoresUrlPortfolio').$salario_simu_professores))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
            }
        }
    }

    public function trokasalario()
    {
        $id = $this->request->getPost('id');
        $aktivo_salario_simu_professores = $this->request->getPost('aktivo_salario_simu_professores');

        $data =[
            'id_salario_simu_professores '  =>$id,
            'aktivo_salario_simu_professores'  =>$aktivo_salario_simu_professores,
        ];
        $hamos  = $this->simufunsionario->update($id, $data);

        if (!$hamos) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('salarioFunsionario.hamosValidation').'');
            }
    }

    public function hamossalario($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '1')->where('salario_simu_professores=', $id)->simuSalarioFunsionarioPagination(10, $keyword);
        $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();
        $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '1')->where('salario_simu_professores=', $id)->resultSimuSalarioFunsionario();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->simufunsionario->where('aktivo_salario_simu_professores =', '1')->where('salario_simu_professores=', $id)->filtersimuSalarioFunsionario(10, $keyword);
            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '1')->where('salario_simu_professores=', $id)->filtersimuSalarioFunsionarios($keyword);
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioFunsionario();
            if ($data['simusalarioprofessores'] == null) {
                return redirect()->to(base_url(lang('salarioProfessores.simuSalarioFunsionarioProfessoresUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('salario_simu_professores=', $id)->where('aktivo_salario_simu_professores =', '1')->simuSalarioFunsionarioPagination(10, $keyword);
            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '1')->where('salario_simu_professores=', $id)->resultSimuSalarioFunsionario();
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/simusalarioprofessores/hamossimusalarioprofessores', $data);
    }
    public function temporariosalariohotu()
    {
        $id = $this->request->getPost('id');
        $numere = count($id);
        $aktivo_salario_simu_professores = $this->request->getPost('aktivo_salario_simu_professores');
        for ($i=0; $i < $numere; $i++) { 
            # code...
            $data = [
                'id_salario_simu_professores' =>$id[$i],
                'aktivo_salario_simu_professores' =>$aktivo_salario_simu_professores[$i],
            ];
            $update = $this->simufunsionario->update($id, $data);
        }
        if ($update) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }

    }

    public function temporariosalario()
    {
        $id = $this->request->getPost('id');
        $aktivo_salario_simu_professores = $this->request->getPost('aktivo_salario_simu_professores');

        $data = [
            'id_salario_simu_professores' =>$id,
            'aktivo_salario_simu_professores' =>$aktivo_salario_simu_professores,
        ];

        $update = $this->simufunsionario->update($id, $data);

        if ($update) {
            return redirect()->back()->withInput()->with('success','Troka Fila Fali Tiha Ona Dados Temporario Sai Hanesan Dados Permanente');
        }else {
            return redirect()->back()->withInput()->with('error','Troka Dados Temporario Ba Dados Permanente Seidauk Iha');
            # code...
        }

    }

    public function hamoshotupermanente()
    {
        $data = $this->simufunsionario->orderBy('id_salario_simu_professores', 'DESC')->where('aktivo_salario_simu_professores =', '1')->resultSimuSalarioFunsionario();
        foreach($data as $portfolio){
            $this->simufunsionario->where('id_salario_simu_professores', $portfolio->id_salario_simu_professores)->delete();
            
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
        $this->simufunsionario->where('id_salario_simu_professores', $id)->delete();

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', ''.lang('classePortfolio.hamosValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('funsionarioPortfolio.successValidation').'');
        }

    }
}
