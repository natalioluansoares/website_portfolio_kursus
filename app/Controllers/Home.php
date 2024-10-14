<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['portfolio'];
    public function index(): string
    {
        return view('loginadministrator/login');
    }
    public function home()
    {
        return view('funsionario/dashboard');
    }
}
