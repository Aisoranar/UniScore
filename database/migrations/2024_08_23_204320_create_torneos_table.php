<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo', ['todos_contra_todos', 'grupos', 'eliminatorias_grupos']);
            $table->enum('genero', ['masculino', 'femenino', 'mixto']);
            $table->enum('estado', ['activo', 'finalizado']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('torneos');
    }
}
