<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Jenssegers\Agent\Agent;
use Symfony\Component\Process\Process;

class MaquinaController extends Controller{

    //Metodo para apresentar o formulario de licença
    public function showLicenseForm(){
        return view("license.index");
    }

    //Metodo para fazer o controler do tipo de Maquina
    public static function controleTypeMachine(){
        $agent= new Agent();
        if (!$agent->isDesktop()) { //Aqui estou a condicionar se a maquina não for um desktop
            $msg='Lamentamos! O sistema não pode ser usado por meio desta plataforma';
            return back()->with('machine', $msg);
        }
    }
    //Metodo que busca dados da Maquina. 
    public static function machine(){
        
        $agent= new Agent();

        switch($agent->platform()){

            //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Windows)
            case 'Windows':
                $macAddress = exec("getmac"); //função para executar comando do sistema operacional(getMac)
                // Filtra o resultado para encontrar o endereço MAC
                if (preg_match('/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/', $macAddress, $matches)){
                    $macAddress = $matches[0];
                }
                break;

            //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Ubunto-Linux)    
            case 'Ubuntu':
                $process = new Process(['cat', '/sys/class/net/eth0/address']);
                $process->run();
    
                if (!$process->isSuccessful()) {
                    throw new \RuntimeException($process->getErrorOutput());
                }
                $macAddress = trim($process->getOutput());
                break;

             //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Mac)    
            case 'OS X':
                $process = new Process(['networksetup', '-getmacaddress', 'en0']);
                $process->run();
    
                if (!$process->isSuccessful()) {
                    throw new \RuntimeException($process->getErrorOutput());
                }
                $macAddress = preg_replace('/\s+/', '', $process->getOutput());
                break;
            
            default:
                $msg='Lamentamos! O sistema não pode ser usado por meio desta plataforma';
                return back()->with('machine', $msg);   
        }

        $dados_maquina= array(
            "system"=>$agent->platform(),
            "version"=>$agent->version($agent->platform()), 
            "mac"=> $macAddress
        ); 

        return $dados_maquina;
    } 

    //Metodo para consultar maquina registada no DataBase
    public function queryMachine(){

        $this->controleTypeMachine();
        $maquinas= Maquina::all();//Model Maquina
        $machine=$this->machine(); //variavel esta recebendo o metodo que busca os dados da Maquina.
        $resMachine=false; //variável iniciada como falsa antes do loop

        foreach($maquinas as $maquina){     
            if($maquina->SO==$machine["system"] && $maquina->versao==$machine["version"] && $maquina->macSO==$machine["mac"]){
                $resMachine=true; //Aceitando a existencia da maquina no Database
                break;//Parar o Loop quando a maquina for encontrada
            }
        }

        if($resMachine){
            //Caso a Maquina for encontrada no DataBase o sistema retornara a view(Bem-Vindo)
            return view("welcome"); 
        }else {
            //Caso não seja encontrada, o sistema retornara a função "ShowLicenseForm".  
            return $this->showLicenseForm();  
        }
    //End of Function "queryMachine"
    }

//End of Class "MaquinaController"
}
