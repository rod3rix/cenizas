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
        Schema::table('users', function (Blueprint $table) {
            // Agregar las nuevas columnas
            $table->string('apellido_paterno')->after('name');
            $table->string('apellido_materno')->after('apellido_paterno');
            $table->string('rut')->after('apellido_materno');
            $table->string('fono')->after('rut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar las nuevas columnas en caso de reversión
            $table->dropColumn('apellido_paterno');
            $table->dropColumn('apellido_materno');
            $table->dropColumn('rut');
            $table->dropColumn('fono');
        });
    }
};
