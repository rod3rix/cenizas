<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionesComunasTable extends Migration
{
    public function up()
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            // Agregar cualquier otro campo necesario para las regiones
            $table->timestamps();
        });

        Schema::create('comunas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('region_id')->constrained('regiones');
            // Agregar cualquier otro campo necesario para las comunas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comunas');
        Schema::dropIfExists('regiones');
    }
}
