<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TorneoFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'estado' => $this->faker->randomElement(['activo', 'finalizado']),
            'tipo'   => $this->faker->randomElement(['Liga', 'Copa']),  // Aseguramos que se incluya el tipo
        ];
    }
}
