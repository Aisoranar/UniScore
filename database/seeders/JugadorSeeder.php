<?php

namespace Database\Seeders;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Database\Seeder;

class JugadorSeeder extends Seeder
{
    public function run()
    {
        // Creamos equipos con jugadores
        Equipo::factory(10)->create()->each(function ($equipo) {
            $equipo->jugadores()->saveMany(Jugador::factory(11)->make());
        });
    }
}
