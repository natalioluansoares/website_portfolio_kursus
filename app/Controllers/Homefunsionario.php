<?php

namespace App\Controllers;

class Homefunsionario extends BaseController
{
    protected $helpers = ['portfolio'];
    public function index()
    {
        return view('funsionario/dashboard/dashboard');
    }
}
