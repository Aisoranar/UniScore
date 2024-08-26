<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TorneoSeeder::class,
            EquipoSeeder::class,
            JugadorSeeder::class,
            PartidoSeeder::class,
            GaleriaSeeder::class,
            UserSeeder::class,
            GoleadorSeeder::class,
            AnotherTorneoSeeder::class,
            AnotherEquipoSeeder::class,
            AnotherJugadorSeeder::class,
        ]);
    }
}
