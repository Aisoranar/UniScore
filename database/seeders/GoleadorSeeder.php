<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Goleador;

class GoleadorSeeder extends Seeder
{
    public function run()
    {
        // Generar 10 goleadores con la factory
        Goleador::factory(10)->create();
    }
}
