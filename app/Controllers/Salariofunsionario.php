<?php

namespace App\Controllers;

use App\Models\ModelFunsionarioPortfolio;
use App\Models\ModelImprestaOsanFunsionario;
use App\Models\ModelSalarioFunsionario;
use App\Models\ModelOsanSai;
use App\Models\ModelSimuSalarioFunsionario;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Salariofunsionario extends ResourceController
{
    protected $salario;
    protected $funsionario;
    protected $impresta;
    protected $simufunsionario;
    protected $osansai;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->salario = new ModelSalarioFunsionario();
        $this->simufunsionario = new ModelSimuSalarioFunsionario();
        $this->funsionario = new ModelFunsionarioPortfolio();
        $this->impresta = new ModelImprestaOsanFunsionario();
        $this->osansai = new ModelOsanSai();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->salario->orderBy('id_salario_funsionario', 'DESC')->where('aktivo_salario_funsionario =', null)->salarioFunsionarioPagination(5, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->salario->where('aktivo_salario_funsionario =', null)->filtersalarioFunsionario($keyword);
            if ($data['salariofunsionario'] == null) {
                return redirect()->to(base_url(lang('salarioFunsionario.salarioFunsionarioUrlPortofolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->salario->orderBy('id_salario_funsionario', 'DESC')->where('aktivo_salario_funsionario =', null)->salarioFunsionarioPagination(5, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/salariofunsionario/salariofunsionario', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        $data['funsionario'] = $this->funsionario->where('aktivo_funsionario =', null)->resultfunsionario();
        return view('funsionario/salariofunsionario/aumentasalariofunsionario', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'total_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioFunsionario.totalValidation').'',
                ],
            ],
            'salario_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.naranValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_salario          = $this->request->getPost('total_salario');
            $salario_funsionario    = $this->request->getPost('salario_funsionario');
            if ($this->salario->cek_naran($salario_funsionario)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('salarioFunsionario.ihaNaranValidation').'');
            }else {
                $data = [
                    'total_salario'  => $total_salario,
                    'salario_funsionario'       => $salario_funsionario,
                ];
        
                    $insert = $this->salario->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('salarioFunsionario.salarioFunsionarioUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['salario'] = $this->salario->where('aktivo_salario_funsionario =', null)->where('id_salario_funsionario ', $id)->salarioFunsionario();
        $data['funsionario'] = $this->funsionario->where('aktivo_funsionario =', null)->resultfunsionario();
        if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('funsionario/salariofunsionario/trokasalariofunsionario', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'total_salario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('salarioFunsionario.totalValidation').'',
                ],
            ],
            'salario_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.naranValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_salario          = $this->request->getPost('total_salario');
            $salario_funsionario    = $this->request->getPost('salario_funsionario');
            if ($this->salario->cek_naran($salario_funsionario, $id)->resultID->num_rows > 0) {
                return redirect()->back()->with('error', ''.lang('salarioFunsionario.ihaNaranValidation').'');
            }else {
                $data = [
                    'total_salario'  => $total_salario,
                    'salario_funsionario'       => $salario_funsionario,
                ];
        
                    $insert = $this->salario->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('salarioFunsionario.salarioFunsionarioUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $aktivo_salario_funsionario = $this->request->getPost('aktivo_salario_funsionario');
        $id = $this->request->getPost('id');
        $data = [
            'id_salario_funsionario'        =>$id,
            'aktivo_salario_funsionario'    =>$aktivo_salario_funsionario,
        ];
        $insert = $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }

    // Simu Salario Funsionario
    public function salario($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('aktivo_salario_simu_funsionario =', '0')->where('salario_simu_funsionario=', $id)->simuSalarioFunsionarioPagination(10, $keyword);
        $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();
        $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('aktivo_salario_simu_funsionario =', '0')->where('salario_simu_funsionario=', $id)->resultSimuSalarioFunsionario();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->simufunsionario->where('aktivo_salario_simu_funsionario =', '0')->where('salario_simu_funsionario=', $id)->filtersimuSalarioFunsionario(10, $keyword);
            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('aktivo_salario_simu_funsionario =', '0')->where('salario_simu_funsionario=', $id)->filtersimuSalarioFunsionarios($keyword);
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();
            if ($data['simusalariofunsionario'] == null) {
                return redirect()->to(base_url(lang('salarioFunsionario.simuSalarioFunsionarioUrl').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('salario_simu_funsionario=', $id)->where('aktivo_salario_simu_funsionario =', '0')->simuSalarioFunsionarioPagination(10, $keyword);
            $data['result'] = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('aktivo_salario_simu_funsionario =', '0')->where('salario_simu_funsionario=', $id)->resultSimuSalarioFunsionario();
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('funsionario/simusalariofunsionario/simusalariofunsionario', $data);
    }

    public function newsalario($id = null)
    {
        $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', 2)->findAll();
        $data['salario'] = $this->salario->where('aktivo_salario_funsionario =', null)->where('id_salario_funsionario', $id)->resultsalarioFunsionario();
         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_funsionario =', null)->where('osan_impresta_funsionario', $id)->resultimprestaSalarioFunsionario();
        return view('funsionario/simusalariofunsionario/aumentasimusalariofunsionario', $data);
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
            'salario_simu_funsionario'=> [
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
            'data_salario_simu_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_salario_simu_funsionario'=> [
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
            $salario_simu_funsionario       = $this->request->getPost('salario_simu_funsionario');
            $horas_salario_simu_funsionario = $this->request->getPost('horas_salario_simu_funsionario');
            $data_salario_simu_funsionario  = $this->request->getPost('data_salario_simu_funsionario');
            $data = [
                'total_simu_salario'            => $total_simu_salario,
                'salario_osan_sai'              => $salario_osan_sai,
                'data_salario_simu_funsionario' => $data_salario_simu_funsionario,
                'salario_simu_funsionario'      => $salario_simu_funsionario,
                'total_simu_salario_impresta'   => $total_simu_salario_impresta,
                'horas_salario_simu_funsionario'=> $horas_salario_simu_funsionario,
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
                    return redirect()->to(base_url(lang('salarioFunsionario.simuSalarioFunsionarioUrl').$salario_simu_funsionario))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }
    public function editsalario($id = null, $simu = null)
    {
        $data['osansai'] = $this->osansai->where('aktivo_osan_sai =', null)->where('id_osan_sai =', 2)->findAll();
        $data['salario'] = $this->salario->where('aktivo_salario_funsionario =', null)->where('id_salario_funsionario', $simu)->resultsalarioFunsionario();
        $data['simusalario'] = $this->simufunsionario->orderBy('id_salario_simu_funsionario', 'DESC')->where('aktivo_salario_simu_funsionario =', '0')->where('id_salario_simu_funsionario', $id)->where('salario_simu_funsionario', $simu)->simuSalarioFunsionario();
         if (!$data['simusalario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_funsionario =', null)->where('osan_impresta_funsionario', $id)->resultimprestaSalarioFunsionario();
        return view('funsionario/simusalariofunsionario/trokasimusalariofunsionario', $data);
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
            'salario_simu_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.naranValidation').'',
                ],
            ],
            'data_salario_simu_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('salarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_salario_simu_funsionario'=> [
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
            $salario_simu_funsionario       = $this->request->getPost('salario_simu_funsionario');
            $total_simu_salario  = $this->request->getPost('total_simu_salario');
            $horas_salario_simu_funsionario = $this->request->getPost('horas_salario_simu_funsionario');
            $data_salario_simu_funsionario  = $this->request->getPost('data_salario_simu_funsionario');
            if ($total_simu_salario == 0) {
                $totalsimusalario = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario '=> $salario_simu_funsionario])->getRow();
                $totalsaldoosansai = $this->db->table('osan_sai')->getWhere(['id_osan_sai'=> $salario_osan_sai])->getRow();
                $saldoimpresta = [
                'total_osan_sai' => $totalsaldoosansai->total_osan_sai + $totalsimusalario->total_salario,
                ];
                $this->db->table('osan_sai')->where(['id_osan_sai'=>$salario_osan_sai])->update($saldoimpresta);
            }
            $data = [
                'id_salario_simu_funsionario'   => $id,
                'salario_osan_sai'              => $salario_osan_sai,
                'salario_simu_funsionario'      => $salario_simu_funsionario,
                'data_salario_simu_funsionario' => $data_salario_simu_funsionario,
                'total_simu_salario'            => $total_simu_salario,
                'horas_salario_simu_funsionario'=> $horas_salario_simu_funsionario,
            ];
            $insert = $this->simufunsionario->update($id, $data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
            }else{
                return redirect()->to(base_url(lang('salarioFunsionario.simuSalarioFunsionarioUrl').$salario_simu_funsionario))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
            }
        }
    }

    public function trokasalario()
    {
        $id = $this->request->getPost('id');
        $aktivo_salario_simu_funsionario = $this->request->getPost('aktivo_salario_simu_funsionario');

        $data =[
            'id_salario_simu_funsionario '  =>$id,
            'aktivo_salario_simu_funsionario'  =>$aktivo_salario_simu_funsionario,
        ];
        $hamos  = $this->simufunsionario->update($id, $data);

        if (!$hamos) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('salarioFunsionario.hamosValidation').'');
            }
    }
}
