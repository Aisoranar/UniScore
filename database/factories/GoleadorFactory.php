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
            'jugador_id' => \App\Models\Jugador::factory(), // Relación con un jugador
            'goles' => $this->faker->numberBetween(5, 50),
            'torneo_id' => \App\Models\Torneo::factory(),  // Relación con un torneo
        ];
    }
}
