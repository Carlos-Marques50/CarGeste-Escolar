<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;
    protected $table="parceiro";

    protected $fillable=[
        "username",	
        "senha",	
        "email",	
        "code_parceiro",	
        "state"
    ];

    public function licenses(){
        return $this->hasMany(License::class, "id_parceiro");
    }
}
