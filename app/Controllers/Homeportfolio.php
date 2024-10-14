<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Homeportfolio extends ResourceController
{
    protected $helpers = ['portfolio'];
    public function index()
    {
        return view('homeprotfolio/homeprotfolio');
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function edit($id = null)
    {
        //
    }

    public function update($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        //
    }
}
