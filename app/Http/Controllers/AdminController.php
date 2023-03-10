<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Parceiro;

class AdminController extends Controller
{
    public function licenseForm(){
        return view("admin/licencas");
    }

    public function parceiroForm(){
        return view("admin/parceiros");
    }

    public function cadastrarForm(){
        return view("admin/cadastrar_parceiro");
    }

    public function store(Request $request){
        
       $state= "Active";
       $code_parceiro= random_int(1000,10000);

        //Regras para validação das Inputs
        $rule=[
            'username'=>'required|string|unique:parceiros|max:30',
            'email'=> 'required|email|unique:parceiros|max:255',
            'password'=> 'required|string|min:6|confirmed'
        ];

        //Tratamento das mensagens de erro 
        $message=[
            '*.required'=>'Este campo deve ser preenchido',
            'username.unique'=>'Infelizmente este nome do usuario já esta a ser usado',
            'username.max'=>'O seu nome de Usuario não pode conter mais de 30 caracter',
            'email.email'=>'Este campo deve um Email valido',
            'email.unique'=>'Infelizmente este Email já esta a ser Usado',
            'password.min'=>'A sua Password deve conter mais de 6 caracter',
            'password.confirmed'=>'As suas Password devem ser iguais'
        ];
        
        $validator= Validator::make($request->all(),$rule,$message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $parceiro= Parceiro::create([
            "username"=>$request->username,
            "senha"=>$request->password,
            "email"=>$request->email,
            "code_parceiro"=>$code_parceiro,
            "state"=>$state
        ]);

        if(!$parceiro){
            $msg="Lamentamos! tente este processo mais tarde...";
            return redirect()->back()->with("errorCadastro",$msg);
        }
        
        $msg="Parceiro cadastrado com sucesso";
        return redirect()->back()->with("successCadastro",$msg);

        
    }

    public function test(){

      
    }


}
