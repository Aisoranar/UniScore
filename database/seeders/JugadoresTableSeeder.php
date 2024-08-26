<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jugador;
use App\Models\Equipo; // Asegúrate de que el modelo Equipo esté importado

class JugadoresTableSeeder extends Seeder
{
    public function run()
    {
        // Puedes ajustar los datos de acuerdo a tus necesidades
        Jugador::create([
            'nombre' => 'Juan Pérez',
            'equipo_id' => 1, // Asegúrate de que este ID exista en la tabla de equipos
            'tarjetas_amarillas' => 1,
            'tarjetas_rojas' => 0,
            'goles' => 5
        ]);

        Jugador::create([
            'nombre' => 'Carlos Gómez',
            'equipo_id' => 1, // Asegúrate de que este ID exista en la tabla de equipos
            'tarjetas_amarillas' => 0,
            'tarjetas_rojas' => 1,
            'goles' => 7
        ]);
        
        // Agrega más jugadores según sea necesario
    }
}
