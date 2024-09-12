<?php

namespace Database\Factories;

use App\Models\Jugador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    protected $model = Jugador::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'edad' => $this->faker->numberBetween(18, 35),  // Definir un rango de edades para los jugadores
            'posicion' => $this->faker->randomElement(['Portero', 'Defensa', 'Centrocampista', 'Delantero']),
            'equipo_id' => \App\Models\Equipo::factory(),
        ];
    }
}
