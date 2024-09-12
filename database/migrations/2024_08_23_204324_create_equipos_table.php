<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('torneo_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('puntos')->default(0);
            $table->integer('partidos_jugados')->default(0);
            $table->integer('partidos_ganados')->default(0);
            $table->integer('partidos_empatados')->default(0);
            $table->integer('partidos_perdidos')->default(0);
            
            // Nuevas columnas para goles
            $table->integer('goles_favor')->default(0);  // GF
            $table->integer('goles_contra')->default(0); // GC
            $table->integer('diferencia_goles')->default(0); // +/- (calculada)
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
