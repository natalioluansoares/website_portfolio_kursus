<?php

namespace App\Controllers;

use App\Models\ModelImprestaOsanProfessores;
use App\Models\ModelsalarioProfessores;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Imprestaosanprofessoresportfolio extends ResourceController
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
        return view('administrator/imprestasalarioprofessores/salarioprofessores', $data);
    }

    public function show($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('aktivo_osan_impresta_professores =', null)->where('osan_impresta_professores=', $id)->imprestaSalarioProfessoresPagination(5, $keyword);
        $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->impresta->where('aktivo_osan_impresta_professores =', null)->where('osan_impresta_professores=', $id)->filterImprestaSalarioProfessores($keyword);
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();
            if ($data['imprestaSalarioProfessores'] == null) {
                return redirect()->to(base_url(lang('imprestaSalarioProfessores.showimprestaSalarioProfessoresPortfolioUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('osan_impresta_professores=', $id)->where('aktivo_osan_impresta_professores =', null)->imprestaSalarioProfessoresPagination(5, $keyword);
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/imprestasalarioprofessores/imprestasalarioprofessores', $data);
    }

    public function hamos($id = null)
    {
        $keyword = $this->request->getGet('keyword');
        // print_r($keyword);
        $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('aktivo_osan_impresta_professores =', 1)->where('osan_impresta_professores=', $id)->imprestaSalarioProfessoresPagination(5, $keyword);
        $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

         if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data ['keyword']= $keyword;

         if (null !== $this->request->getGet('filter-data')) {
            $data = $this->impresta->where('aktivo_osan_impresta_professores =', 1)->where('osan_impresta_professores=', $id)->filterImprestaSalarioProfessores($keyword);
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();
            if ($data['imprestaSalarioProfessores'] == null) {
                return redirect()->to(base_url(lang('imprestaSalarioProfessores.showimprestaSalarioProfessoresPortfolioUrlPortfolio').$id))->with('error', ''.lang('esperiensiaPortfolio.bukaValidation').'');
            }
         }else{
            $keyword = $this->request->getGet('keyword');
            // print_r($keyword);
            $data = $this->impresta->orderBy('id_osan_impresta_professores', 'DESC')->where('osan_impresta_professores=', $id)->where('aktivo_osan_impresta_professores =', 1)->imprestaSalarioProfessoresPagination(5, $keyword);
            $data ['keyword']= $keyword;
            $data['salario'] = $this->salario->where('id_salario_professores=', $id)->where('aktivo_salario_professores=', null)->salarioProfessores();

            if (!$data['salario']) {
                return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
            }

         }
        return view('administrator/imprestasalarioprofessores/hamosimprestasalarioprofessores', $data);
    }

    public function aumenta($id = null)
    {
        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores =', $id)->resultSalarioProfessores();
        if (!$data['salario']) {
            return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
         }
         $data['row'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores =', $id)->salarioProfessores();
         if (!$data['row']) {
             return redirect()->back()->withInput()->with('error', ''.lang('materiaPortfolio.bukaValidation').'');
          }
        return view('administrator/imprestasalarioprofessores/aumentaimprestasalarioprofessores', $data);
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
                    return redirect()->to(base_url(lang('imprestaSalarioProfessores.showImprestaSalarioProfessoresPortfolioUrlPortfolio').$osan_impresta_professores))->with('success',''.lang('imprestaSalarioProfessores.successValidation').'');
                }
            }
        }
    }

    public function editimpresta($id = null, $impresta)
    {
        $data['impresta'] = $this->impresta->where('aktivo_osan_impresta_professores =', null)->where('id_osan_impresta_professores', $id)->where('osan_impresta_professores=', $impresta)->imprestaSalarioProfessores();

        $data['salario'] = $this->salario->where('aktivo_salario_professores =', null)->where('id_salario_professores', $impresta)->resultSalarioProfessores();
        if (!$data['impresta']) {
            return redirect()->back()->withInput()->with('error', ''.lang('projeitoBackendPortfolio.bukaValidation').'');
        }
        return view('administrator/imprestasalarioprofessores/trokaimprestasalarioprofessores', $data);
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
                    return redirect()->to(base_url(lang('imprestaSalarioProfessores.showImprestaSalarioProfessoresPortfolioUrlPortfolio').$osan_impresta_professores))->with('success',''.lang('imprestaSalarioProfessores.successValidation').'');
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
            return redirect()->back()->withInput()->with('success',''.lang('imprestaSalarioProfessores.hamosValidation').'');
        }
    }
    public function temporario()
    {
        $id = $this->request->getPost('id');
        $osan_impresta_professores = $this->request->getPost('osan_impresta_professores');
        $total_osan_impresta = $this->request->getPost('total_osan_impresta');
        
        $totalosanimpresta = $this->db->table('salario_professores')->getWhere(['id_salario_professores'=> $osan_impresta_professores])->getRow();
        $saldoimpresta = [
        'total_salario' => $totalosanimpresta->total_salario - $total_osan_impresta,
        ];
        $this->db->table('salario_professores')->where(['id_salario_professores'=>$osan_impresta_professores])->update($saldoimpresta);

        
        $data = [
            'id_osan_impresta_professores'      =>$id,
            'osan_impresta_professores'         =>$osan_impresta_professores,
            'total_osan_impresta'               =>$total_osan_impresta,
            'aktivo_osan_impresta_professores'  =>null,
        ];

        $insert = $this->db->table('osan_impresta_professores')->where(['id_osan_impresta_professores'=>$id])->update($data);
        if (!$insert) {
            return redirect()->back()->withInput()->with('error', ''.lang('classePortfolio.errorValidation').'');
        }else{
            return redirect()->back()->withInput()->with('success',''.lang('imprestaSalarioProfessores.hamosValidation').'');
        }
    }

    public function permanente()
    {
        $id = $this->request->getPost('id');
        $this->impresta->where('id_osan_impresta_professores', $id)->delete();
        return redirect()->back()->withInput()->with('success', ''.lang('imprestaSalarioProfessores.hamosValidation').'');
    }
}
