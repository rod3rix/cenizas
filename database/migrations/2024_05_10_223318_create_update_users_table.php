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
            // Eliminar las columnas solo si existen
            if (Schema::hasColumn('users', 'rut')) {
                $table->dropColumn('rut');
            }

            if (Schema::hasColumn('users', 'apellido')) {
                $table->dropColumn('apellido');
            }

            if (Schema::hasColumn('users', 'fono')) {
                $table->dropColumn('fono');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Volver a agregar las columnas eliminadas
            $table->string('rut')->nullable();
            $table->string('apellido')->nullable();
            $table->string('fono')->nullable();
        });
    }
};
