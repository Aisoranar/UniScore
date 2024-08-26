<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnotherJugadorSeeder extends Seeder
{
    public function run()
    {
        DB::table('jugadores')->insert([
            ['nombre' => 'Jugador Extra', 'equipo_id' => 5, 'tarjetas_amarillas' => 1, 'tarjetas_rojas' => 0, 'goles' => 2],
        ]);
    }
}
