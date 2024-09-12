<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EquipoSeeder::class,
            JugadorSeeder::class,
            GoleadorSeeder::class,
            TorneoSeeder::class,
            PartidoSeeder::class,
        ]);
    }
}
