<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        DB::table('partidos')->insert([
            ['torneo_id' => 1, 'equipo_local_id' => 1, 'equipo_visitante_id' => 2, 'fecha' => '2024-08-26', 'hora' => '15:00:00', 'ubicacion' => 'Estadio Local', 'resultado' => '3-1'],
            ['torneo_id' => 2, 'equipo_local_id' => 3, 'equipo_visitante_id' => 4, 'fecha' => '2024-08-27', 'hora' => '17:00:00', 'ubicacion' => 'Estadio Visitante', 'resultado' => '2-2'],
        ]);
    }
}
