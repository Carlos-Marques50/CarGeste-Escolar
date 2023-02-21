<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Symfony\Component\Process\Process;

class LicencaController extends Controller
{
    //Metodo para apresentar o formulario de licença
    public function showLicencaForm(){
        return view("licença.index");
    }

    //Metodo p+ara consultar maquina com licença
    public function activarlicenca(){
    
        $agent= new Agent(); //Instanciamento da class Agent do Pacote de Terceiro do Laravel chamado Jenssegers
        $is_desktop=$agent->isDesktop();


        if (!$is_desktop) { //Aqui estou a condicionar se a maquina é um desktop
            $msg='Lamentamos! A licença não pode ser activar por meio desta plataforma.';
            return back()->with('erro', $msg);
            die;
        }
    
        echo $siO= $agent->platform();//Sistema Operativo
        echo $versao= $agent->version($siO);//Versão do Sistema Operativo
        echo "<hr>";
       
        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Windows)
        if($siO=="Windows"){
            $macAddress = exec("getmac"); //função para executar comando do sistema operacional(getMac)
                
                // Filtra o resultado para encontrar o endereço MAC
                if (preg_match('/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/', $macAddress, $matches)) {
                    echo $macAddress = $matches[0];
                    
                }

        }

        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Ubunto-Linux)
        if($siO=="Ubuntu" ){
           
            $process = new Process(['cat', '/sys/class/net/eth0/address']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }

            $macAddress = trim($process->getOutput());
            echo $macAddress;

        }

        //Buscando o Endereço Mac de uma Maquina com Sistema Operativo (Mac)
        if($siO=="OS X"){            

            $process = new Process(['networksetup', '-getmacaddress', 'en0']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }

            $macAddress = preg_replace('/\s+/', '', $process->getOutput());

            echo $macAddress;

        }

    }
    
}
