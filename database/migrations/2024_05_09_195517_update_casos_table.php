<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Agregar columnas para las llaves foráneas regiones_id y comunas_id
            $table->unsignedBigInteger('region_id')->after('localidad');
            $table->unsignedBigInteger('comuna_id')->after('region_id');

            // Agregar restricciones de clave externa
            $table->foreign('region_id')->references('id')->on('regiones');
            $table->foreign('comuna_id')->references('id')->on('comunas');

            // Eliminar las columnas region y comuna
            $table->dropColumn(['region', 'comuna']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Eliminar las columnas y restricciones agregadas en el método up()
            $table->dropForeign(['region_id']);
            $table->dropForeign(['comuna_id']);
            $table->dropColumn(['region_id', 'comuna_id']);
        });
    }
}
