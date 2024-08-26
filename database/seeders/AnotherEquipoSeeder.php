<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnotherEquipoSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipos')->insert([
            ['nombre' => 'Equipo Extra', 'torneo_id' => 3, 'puntos' => 4],
        ]);
    }
}
