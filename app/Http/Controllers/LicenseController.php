<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MaquinaController;
use App\Models\Parceiro;

class LicenseController extends Controller
{
    //Este metodo retorna um formulario para pedir licença
    public function requestLicenseForm(){ 
        return view("license.requestLicenseForm");
    }
    
    //Metodo que Solicita Licença por meio dos Parceiros
    public function requestLicense(Request $request){

        $credencias=false;
        $parceiro= Parceiro::where('username',$request->username)->first(); //Busca dos dados do parceiro no DataBase pelo Username
        
        if(!$parceiro){
            $msg="Lamentamos! Parceiro não foi encontrado no sistema";
            return back()->with('requestLicense',$msg);
        }else{
            if($parceiro['senha']==$request->password && $parceiro['email']==$request->email && $parceiro['code_parceiro']==$request->code_parceiro){                                                                                                                                                                                    
               
                if($parceiro['state']=="Active"){
                    $msg="Lamentamos informar, a sua conta encontra-se SUSPENSA temporiariamente ";
                    return back()->with('requestLicense',$msg);
                }
               
                return $credencias=true;//Parceiro existe e esta activo

            }else{
                $msg="Desculpa! Esses dados do Parceiro estão Incorrecto...";
                return back()->with('requestLicense',$msg);
            }
        }   
    }

    //Este Metodo esta a ser usado para criar as lisenças e atrelar a Maquina e o Parceiro
    private function creatLicense(){
        
        //CODIFICANDO...
        $key= "Mac-Now";

        
    }
}
