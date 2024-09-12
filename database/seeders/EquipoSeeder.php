<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        // Creamos algunos torneos
        $torneos = Torneo::factory(5)->create();

        // Creamos equipos y les asignamos un torneo aleatorio
        Equipo::factory(10)->create([
            'torneo_id' => $torneos->random()->id, // Asignar torneo aleatorio a cada equipo
        ]);
    }
}
