<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    protected $model = Equipo::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'puntos' => $this->faker->numberBetween(0, 100),
            'goles_favor' => $this->faker->numberBetween(0, 100),
            'goles_contra' => $this->faker->numberBetween(0, 100),
            'partidos_ganados' => $this->faker->numberBetween(0, 30),
            'partidos_empatados' => $this->faker->numberBetween(0, 10),
            'diferencia_goles' => 0, // Calculado en el controlador
        ];
    }
}
