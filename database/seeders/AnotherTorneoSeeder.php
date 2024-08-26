<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnotherTorneoSeeder extends Seeder
{
    public function run()
    {
        DB::table('torneos')->insert([
            ['nombre' => 'Torneo Extra', 'tipo' => 'eliminatorias_grupos', 'genero' => 'mixto', 'estado' => 'activo'],
        ]);
    }
}
