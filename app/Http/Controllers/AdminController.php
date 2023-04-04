<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Parceiro;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

/**
 * Summary of AdminController
 */
class AdminController extends Controller
{

    public function index(){
        return view("layouts/admin");
    }

    //Este metodo lista todos os dados da licença na View 
    public function showLicense(){
        return view("admin/licencas");
    }

    //Este metodo lista todos os dados do parceiro na View
    public function showParceiros(){
        $parceiros= Parceiro::all();
        return view("admin/parceiros",compact("parceiros"));
    }

    //Este metodo lista todos os dados dos usuarios na View
    public function showUsuarios(){
        $usuarios= User::where("id",'<>',Auth::id())->get();
        return view("admin.usuarios",["usuarios"=>$usuarios]);
    }

    //Este Metodo retorna a pagina com formulario para cadastrar os parceiros
    public function cadastrarParceiroForm(){
        return view("admin/cadastrar_parceiro");
    }

    //Este Metodo retorna a pagina com formulario para cadastrar o usuario(admin)
    public function cadastrarUsuarioForm(){
        return view("admin/cadastrar_usuario");
    }
    
    //Este metodo esta armazendo os dados do usuario de forma percistente no DataBase
    public function storeUsuario(Request $request){

        //Regras para validação das Inputs
        $regras=[
            'name'=>'required|string|unique:users|min:5|max:30',
            'email'=> 'required|email|unique:users|max:255',
            'password'=> 'required|string|min:6|max:32|confirmed',
            'cargo'=> 'required|string'
        ];

        //Mensagens emitidas com base ao erro 
        $mensagens=[
            'name.unique'=>'Infelizmente este nome do usuario já esta a ser usado no sistema',
            'name.max'=>'O seu nome de Usuario não pode conter mais de 30 caracter',
            'name.min'=>'O seu nome de Usuario não pode conter menos de 5 caracter',

            'email.email'=>'Este campo deve um Email valido',
            'email.unique'=>'Infelizmente este email já esta a ser usado no sistema',

            'password.min'=>'A password deve conter no minimo 6 caracter',
            'password.max'=>'A password deve conter no maximo 32 caracter',
            'password.confirmed'=>'As suas Password devem ser iguais',

            'cargo.required'=>"Seleciona o cargo deste usuario",

            '*.required'=>'Este campo deve ser preenchido'
        ];

        $validator= Validator::make($request->all(),$regras,$mensagens);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credencias=[
            "name"=>$request->name,
            "email"=>$request->email,
            'cargo'=>$request->cargo,
            "password"=>bcrypt($request->password),
        ];

        $user= User::create($credencias);

        if(!$user){
            $msg="Lamentamos! tente este processo mais tarde...";
            return redirect()->back()->with("errorCadastroUsuario",$msg);
        }
        
        switch ($request->cargo) {
            case 'Administrador':
                $cargoo="Administrador";
                break;
            
            case 'Usuario-1':
                $cargoo="utilizador-1";
                break;

            case 'Usuario-2':
                $cargoo="utilizador-2";
                break;
        }

        $msg= $cargoo." cadastrado com sucesso";
        return redirect()->back()->with("successCadastroUsuario",$msg);

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
            "state"=>$state,
            'remember_token' => Str::random(10),
        ]);

        if(!$parceiro){
            $msg="Lamentamos! tente este processo mais tarde...";
            return redirect()->back()->with("errorCadastroParceiro",$msg);
        }
        
        $msg="Parceiro cadastrado com sucesso";
        return redirect()->back()->with("successCadastroParceiro",$msg);

        
    }

    //Este metodo muda o estado do parceiro de Bloquado para Desbloquedo e vice-versa
    public function changeStateParceiro($id){
        
        $parceiro= Parceiro::findOrFail($id);

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

    //este metodo leva-nos a pagina de update com os dados do usuario seleccionado 
    public function edit_user($id){
        $user= User::findOrFail($id);
        return View("admin.editar_usuario",compact("user"));
    }

    //Metodo que faz Update nos dados do Usuario 
    public function update_user(Request $request, string $id){

        $user= User::findOrFail($id);
        
        $regras=[
            'name'=>"required|min:5|max:30|unique:users,name,".$user->id,
            'email'=>"required|min:10|max:255|unique:users,email,".$user->id
        ];

        $mesagens=[
            'name.unique'=>'Infelizmente este nome do usuario já esta a ser usado no sistema',
            'name.max'=>'O seu nome de Usuario não pode conter mais de 30 caracter',
            'name.min'=>'O seu nome de Usuario não pode conter menos de 5 caracter',

            'email.email'=>'Este campo deve um Email valido',
            'email.unique'=>'Infelizmente este email já esta a ser usado no sistema',

            '*.required'=>'Este campo deve ser preenchido',
        ];

        $validar= Validator::make($request->all(),$regras,$mesagens);

        //valida se o usuarios esta a comprir com todas as regras de validações. 
        if ($validar->fails()) {
            return redirect()->back()->withErrors($validar);
        }

        $dados=[
            "name"=>$request->name,
            "email"=>$request->email,
            "cargo"=>$request->cargo
        ];

        if ($user->update($dados)) {
            return redirect()->route("showUsuarios")->with("success_update","Usuario Actualizado com Sucesso.");
        }else {
            return redirect()->route("showUsuarios")->with("error_update","Erro ao Actualizar Usuario.Tente mais tarde...");
        }
    }

    //este metodo leva-nos a pagina de update com os dados do parceiro seleccionado 
    public function edit_parceiro($id){
        $parceiro= Parceiro::findOrFail($id);
        return view("admin.editar_parceiro", ['parceiro'=>$parceiro] );
    }

    //Metodo que faz Update nos dados do Parceiro
    public function update_parceiro(Request $request, $id){

        $parceiro= Parceiro::findOrFail($id);
    
        $regras=[
            'username'=>"required|min:5|max:30|unique:parceiros,username,".$parceiro->id,
            'email'=>"required|min:10|max:255|unique:parceiros,email,".$parceiro->id
        ];

        $mesagens=[
            'username.unique'=>'Infelizmente o nome de parceiro que acabou de inserir    já esta a ser usado no sistema',
            'username.max'=>'Este nome de Parceiro não pode conter mais de 30 caracter',
            'username.min'=>'Este nome de Parceiro não pode conter menos de 5 caracter',

            'email.email'=>'Este campo deve conter um Email valido',
            'email.unique'=>'Infelizmente, o email que acabou de inserir já esta a ser usado por um outro Parceiro no sistema',

            '*.required'=>'Este campo deve ser preenchido',
        ];

        $validador= Validator::make($request->all(),$regras,$mesagens);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador);
        }

        $dados=[
            "username"=>$request->username,
            "email"=>$request->email
        ];

        if ($parceiro->update($dados)) {
            $msg="Parceiro Actualizado com Sucesso...";
            return redirect("admin/parceiros")->with("successUpdateParceiro",$msg);
        }else {
            $msg="Erro! Não foi possivel actualizar os dados do Parceiro...";
            return redirect("admin/parceiros")->with("errorUpdateParceiro",$msg);
        }

    }
}
