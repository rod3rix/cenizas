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
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('tipo');
            $table->string('localidad');
            $table->integer('region');
            $table->integer('comuna');
            $table->string('direccion');
            $table->string('asunto');
            $table->string('descripcion');
            $table->string('archivo');
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
