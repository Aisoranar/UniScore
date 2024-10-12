<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_coaches', function (Blueprint $table) {
            $table->id(); // ID único
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con usuario
            
            // Información general del coach
            $table->string('name'); // Nombre
            $table->string('surname'); // Apellido
            $table->integer('experience')->nullable(); // Años de experiencia
            $table->string('specialty')->nullable(); // Especialidad
            $table->string('phone')->nullable(); // Teléfono de contacto
            $table->string('email')->nullable(); // Correo del coach

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_coaches');
    }
};
