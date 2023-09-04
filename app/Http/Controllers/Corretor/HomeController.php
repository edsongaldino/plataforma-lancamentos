<?php

namespace App\Http\Controllers\Corretor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function sobre(){
        return view('sobre');
    }

    public function politica(){
        return view('politica');
    }

    public function cadastro(){
        return view('corretor.cadastro');
    }

    public function sair(){
        return view('login');
    }

    public function login(){
        return view('corretor.login');
    }

    public function validarLogin(){
        return view('home');
    }

    public function avaliarEmpresa(){
        return view('avaliar-empresa');
    }
}
