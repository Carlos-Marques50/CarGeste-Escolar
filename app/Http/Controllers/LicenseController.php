<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MaquinaController;
use App\Models\Parceiro;
use App\Models\Maquina;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    //Este metodo retorna um formulario para pedir licença
    public function requestLicenseForm(){ 
        $controleMaquina= MaquinaController::controleTypeMachine();
        echo $controleMaquina;
        return view("license.requestLicenseForm");
    }
    
    //Metodo que Solicita Licença por meio dos Parceiros
    public function requestLicense(){
        
        $request= app(Request::class); //Instaciamento da class sem precisar passar por paramentro
   
        $credencias=false; //Recebe as validaçoes das credencias
        $parceiro= Parceiro::where('username',$request->username)->first(); //Busca dos dados do parceiro no DataBase pelo Username

        if(!$parceiro){
            $msg="Lamentamos! Este parceiro não foi encontrado no sistema";
            return back()->with('requestLicense',$msg);
        }else{

            if($parceiro['senha']==$request->password && $parceiro['email']==$request->email && $parceiro['code_parceiro']==$request->code_parceiro){                                                                                                                                                                                    
                
                if($parceiro['state']==="blocked"){
                    $msg="Lamentamos informar, a sua conta encontra-se SUSPENSA temporiariamente. Para mais Informações entre em Contacto com (+244 925-033-626)";
                    return back()->with('requestLicense',$msg);
                }
                //Armazenar de forma percistente no DataBase
                echo $this->store();

            }else{
                $msg="Desculpa! Esses dados do Parceiro estão Incorrecto...";
                return back()->with('requestLicense',$msg);
                
            }
        }   
    }

    //Este Metodo esta a ser usado para criar as Licenças de Forma automatica
    private function creatKeyLicense(){
        
        $machine= MaquinaController::machine(); 
        
        //criando Chave de Activação no Banco de Dados
        $data=now()->format("d-m-Y h:i:s");
        $key= $machine["mac"]."-".$data;
        return  $key= hash('sha256',$key);   
    }

    //Este Metodo esta a armazenar os dados no DataBase 
    public function store(){
        
        $request= app(Request::class); //Instaciamento da class sem precisar passar por paramentro
        
            $status= "Active";
            $key=$this->creatKeyLicense();
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
            sleep(10);//Dorme por 10s,até preparar todos os dados da Maquina

            //Criar Registo na Tabela(License)
            $license= License::create([
                'key'=>$key,
                'state'=> $status,
                'id_parceiros'=>$parceiro['id'],
                'id_maquina'=>$parceiro['id']
            ]);
            
         return view("license.index",compact("key"));
    }

}
