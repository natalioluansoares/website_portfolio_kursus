<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Loginadministrator extends BaseController
{
    public function index(): string
    {
        return view('loginadministrator/login');
    }

    public function processologout()
    {
        return view('logoutportfolio/logout');
    }
    public function processoadministrator(){
        $data = $this->request->getPost();
        $query = $this->db->table('administrator')->getWhere(['naran_kompleto'=> $data['naran_kompleto']]);
        $user = $query->getRow();
        if ($user) {
            if ($user->sistema_administrator == 1) {
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
                    return redirect()->back()->with('error','Akun Seidauk Aktiva..! Ajuda Kontakto Admin');
                }
            }else {
                return redirect()->back()->with('error','Ne Laos Ita Nia Akun..!');
            }
        }else {
            return redirect()->back()->with('error','Hatama Naran Halo Lolos');
        }
    }
    public function logout()
    {
        session()->destroy('id_administrator');
        return redirect()->to(base_url(lang('loginPortfolio.logoutUrlPortfolio')));

    }
}
