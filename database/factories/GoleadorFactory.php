<?php

namespace Database\Factories;

use App\Models\Goleador;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoleadorFactory extends Factory
{
    protected $model = Goleador::class;

    public function definition()
    {
        return [
            'jugador_id' => null, // Lo asignaremos después
            'goles' => $this->faker->numberBetween(1, 50),
        ];
    }
}
