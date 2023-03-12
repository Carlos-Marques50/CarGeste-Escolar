<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Parceiro;


class AdminController extends Controller
{

    //Este metodo lista todos os dados da licença na View 
    public function showLicense(){
        return view("admin/licencas");
    }

    //Este metodo lista todos os dados do parceiro na View
    public function showParceiros(){
     
        $parceiros= Parceiro::all();
        return view("admin/parceiros",compact("parceiros"));
    }

    //Este Metodo retorna a pagina com formulario para cadastrar os parceiros
    public function cadastrarForm(){
        return view("admin/cadastrar_parceiro");
    }

    //Este metodo esta armazenando os dados do parceiro de forma percistente no DataBase
    public function storeParceiro(Request $request){
        
       $state= "Blocked";
       $code_parceiro= random_int(1000,10000);
       
        //Regras para validação das Inputs
        $regras=[
            'username'=>'required|string|unique:parceiros|min:5|max:30',
            'email'=> 'required|email|unique:parceiros|max:255',
            'password'=> 'required|string|min:6|max:32|confirmed'
        ];

        //Mensagens emitidas com base ao erro 
        $mensagens=[
            '*.required'=>'Este campo deve ser preenchido',
            'username.unique'=>'Infelizmente este nome do usuario já esta a ser usado no sistema',
            'username.max'=>'O seu nome de Usuario não pode conter mais de 30 caracter',
            'username.min'=>'O seu nome de Usuario não pode conter menos de 5 caracter',
            'email.email'=>'Este campo deve um Email valido',
            'email.unique'=>'Infelizmente este email já esta a ser usado no sistema',
            'password.min'=>'A password deve conter no minimo 6 caracter',
            'password.max'=>'A password deve conter no maximo 32 caracter',
            'password.confirmed'=>'As suas Password devem ser iguais'
        ];
        
        $validator= Validator::make($request->all(),$regras,$mensagens);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $parceiro= Parceiro::create([
            "username"=>$request->username,
            "senha"=>bcrypt($request->password),
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

    //Este metodo muda o estado do parceiro de Bloquado para Desbloquedo e vice-versa
    public function changeState($id){
        
        $parceiro= Parceiro::find($id);

        if($parceiro->state=="Blocked"){
            $parceiro->state="Active";
            $parceiro->save();
            return redirect()->back()->with("parceiroDesbloqueado","Parceiro esta Desbloquedo...");
        }else {
            $parceiro->state="Blocked";
            $parceiro->save();
            return redirect()->back()->with("parceiroBloquedo","Este parceiro foi Bloqueado...");
        }

    }


    public function test(){

      
    }


}
