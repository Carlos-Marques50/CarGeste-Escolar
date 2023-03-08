<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class License extends Model
{
    use HasFactory;

    protected $table="license";

    protected $fillable=[
        'key',
        'state',
        'id_parceiros',
        'id_maquina'
    ];

    //Representação da relação na Model 
    public function parceiro(){
        return $this->belongsTo(Parceiro::class, "id_parceiros");
    }
    
    //Representação da relação na Model 
    public function maquina(){
        return $this->belongsTo(Maquina::class, "id_maquina");
    }
   
}
