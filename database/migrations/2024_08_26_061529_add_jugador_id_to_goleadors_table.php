<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Verifica si la tabla existe antes de intentar modificarla
        if (Schema::hasTable('goleadors')) {
            Schema::table('goleadors', function (Blueprint $table) {
                // Asegúrate de que la columna jugador_id exista antes de modificarla
                if (Schema::hasColumn('goleadors', 'jugador_id')) {
                    $table->unsignedBigInteger('jugador_id')->nullable()->change();
                    $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('set null');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('goleadors')) {
            Schema::table('goleadors', function (Blueprint $table) {
                // Eliminar claves foráneas si existen
                if (Schema::hasColumn('goleadors', 'jugador_id')) {
                    $table->dropForeign(['jugador_id']);
                }

                // Eliminar columna si existe
                $table->dropColumn('jugador_id');
            });
        }
    }
};
