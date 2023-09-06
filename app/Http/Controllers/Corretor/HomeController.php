<?php

namespace App\Http\Controllers\Corretor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function Leads(){
        return view('corretor.leads.lista');
    }

    public function ListaPropostas(){
        return view('corretor.propostas.lista');
    }

    public function Proposta(){
        return view('corretor.propostas.proposta');
    }

    public function ListaEmpreendimentos(){
        return view('corretor.empreendimentos.lista');
    }

    public function EmpreendimentoDetalhes(){
        return view('corretor.empreendimentos.detalhes');
    }

    public function Perfil()
    {
        $usuario = Auth::user();
        return view('corretor.perfil')->with(compact('usuario'));
    }




}
