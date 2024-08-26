<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('goleadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('torneo_id');
            $table->unsignedBigInteger('jugador_id')->nullable(); // Permitir valores nulos
            $table->integer('goles')->default(0);
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
            $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('goleadors');
    }
};
