<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Classe para Autenticação do Usuario
class AuthController extends Controller
{
    //Metodo para apresentar o formulario de Login
    public function showLoginForm(){
        return view("auth.login");
    }

    //Metodo para apresentar o formulario de Login do Aluno
    public function showLoginFormAluno(){
        return view("aluno.login");
    }
}
