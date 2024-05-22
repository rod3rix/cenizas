<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('tipo');
            $table->integer('localidad');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regiones');
            $table->unsignedBigInteger('comuna_id');
            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->string('direccion');
            $table->string('asunto');
            $table->string('descripcion');
            $table->string('archivo');
            $table->integer('estado')->nullable();
            $table->string('respuesta', 2500)->nullable();
            $table->string('archivo_respuesta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
