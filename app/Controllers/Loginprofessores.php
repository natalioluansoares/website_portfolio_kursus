<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Loginprofessores extends BaseController
{
    public function index(): string
    {
        return view('loginprofessores/login');
    }
    public function processologout()
    {
        return view('logoutprofessores/logout');
    }
    public function processoprofessores()
    {

        $data = $this->request->getPost();
        $query = $this->db->table('administrator')->getWhere(['naran_kompleto'=> $data['naran_kompleto']]);
        $user = $query->getRow();
        if ($user) {
            if ($user->sistema_administrator == 3) {
                if ($user->valido_administrator == 1 && $user->aktivo_administrator == null) {
                    if (password_verify($data['sena'], $user->sena)) {
                        $params = [
                            'id_administrator'  => $user->id_administrator,
                            'sistema_administrator'  => $user->sistema_administrator,
                        ];
                        session()->set($params);
                    }else {
                        return redirect()->back()->with('error','Password Sei Sala');
                    }
                }else {
                    return redirect()->to(base_url('English/loginprofessores/processologout'))->with('error','Akun Seidauk Aktiva..! Ajuda Kontakto Admin');
                }
            }else {
                return redirect()->back()->with('error','Ne Laos Ita Nia Akun..!');
            }
        }else {
            return redirect()->back()->with('error','Ita Nia Naran La los..! Ajuda Hatama Naran Seluk');
        }
    }
    public function logout()
    {
        session()->destroy('id_administrator');
        return redirect()->to(base_url(lang('English/loginprofessores')));

    }
}
