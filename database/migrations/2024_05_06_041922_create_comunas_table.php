<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunasTable extends Migration
{
    public function up()
    {
        Schema::create('comunas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regiones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comunas');
    }
}
