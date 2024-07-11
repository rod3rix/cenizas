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
            $table->integer('comuna');
            $table->string('direccion');
            $table->string('asunto');
            $table->string('descripcion', 1500);
            $table->string('archivo')->nullable();
            $table->integer('estado')->nullable();
            $table->string('respuesta', 1500)->nullable();
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
