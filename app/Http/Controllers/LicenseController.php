<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MaquinaController;
use App\Mail\keyEmail;
use App\Models\Parceiro;
use App\Models\Maquina;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LicenseController extends Controller
{
    //Este metodo retorna um formulario para pedir licença
    public function requestLicenseForm(){ 
        echo MaquinaController::controleTypeMachine();
        return view("license.requestLicenseForm");
    }
    
    //Metodo que Solicita Licença por meio dos Parceiros
    public function requestLicense(Request $request){
        
        $regras= [
            'username'=> 'required|string|min:5|max:30',
            'email'=> 'required|email|max:255',
            'code_parceiro'=>'required|max:6',
            'password'=> 'required|min:6|max:32|string',
        ];
        $mensagens=[
            '*.required'=>"Por favor Preencha os compos vazios",

            'username.max'=>'Este campo conta apenas com 30 carecteres no maximo',
            'username.min'=>'Este campo conta com 5 carecter no minimo',
            'username.string'=>"Seu nome de usuario deve ser um conjunto de carercteres valido",

            'email.email'=>"Este campo deve conter um email valido",
            'email.max'=>"Lamentamos! Este Email não é suportado pelo Sistema",
            
            'code_parceiro.max'=>"Lamentamos, O sistema com reconhece o código de parceiro",

            'password.min'=>"Este campo deve conter no minimo 6 caracter",
            'password.max'=>"Este campo deve conter no maximo 32 caracter",
            'password.string'=>"Lamentamos. O sistema não reconhece a password"
        ];

        $validator=Validator::make($request->all(),$regras,$mensagens);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $parceiros= Parceiro::where('username',$request->username)->first();
        if(!$parceiros){
            return redirect()->back()->with("errorRequestLicense","Lamentamos! Este Parceiro não existe no sistema");  
        }
        if($request->email==$parceiros->email && $request->code_parceiro==$parceiros->code_parceiro && password_verify($request->password,$parceiros->senha)) {
            if ($parceiros->state!="Active") {
                return redirect()->back()->with("inactiveRequestLicense","Lamentos informar que a sua conta de parceiro encontra-se suspensa, entra em contacto com os nossos serviços..."); 
            }
            if($this->sendKeyByEmail()){
                echo $this->store($this->creatKeyLicense());
            }
            
            return redirect()->back()->with("sucessRequestLicense","Pedido de Licença enviado, aguarde por 5 minutos até o envio da Chave no seu Email..."); 
        }
        return redirect()->back()->with("errorDadosRequestLicense","Dados do Parceiro estão incorretos, consulte os seus dados e tente novamente."); 
    }

    //Este Metodo esta a ser usado para criar as Licenças de Forma automatica
    public static function creatKeyLicense(){
        
        $machine= MaquinaController::machine(); 

        //criando Chave de Activação no Banco de Dados
        $data=now()->format("d-m-Y h:i");
        $key= $machine["mac"]."-".$data;
        return  $key= hash('sha256',$key);   
    }

    //Este Metodo esta a armazenar os dados da Licença, Maquina e Parceiro no DataBase 
    public static function store($key){
        
        $request= app(Request::class); //Instaciamento da class sem precisar passar por paramentro
        
            $status= "Active";
            //$key=$this->creatKeyLicense();
            $machine= MaquinaController::machine(); 
            $maquinas= Maquina::where('macSO',$machine['mac'])->first();//Buscando Id na Tabela Parceiro
            $parceiro= Parceiro::where('username',$request->username)->first(); //Buscando Id na Tabela Parceiro
            if(empty($maquinas)){
                            
                //Criar Registo na Tabela(Maquina)
                $maquinas= Maquina::create([
                    'SO'=>$machine['system'],
                    'versao'=>$machine['version'],
                    'macSO'=>$machine['mac']
                ]);
                goto salto;
            }

            salto:
            sleep(10);//Dorme por 10s,até Registar todos os dados da Maquina no DataBase

            //Criar Registo na Tabela(License)
            $license= License::create([
                'key'=>$key,
                'state'=> $status,
                'id_parceiros'=>$parceiro['id'],
                'id_maquina'=>$maquinas['id']
            ]);
    }

    //Este metodo a fazer o envio da chave no email do Parceiro ou Tecnico
    public function sendKeyByEmail(){


        $request= app(Request::class);
        $parceiro= Parceiro::where('username',$request->username)->firstOrFail();

        $detalhes=[
            'title'=>"Chave do Pedido de Licença",
            'body'=> "Esta chave é unica, privada e valida apenas na maquina em que se fez requisação. Key:".$this->creatKeyLicense(),
            'parceiro'=>$parceiro->username
        ];  

        $sendEmail= new keyEmail($detalhes); //Instanciamento da Class MAIL 
        Mail::to($parceiro->email)->send($sendEmail); //Metodo static do Laravel de envio de EMAIL

        return true;
    }

}
