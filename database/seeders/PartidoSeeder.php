<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Torneo;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        // Obtener algunos torneos y equipos existentes
        $torneos = Torneo::all();
        $equipos = Equipo::all();

        // Crear 10 partidos asignando torneos y equipos aleatorios
        for ($i = 0; $i < 10; $i++) {
            Partido::create([
                'equipo_local_id' => $equipos->random()->id,
                'equipo_visitante_id' => $equipos->random()->id,
                'goles_local' => rand(0, 5),
                'goles_visitante' => rand(0, 5),
                'resultado' => rand(0, 1) == 0 ? 'local' : 'visitante',
                'torneo_id' => $torneos->random()->id,
                'fecha' => now()->subDays(rand(1, 30)),  // Fecha aleatoria en los últimos 30 días
                'hora' => now()->format('H:i'),  // Hora actual o aleatoria
                'ubicacion' => 'Estadio ' . rand(1, 5),  // Ejemplo de ubicación
            ]);
        }
    }
}
