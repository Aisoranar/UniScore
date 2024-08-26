<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('galeria')->insert([
            ['torneo_id' => 1, 'tipo' => 'foto', 'ruta' => 'images/torneo1_foto1.jpg'],
            ['torneo_id' => 1, 'tipo' => 'video', 'ruta' => 'videos/torneo1_video1.mp4'],
            ['torneo_id' => 2, 'tipo' => 'foto', 'ruta' => 'images/torneo2_foto1.jpg'],
        ]);
    }
}
