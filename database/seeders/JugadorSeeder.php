<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JugadorSeeder extends Seeder
{
    public function run()
    {
        DB::table('jugadores')->insert([
            ['nombre' => 'Jugador 1', 'equipo_id' => 1, 'tarjetas_amarillas' => 1, 'tarjetas_rojas' => 0, 'goles' => 5],
            ['nombre' => 'Jugador 2', 'equipo_id' => 1, 'tarjetas_amarillas' => 0, 'tarjetas_rojas' => 1, 'goles' => 3],
            ['nombre' => 'Jugador 3', 'equipo_id' => 2, 'tarjetas_amarillas' => 2, 'tarjetas_rojas' => 0, 'goles' => 7],
            ['nombre' => 'Jugador 4', 'equipo_id' => 2, 'tarjetas_amarillas' => 0, 'tarjetas_rojas' => 0, 'goles' => 2],
        ]);
    }
}
