<?php

namespace App\Controllers;

use App\Models\ModelImprestaOsanProfessores;
use App\Models\ModelsalarioProfessores;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Imprestaosanprofessores extends ResourceController
{
    protected $salario;
    protected $impresta;
    protected $db;
    protected $helpers = ['portfolio'];
    public function __construct()
    {
        $this->salario = new ModelsalarioProfessores();
        $this->impresta = new ModelImprestaOsanProfessores();
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
         $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('aktivo_osan_impresta_professores =', null)->imprestaSalarioProfessoresPagination(5, $keyword);
            
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->impresta->where('aktivo_osan_impresta_professores =', null)->filterImprestaSalarioProfessores($keyword);
            if ($data['imprestasalarioprofessores'] == null) {
                return redirect()->to(base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio')))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('aktivo_osan_impresta_professores =', null)->imprestaSalarioProfessoresPagination(5, $keyword);
            $data ['keyword']= $keyword;
         }
        return view('funsionario/imprestasalarioprofessores/imprestasalarioprofessores', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->resultSalarioProfessores();
        return view('funsionario/imprestasalarioprofessores/aumentaimprestasalarioprofessores', $data);
    }

    public function create()
    {
        $validate = $this->validate([
            'total_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('imprestaSalarioProfessores.totalValidation').'',
                ],
            ],
            'osan_impresta_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.naranValidation').'',
                ],
            ],
            'data_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.dataValidation').'',
                ],
            ],
            'horas_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_osan_impresta            = $this->request->getPost('total_osan_impresta');
            $osan_impresta_professores      = $this->request->getPost('osan_impresta_professores');
            $horas_osan_impresta            = $this->request->getPost('horas_osan_impresta');
            $data_osan_impresta             = $this->request->getPost('data_osan_impresta');
            $data = [
                'total_osan_impresta'           => $total_osan_impresta,
                'data_osan_impresta'            => $data_osan_impresta,
                'horas_osan_impresta'           => $horas_osan_impresta,
                'osan_impresta_professores'     => $osan_impresta_professores,
            ];
            $totalosanimpresta = $this->db->table('salario_professores')->getWhere(['id_salario_professores'=> $data['osan_impresta_professores']])->getRow();

            if ($data['total_osan_impresta'] >$totalosanimpresta->total_salario) {
                return redirect()->back()->withInput()->with('error', ''.lang('imprestaSalarioProfessores.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario - $data['total_osan_impresta'],
                ];
                $this->db->table('salario_professores')->where(['id_salario_professores'=>$data['osan_impresta_professores']])->update($saldoimpresta);
        
                $insert = $this->impresta->insert($data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function edit($id = null)
    {
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_professores =', null)->where('id_osan_impresta_professores', $id)->imprestaSalarioProfessores();
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->resultSalarioProfessores();
        if (!$data['impresta']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('funsionario/imprestasalarioprofessores/trokaimprestasalarioprofessores', $data);
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'total_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  => ''.lang('imprestaSalarioProfessores.totalValidation').'',
                ],
            ],
            'osan_impresta_professores'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.naranValidation').'',
                ],
            ],
            'data_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.dataValidation').'',
                ],
            ],
            'horas_osan_impresta'=> [
            'rules' => 'required',
            'errors' => [
                'required'  =>  ''.lang('imprestaSalarioProfessores.horasValidation').'',
                ],
            ],

        ]);
            if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $total_osan_impresta            = $this->request->getPost('total_osan_impresta');
            $osan_impresta_professores      = $this->request->getPost('osan_impresta_professores');
            $horas_osan_impresta            = $this->request->getPost('horas_osan_impresta');
            $data_osan_impresta             = $this->request->getPost('data_osan_impresta');

            $osanimpresta = $this->db->table('osan_impresta_professores')->getWhere(['id_osan_impresta_professores'=> $id])->getRow();

            $totalosanimpresta = $this->db->table('salario_professores')->getWhere(['id_salario_professores'=> $osan_impresta_professores])->getRow();

            $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario + $osanimpresta->total_osan_impresta,
                ];
                $this->db->table('salario_professores')->where(['id_salario_professores'=>$osan_impresta_professores])->update($saldoimpresta);

            $data = [
                'total_osan_impresta'           => $total_osan_impresta,
                'data_osan_impresta'            => $data_osan_impresta,
                'horas_osan_impresta'           => $horas_osan_impresta,
                'osan_impresta_professores'     => $osan_impresta_professores,
            ];
            $totalosanimpresta = $this->db->table('salario_professores')->getWhere(['id_salario_professores'=> $data['osan_impresta_professores']])->getRow();

            if ($data['total_osan_impresta'] >$totalosanimpresta->total_salario) {
                return redirect()->back()->withInput()->with('error', ''.lang('imprestaSalarioProfessores.bootValidation').'');
            }else {
                $saldoimpresta = [
                'total_salario' => $totalosanimpresta->total_salario - $data['total_osan_impresta'],
                ];
                $this->db->table('salario_professores')->where(['id_salario_professores'=>$data['osan_impresta_professores']])->update($saldoimpresta);
        
                $insert = $this->impresta->update($id, $data);
                if (!$insert) {
                    return redirect()->back()->withInput()->with('error', ''.lang('funsionarioPortfolio.errorValidation').'');
                }else{
                    return redirect()->to(base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio')))->with('success',''.lang('funsionarioPortfolio.successValidation').'');
                }
            }
        }
    }

    public function troka()
    {
        $id = $this->request->getPost('id');
        $aktivo_osan_impresta_professores = $this->request->getPost('aktivo_osan_impresta_professores');
        $osan_impresta_professores = $this->request->getPost('osan_impresta_professores');
        $total_osan_impresta = $this->request->getPost('total_osan_impresta');
        

        $totalosanimpresta = $this->db->table('salario_professores')->getWhere(['id_salario_professores'=> $osan_impresta_professores])->getRow();
        $saldoimpresta = [
        'total_salario' => $totalosanimpresta->total_salario + $total_osan_impresta,
        ];
        $this->db->table('salario_professores')->where(['id_salario_professores'=>$osan_impresta_professores])->update($saldoimpresta);

        
        $data = [
            'id_osan_impresta_professores'      =>$id,
            'osan_impresta_professores'         =>$osan_impresta_professores,
            'total_osan_impresta'               =>$total_osan_impresta,
            'aktivo_osan_impresta_professores'  =>$aktivo_osan_impresta_professores,
        ];


        $insert = $this->db->table('osan_impresta_professores')->where(['id_osan_impresta_professores'=>$id])->update($data);
            if (!$insert) {
                return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
            }else{
                return redirect()->back()->withInput()->with('success',''.lang('classePortfolio.successValidation').'');
            }
    }
}
