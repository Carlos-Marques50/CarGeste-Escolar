<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


//Classe para Autenticação do Usuario
class AuthController extends Controller
{
    //Metodo para apresentar o formulario de Login
    public function showLoginForm(){
        return view("auth.login");
    }

    //Este metodo consulta se os dados do usuario existem
    public function checkLogin(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user= Auth::user();
            return view("layouts/admin", compact("user")); 
        }else{
            return redirect()->back()->with(
                'errorLogin', 
                'Usuario não encontrado, consulte os seu dados de acesso e tente novamente...'
            );
        }
    }
   
    //Este metodo deletar os usuarios cadastrado no sistema
    public function destroy($id){

        $user= User::findOrFail($id);
        $num_user= $user->count();
        
        if($num_user > 1){
            $user->delete();
            $msg= "Usuario Apagado com Sucesso!";
            return redirect()->route("showUsuarios")->with("success_deleteUsuarios",$msg);
        }else {
            return redirect()->route("showUsuarios")->with("error_deleteUsuarios","Usuario não foi Apagado, Por favor tente mais tarde...");
        }
    
       
    }

    //Este metodo faz o Logout au usuario autenticado.
    public function logout(){
        Auth::logout();
        Session::invalidate();
        return redirect()->route("login");      
    }
    

}
