<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->string("key")->unique();
            $table->string("state");
            $table->foreignId("id_parceiros")->unsigned();
            $table->foreignId("id_maquina")->unsigned();  
            $table->timestamps();

            $table->foreign("id_parceiros")->references("id")
            ->on("parceiros")->onUpdate("CASCADE")->onDelete("CASCADE");
            
            $table->foreign("id_maquina")->references("id")
            ->on("maquinas")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license');
    }
};
