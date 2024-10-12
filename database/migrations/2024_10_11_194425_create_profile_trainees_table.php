<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_trainees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con usuario
            $table->string('name'); // Nombre
            $table->string('surname'); // Apellido
            $table->string('position')->nullable(); // Posición en el equipo
            $table->string('experience_level')->nullable(); // Nivel de experiencia
            $table->string('phone')->nullable(); // Teléfono de contacto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_trainees');
    }
};
