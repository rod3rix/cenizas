<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListadoFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listado_fondos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_fondo');
            $table->string('descripcion',2500)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('vigencia');
            $table->unsignedBigInteger('titulo_anual_id');
            $table->foreign('titulo_anual_id')->references('id')->on('titulo_fondos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listado_fondos');
    }
}
