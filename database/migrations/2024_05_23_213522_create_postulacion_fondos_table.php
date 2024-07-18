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
            $table->unsignedBigInteger('id_fondo_concursable');
            $table->string('nacionalidad')->nullable();
            $table->string('genero')->nullable();
            $table->integer('pueblo_originario')->nullable();
            $table->integer('discapacidad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('actividad_economica')->nullable();
            $table->string('otros')->nullable();
            $table->string('direccion')->nullable();
            $table->string('formacion_formal')->nullable();
            $table->string('profesion')->nullable();
            $table->integer('acepto_clausula')->nullable();
            $table->unsignedBigInteger('id_dato_organizacion');
            $table->string('nombre_proyecto')->nullable();
            $table->text('tipo_proyecto')->nullable();
            $table->text('fundamentacion', 1500)->nullable();
            $table->text('descripcion_proyecto', 1500)->nullable();
            $table->text('objetivo_general', 1500)->nullable();
            $table->text('objetivos_especificos', 1500)->nullable();
            $table->text('cierre_proyecto')->nullable();
            $table->integer('directos')->nullable();
            $table->integer('indirectos')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->integer('cantidad_dias')->nullable();
            $table->string('rec_humanos')->nullable();
            $table->string('mat_insumos')->nullable();
            $table->string('rec_hum_otros')->nullable();
            $table->string('aporte_solicitado')->nullable();
            $table->string('aporte_terceros')->nullable();
            $table->string('aporte_propio')->nullable();
            $table->string('archivo_anexo')->nullable();
            $table->string('archivo_certificado')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('calificar')->nullable();
            $table->string('respuesta', 1500)->nullable();
            $table->string('archivo_respuesta')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_fondo_concursable')->references('id')->on('listado_fondos')->onDelete('cascade');
            $table->foreign('id_dato_organizacion')->references('id')->on('datos_organizaciones')->onDelete('cascade');
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
