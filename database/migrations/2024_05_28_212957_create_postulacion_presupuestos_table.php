<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionPresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulacion_presupuestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulacion_fondos_id');
            $table->string('detalle')->nullable();
            $table->string('monto')->nullable();
            $table->timestamps();
            $table->foreign('postulacion_fondos_id')->references('id')->on('postulacion_fondos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulacion_presupuestos');
    }
}
