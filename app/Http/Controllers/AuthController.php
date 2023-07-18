<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

//Classe para Autenticação do Usuario
class AuthController extends Controller
{
    //Metodo para apresentar o formulario de Login
    public function showLoginForm(){
        
        if($this->queryUserInSystem()){
            return view("auth.login");
        }else {
            return $this->showCreatUserForm();
        }
    }

    //Este metodo consulta se existe algum usuario cadastrado no sistema. 
    private function queryUserInSystem(){
      if(count(User::all())==0) {
       return false;
      } 
        return true;
    }

    //Este Metodo vai retornar a view do formulario de cadastro caso não haja usuario no sistema
    public function showCreatUserForm(){
        return view('auth.createUser');
    }

    //Este metodo vai criar usuario no sistema
    public function creatUser(Request $request){

        //Regras para validação das Inputs
        $regras=[
            'name'=>'required|string|min:5|max:30',
            'email'=> 'required|email|max:255',
            'password'=> 'required|string|min:6|max:32|confirmed'
        ];

        //Mensagens emitidas com base ao erro 
        $mensagens=[
            
            '*.required'=>'Este campo deve ser preenchido',

            'name.max'=>'O seu nome de Usuario não pode conter mais de 30 caracter',
            'name.min'=>'O seu nome de Usuario não pode conter menos de 5 caracter',

            'email.email'=>'Este campo deve conter um email valido',
           
            'password.min'=>'A password deve conter no minimo 6 caracter',
            'password.max'=>'A password deve conter no maximo 32 caracter',
            'password.confirmed'=>'As suas Password devem ser iguais'
        ];

        $validator= Validator::make($request->all(),$regras,$mensagens);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credencias=[
            "name"=>$request->name,
            "email"=>$request->email,
            'cargo'=>"Administrador",
            "password"=>bcrypt($request->password),
        ];

        $user= User::create($credencias);

        if(!$user){
            $msg="Lamentamos! Usuario não Cadastrado, tente este processo mais tarde...";
            return redirect()->back()->with("errorCadastroNewUsuario",$msg);
        }
        
        return view("auth.login");
    }

    //Este metodo consulta se os dados do usuario existem
    public function checkLogin(Request $request){

        $credencias=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($credencias)){
            $user= Auth::user();
            if ($user->cargo=="Administrador") {
                session(["cargo"=>true]);
            }
            session(["username"=>$user->name]);        
            return view("admin/licencas"); 
            
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
