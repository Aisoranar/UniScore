<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        $equipos = Equipo::all();

        // Creamos partidos entre equipos
        for ($i = 0; $i < 10; $i++) {
            Partido::factory()->create([
                'equipo_local_id' => $equipos->random()->id,
                'equipo_visitante_id' => $equipos->random()->id,
            ]);
        }
    }
}
