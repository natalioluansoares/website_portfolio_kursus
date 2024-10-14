<?php

namespace App\Controllers;

use App\Models\ModelFunsionarioPortfolio;
use App\Models\ModelImprestaOsanFunsionario;
use App\Models\ModelSalarioFunsionario;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Imprestaosanfunsionarioportfolio extends ResourceController
{
    protected $salario;
    protected $impresta;
    protected $funsionario;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->salario = new ModelSalarioFunsionario();
        $this->funsionario = new ModelFunsionarioPortfolio();
        $this->impresta = new ModelImprestaOsanFunsionario();
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
                return redirect()->to(base_url(lang('imprestaSalarioFunsionario.imprestaSalarioFunsionarioPortfolioUrlPortofolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->salario->orderBy('id_salario_funsionario', 'DESC')->where('aktivo_salario_funsionario =', null)->salarioFunsionarioPagination(5, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('administrator/imprestasalariofunsionario/funsionario', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->impresta->orderBy('id_osan_impresta_funsionario', 'DESC')->where('aktivo_osan_impresta_funsionario =', null)->where('osan_impresta_funsionario=', $id)->imprestaSalarioFunsionarioPagination(5, $keyword);
        $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->impresta->where('aktivo_osan_impresta_funsionario =', null)->where('osan_impresta_funsionario=', $id)->filterimprestaSalarioFunsionario($keyword);
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();
            if ($data['imprestasalariofunsionario'] == null) {
                return redirect()->to(base_url(lang('imprestaSalarioFunsionario.showImprestaSalarioFunsionarioPortfolioUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->impresta->orderBy('id_osan_impresta_funsionario', 'DESC')->where('osan_impresta_funsionario=', $id)->where('aktivo_osan_impresta_funsionario =', null)->imprestaSalarioFunsionarioPagination(5, $keyword);
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/imprestasalariofunsionario/imprestasalariofunsionario', $data);
    }
    public function hamos($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->impresta->orderBy('id_osan_impresta_funsionario', 'DESC')->where('aktivo_osan_impresta_funsionario =', 1)->where('osan_impresta_funsionario=', $id)->imprestaSalarioFunsionarioPagination(5, $keyword);
        $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->impresta->where('aktivo_osan_impresta_funsionario =', 1)->where('osan_impresta_funsionario=', $id)->filterimprestaSalarioFunsionario($keyword);
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();
            if ($data['imprestasalariofunsionario'] == null) {
                return redirect()->to(base_url(lang('imprestaSalarioFunsionario.showImprestaSalarioFunsionarioPortfolioUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->impresta->orderBy('id_osan_impresta_funsionario', 'DESC')->where('osan_impresta_funsionario=', $id)->where('aktivo_osan_impresta_funsionario =', 1)->imprestaSalarioFunsionarioPagination(5, $keyword);
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_funsionario=', $id)->where('aktivo_salario_funsionario=', null)->salarioFunsionario();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/imprestasalariofunsionario/hamosimprestasalariofunsionario', $data);
    }

    public function aumenta($id = null)
    {
        $data['salario'] = $this->salario->where('aktivo_salario_funsionario =', null)->where('id_salario_funsionario =', $id)->resultsalarioFunsionario();
        return view('administrator/imprestasalariofunsionario/aumentaimprestasalariofunsionario', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'total_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('imprestaSalarioFunsionario.totalValidation').'',
                ],
            ],
            'osan_impresta_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.naranValidation').'',
                ],
            ],
            'data_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_osan_impresta            = $this->request->getPost('total_osan_impresta');
            $osan_impresta_funsionario      = $this->request->getPost('osan_impresta_funsionario');
            $horas_osan_impresta            = $this->request->getPost('horas_osan_impresta');
            $data_osan_impresta             = $this->request->getPost('data_osan_impresta');
            $data = [
                'total_osan_impresta'           => $total_osan_impresta,
                'data_osan_impresta'            => $data_osan_impresta,
                'horas_osan_impresta'           => $horas_osan_impresta,
                'osan_impresta_funsionario'     => $osan_impresta_funsionario,
            ];
            $totalosanimpresta = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario'=> $data['osan_impresta_funsionario']])->getRow();

            if ($data['total_osan_impresta'] >$totalosanimpresta->total_salario) {
                return redirect()->back()->withInput()->with('error', ''.lang('imprestaSalarioFunsionario.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario - $data['total_osan_impresta'],
                ];
                $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$data['osan_impresta_funsionario']])->update($saldoimpresta);
        
                $insert = $this->impresta->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('imprestaSalarioFunsionario.showImprestaSalarioFunsionarioPortfolioUrlPortfolio').$osan_impresta_funsionario))->with('success',''.lang('imprestaSalarioFunsionario.successValidation').'');
                }
            }
        }
    }

    public function editimpresta($id = null, $impresta)
    {
        $data['impresta'] = $this->impresta->where('aktivo_salario_funsionario =', null)->where('id_osan_impresta_funsionario', $id)->where('osan_impresta_funsionario=', $impresta)->imprestaSalarioFunsionario();
        $data['salario'] = $this->salario->where('aktivo_salario_funsionario =', null)->where('id_salario_funsionario', $impresta)->resultsalarioFunsionario();
        if (!$data['impresta']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/imprestasalariofunsionario/trokaimprestasalariofunsionario', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'total_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('imprestaSalarioFunsionario.totalValidation').'',
                ],
            ],
            'osan_impresta_funsionario'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.naranValidation').'',
                ],
            ],
            'data_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.dataValidation').'',
                ],
            ],
            'horas_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioFunsionario.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_osan_impresta            = $this->request->getPost('total_osan_impresta');
            $osan_impresta_funsionario      = $this->request->getPost('osan_impresta_funsionario');
            $horas_osan_impresta            = $this->request->getPost('horas_osan_impresta');
            $data_osan_impresta             = $this->request->getPost('data_osan_impresta');

            $osanimpresta = $this->db->table('osan_impresta_funsionario')->getWhere(['id_osan_impresta_funsionario'=> $id])->getRow();

            $totalosanimpresta = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario'=> $osan_impresta_funsionario])->getRow();

            $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario + $osanimpresta->total_osan_impresta,
                ];
                $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$osan_impresta_funsionario])->update($saldoimpresta);

            $data = [
                'total_osan_impresta'           => $total_osan_impresta,
                'data_osan_impresta'            => $data_osan_impresta,
                'horas_osan_impresta'           => $horas_osan_impresta,
                'osan_impresta_funsionario'     => $osan_impresta_funsionario,
            ];
            $totalosanimpresta = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario'=> $data['osan_impresta_funsionario']])->getRow();

            if ($data['total_osan_impresta'] >$totalosanimpresta->total_salario) {
                return redirect()->back()->withInput()->with('error', ''.lang('imprestaSalarioFunsionario.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario - $data['total_osan_impresta'],
                ];
                $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$data['osan_impresta_funsionario']])->update($saldoimpresta);
        
                $insert = $this->impresta->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('imprestaSalarioFunsionario.showImprestaSalarioFunsionarioPortfolioUrlPortfolio').$osan_impresta_funsionario))->with('success',''.lang('imprestaSalarioFunsionario.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $id = $this->request->getPost('id');
        $aktivo_osan_impresta_funsionario = $this->request->getPost('aktivo_osan_impresta_funsionario');
        $osan_impresta_funsionario = $this->request->getPost('osan_impresta_funsionario');
        $total_osan_impresta = $this->request->getPost('total_osan_impresta');
        

        $totalosanimpresta = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario'=> $osan_impresta_funsionario])->getRow();
        $saldoimpresta = [
        'total_salario' => $totalosanimpresta->total_salario + $total_osan_impresta,
        ];
        $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$osan_impresta_funsionario])->update($saldoimpresta);

        
        $data = [
            'id_osan_impresta_funsionario'      =>$id,
            'osan_impresta_funsionario'         =>$osan_impresta_funsionario,
            'total_osan_impresta'               =>$total_osan_impresta,
            'aktivo_osan_impresta_funsionario'  =>$aktivo_osan_impresta_funsionario,
        ];


        $insert = $this->db->table('osan_impresta_funsionario')->where(['id_osan_impresta_funsionario'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('imprestaSalarioFunsionario.hamosValidation').'');
        }
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        $osan_impresta_funsionario = $this->request->getPost('osan_impresta_funsionario');
        $total_osan_impresta = $this->request->getPost('total_osan_impresta');
        
        $totalosanimpresta = $this->db->table('salario_funsionario')->getWhere(['id_salario_funsionario'=> $osan_impresta_funsionario])->getRow();
        $saldoimpresta = [
        'total_salario' => $totalosanimpresta->total_salario - $total_osan_impresta,
        ];
        $this->db->table('salario_funsionario')->where(['id_salario_funsionario'=>$osan_impresta_funsionario])->update($saldoimpresta);

        
        $data = [
            'id_osan_impresta_funsionario'      =>$id,
            'osan_impresta_funsionario'         =>$osan_impresta_funsionario,
            'total_osan_impresta'               =>$total_osan_impresta,
            'aktivo_osan_impresta_funsionario'  =>null,
        ];


        $insert = $this->db->table('osan_impresta_funsionario')->where(['id_osan_impresta_funsionario'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('imprestaSalarioFunsionario.hamosValidation').'');
        }
    }

    public function permanente()
    {
         $id = $this->request->getPost('id');
        $this->impresta->where('id_osan_impresta_funsionario', $id)->delete();
        return redirect()->back()->withInput()->with('success', ''.lang('imprestaSalarioFunsionario.hamosValidation').'');
    }
}
