<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoRespuestaToCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Agrega el campo 'estado' (entero)
            $table->integer('estado')->nullable()->after('archivo');
            // Agrega el campo 'respuesta' (string)
            $table->string('respuesta', 2500)->nullable()->after('estado');
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
            // Revertir los cambios si es necesario
            $table->dropColumn('estado');
            $table->dropColumn('respuesta');
        });
    }
}
