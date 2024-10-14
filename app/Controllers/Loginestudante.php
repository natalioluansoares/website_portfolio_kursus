<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Loginestudante extends BaseController
{
    public function index(): string
    {
        return view('loginestudante/login');
    }

    public function processologout()
    {
        return view('logoutestudante/logout');
    }
    public function processoestudante()
    {
        $data = $this->request->getPost();
        $query = $this->db->table('estudante')->getWhere(['naran_kompletos'=> $data['naran_kompleto']]);
        $user = $query->getRow();
        if ($user) {
            if ($user->sistema_estudante == 4) {
                if ($user->valido_estudante == 1 && $user->aktivo_estudante == null) {
                    if (password_verify($data['sena'], $user->sena)) {
                        $params = [
                            'id_estudante'          => $user->id_estudante,
                            'sistema_estudante'    => $user->sistema_estudante,
                        ];
                        session()->set($params);
                    }else {
                        return redirect()->back()->with('error','Password Sei Sala');
                    }
                }else {
                   if ($data['sena'] == '') {
                        return redirect()->back()->with('error','Sei Sala');
                    }elseif ($data['sena'] == $user->sena) {
                        # code...
                        return redirect()->to(base_url('English/loginestudante/processologout'))->with('error','Akun Seidauk Aktiva..! Ajuda Kontakto Admin');
                    }else {
                        return redirect()->back()->with('error','Akun Seidauk Aktiva..! Ajuda Kontakto Admin');
                    }
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
        session()->destroy('id_estudante');
        return redirect()->to(base_url(lang('English/loginestudante')));

    }
}
