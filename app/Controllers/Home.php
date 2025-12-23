<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function segundaVista()
    {
        return view('segunda_vista');
    }

    public function terceraVista()
    {
        return view('tercera_vista');
    }
}
