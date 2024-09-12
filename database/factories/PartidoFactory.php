<?php

namespace Database\Factories;

use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartidoFactory extends Factory
{
    protected $model = Partido::class;

    public function definition()
    {
        return [
            'equipo_local_id' => null, // Lo asignaremos después
            'equipo_visitante_id' => null, // Lo asignaremos después
            'goles_local' => $this->faker->numberBetween(0, 5),
            'goles_visitante' => $this->faker->numberBetween(0, 5),
            'resultado' => $this->faker->randomElement(['local', 'visitante', 'empate']),
        ];
    }
}
