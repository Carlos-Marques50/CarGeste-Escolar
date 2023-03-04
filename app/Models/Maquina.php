<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;
    protected $table="maquina";

    protected $fillable=[
        "SO",
        "versao",
        "macSO"	
    ];

    //Relação entre as tabelas
    public function licenses(){
        return $this->hasMany(License::class,"id_maquina");
    }
}
