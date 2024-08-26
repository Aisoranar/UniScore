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
                // Asegúrate de que la columna torneo_id exista antes de agregar la clave foránea
                if (!Schema::hasColumn('goleadors', 'torneo_id')) {
                    $table->unsignedBigInteger('torneo_id');
                    $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
                }

                // Asegúrate de que la columna jugador_id exista antes de agregar la clave foránea
                if (!Schema::hasColumn('goleadors', 'jugador_id')) {
                    $table->unsignedBigInteger('jugador_id')->nullable(); // Permitir valores nulos
                    $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('set null');
                }

                // Asegúrate de que la columna goles exista antes de agregarla
                if (!Schema::hasColumn('goleadors', 'goles')) {
                    $table->integer('goles')->default(0);
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('goleadors')) {
            Schema::table('goleadors', function (Blueprint $table) {
                // Eliminar claves foráneas si existen
                if (Schema::hasColumn('goleadors', 'torneo_id')) {
                    $table->dropForeign(['torneo_id']);
                }
                if (Schema::hasColumn('goleadors', 'jugador_id')) {
                    $table->dropForeign(['jugador_id']);
                }

                // Eliminar columnas si existen
                $table->dropColumn(['torneo_id', 'jugador_id', 'goles']);
            });
        }
    }
};
