<?php

namespace Database\Seeders;

use App\Models\Goleador;
use App\Models\Jugador;
use Illuminate\Database\Seeder;

class GoleadorSeeder extends Seeder
{
    public function run()
    {
        // Creamos goleadores para los jugadores
        Jugador::all()->each(function ($jugador) {
            Goleador::factory()->create([
                'jugador_id' => $jugador->id,
            ]);
        });
    }
}
