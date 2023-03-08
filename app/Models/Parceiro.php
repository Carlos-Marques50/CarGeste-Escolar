<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;
    protected $table="parceiros"; //Refencias a tabela do Banco de Dados 

    protected $fillable=[
        "username",	
        "senha",	
        "email",	
        "code_parceiro",	
        "state"
    ];
    
    //Metodo esta a atrelar o Parceiro a tabela(Model) License com o seu ID 
    public function licenses(){
        return $this->hasMany(License::class,"id_parceiros");
    }
   
}
