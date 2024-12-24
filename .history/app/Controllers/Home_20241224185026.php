<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
  
}

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
  
}
