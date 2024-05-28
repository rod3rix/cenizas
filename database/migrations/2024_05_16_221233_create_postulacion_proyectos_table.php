<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulacionProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulacion_proyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('persona_juridica_id')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('genero')->nullable();
            $table->integer('pueblo_originario')->nullable();
            $table->string('discapacidad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('actividad_economica')->nullable();
            $table->string('direccion')->nullable();
            $table->string('formacion_formal')->nullable();
            $table->string('profesion')->nullable();
            $table->integer('acepto_clausula')->nullable();
            $table->string('nombre_organizacion')->nullable();
            $table->string('rut_organizacion')->nullable();
            $table->string('domicilio_organizacion')->nullable();
            $table->string('personalidad_juridica')->nullable();
            $table->string('antiguedad_anos')->nullable();
            $table->string('numero_socios')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->string('tipo_proyecto')->nullable();
            $table->string('lugar_proyecto')->nullable();
            $table->string('directos')->nullable();
            $table->string('indirectos')->nullable();
            $table->string('aporte_solicitado')->nullable();
            $table->integer('acepto_clausula_proy')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('calificar_pregunta')->nullable();
            $table->integer('calificar')->nullable();
            $table->string('respuesta', 2500)->nullable();
            $table->string('archivo_respuesta')->nullable();
            $table->timestamps();

            $table->foreign('persona_juridica_id')->references('id')->on('persona_juridicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulacion_proyectos');
    }
}
