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
        Schema::create('postulacion_fondos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_fondo_concursable'); // Correct column name
            $table->string('nacionalidad', 255);
            $table->string('genero', 255);
            $table->integer('pueblo_originario');
            $table->integer('discapacidad');
            $table->date('fecha_nacimiento');
            $table->string('actividad_economica', 255);
            $table->string('direccion', 255);
            $table->string('formacion_formal', 255);
            $table->string('profesion', 255);
            $table->integer('acepto_clausula');
            $table->unsignedBigInteger('id_dato_organizacion'); // Correct column name
            $table->string('nombre_proyecto')->nullable();
            $table->text('equipamiento')->nullable();
            $table->text('fundamentacion')->nullable();
            $table->text('descripcion_proyecto')->nullable();
            $table->text('objetivo_general')->nullable();
            $table->text('objetivos_especificos')->nullable();
            $table->text('cierre_proyecto')->nullable();
            $table->integer('directos')->nullable();
            $table->integer('indirectos')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->integer('cantidad_dias')->nullable();
            $table->string('aporte_solicitado')->nullable();
            $table->string('aporte_terceros')->nullable();
            $table->string('aporte_propio')->nullable();
            $table->string('archivo_anexo')->nullable();
            $table->string('archivo_certificado')->nullable();
            $table->unsignedBigInteger('id_persona_juridica');
            $table->string('estado', 255)->nullable();
            $table->string('respuesta', 2500)->nullable();
            $table->string('archivo_respuesta')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_dato_organizacion')->references('id')->on('datos_organizaciones')->onDelete('cascade');
            $table->foreign('id_persona_juridica')->references('id')->on('persona_juridicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down(): void
    {
        Schema::dropIfExists('postulacion_fondos');
    }
};
