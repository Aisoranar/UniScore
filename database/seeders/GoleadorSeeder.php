<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoleadorSeeder extends Seeder
{
    public function run()
    {
        DB::table('goleadors')->insert([
            ['torneo_id' => 1, 'jugador_id' => 1, 'goles' => 5],
            ['torneo_id' => 1, 'jugador_id' => 3, 'goles' => 7],
            ['torneo_id' => 2, 'jugador_id' => 2, 'goles' => 3],
        ]);
    }
}
