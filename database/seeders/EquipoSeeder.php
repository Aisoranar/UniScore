<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipos')->insert([
            ['nombre' => 'Equipo 1', 'torneo_id' => 1, 'puntos' => 10],
            ['nombre' => 'Equipo 2', 'torneo_id' => 1, 'puntos' => 8],
            ['nombre' => 'Equipo 3', 'torneo_id' => 2, 'puntos' => 6],
            ['nombre' => 'Equipo 4', 'torneo_id' => 2, 'puntos' => 12],
        ]);
    }
}
