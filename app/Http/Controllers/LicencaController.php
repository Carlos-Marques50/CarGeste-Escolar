<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Symfony\Component\Process\Process;

class LicencaController extends Controller
{
    //Metodo para apresentar o formulario de licença
    public function showLicenseForm(){
        return view("license.index");
    }

    //Metodo que busca dados da Maquina . 
    private function machine(){
    
        $agent= new Agent(); //Instanciamento da class Agent do Pacote de Terceiro do Laravel chamado Jenssegers
        $is_desktop=$agent->isDesktop();

        if (!$is_desktop) { //Aqui estou a condicionar se a maquina é um desktop
            $msg='Lamentamos! A licença não pode ser activada por meio desta plataforma.';
            return back()->with('erro', $msg);
        }
       
        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Windows)
        if($agent->platform()=="Windows"){
            $macAddress = exec("getmac"); //função para executar comando do sistema operacional(getMac)
                // Filtra o resultado para encontrar o endereço MAC
                if (preg_match('/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/', $macAddress, $matches)){
                    $macAddress = $matches[0];
                }
        }
        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Ubunto-Linux)
        if($agent->platform()=="Ubuntu" ){
            $process = new Process(['cat', '/sys/class/net/eth0/address']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }
            $macAddress = trim($process->getOutput());
        }
        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Mac)
        if($agent->platform()=="OS X"){            
            $process = new Process(['networksetup', '-getmacaddress', 'en0']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }
            $macAddress = preg_replace('/\s+/', '', $process->getOutput());
        }
        $dados_maquina= array(
            "system"=>$agent->platform(),
            "version"=>$agent->version($agent->platform()), 
            "mac"=> $macAddress
        );

        return $dados_maquina;
    } 

    //Metodo para consultar maquina registada no sistema
    public function queryMachine(){

        $maquinas= Maquina::all();
        $machine=$this->machine();
        $resMachine=false; //variável iniciada como falsa antes do loop

        foreach($maquinas as $maquina){     
            if($maquina->SO==$machine["system"] && $maquina->versao==$machine["version"] && $maquina->macSO==$machine["mac"]){
                $resMachine=true; //Aceitando a existencia da maquina no Database
                break;//Parar o Loop quando a maquina for encontrada
            }
        }
        
        if($resMachine){
            return view("welcome");
        }else {
           return $this->showLicenseForm();  
        }
    }
}
