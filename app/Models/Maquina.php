<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;
    protected $table="maquinas";

    protected $fillable=[
        'SO',
        'versao',
        'macSO'

    ];
    
   //Metodo esta a atrelar o Parceiro a tabela(Model) License com o seu ID 
    public function licenses(){
        return $this->hasMany(License::class,"id_maquina");
    }
  
}
