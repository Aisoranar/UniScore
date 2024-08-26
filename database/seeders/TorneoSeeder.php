<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoSeeder extends Seeder
{
    public function run()
    {
        DB::table('torneos')->insert([
            ['nombre' => 'Torneo A', 'tipo' => 'todos_contra_todos', 'genero' => 'masculino', 'estado' => 'activo'],
            ['nombre' => 'Torneo B', 'tipo' => 'grupos', 'genero' => 'femenino', 'estado' => 'finalizado'],
            ['nombre' => 'Torneo C', 'tipo' => 'eliminatorias_grupos', 'genero' => 'mixto', 'estado' => 'activo'],
        ]);
    }
}
