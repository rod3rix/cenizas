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
            $table->string('descripcion',1500)->nullable();
            $table->integer('zona');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('estado');
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
