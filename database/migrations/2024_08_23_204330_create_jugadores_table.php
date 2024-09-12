<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->string('posicion');
            $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            $table->integer('tarjetas_amarillas')->default(0);
            $table->integer('tarjetas_rojas')->default(0);
            $table->integer('goles')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
