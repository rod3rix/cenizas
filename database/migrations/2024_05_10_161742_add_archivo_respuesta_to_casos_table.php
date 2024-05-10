<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivoRespuestaToCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Agregar el campo 'archivo_respuesta' después del campo 'respuesta'
            $table->string('archivo_respuesta')->nullable()->after('respuesta');
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
            // Revertir la adición del campo 'archivo_respuesta'
            $table->dropColumn('archivo_respuesta');
        });
    }
}
