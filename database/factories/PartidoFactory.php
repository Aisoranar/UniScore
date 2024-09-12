<?php

namespace Database\Factories;

use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartidoFactory extends Factory
{
    protected $model = Partido::class;

    public function definition()
    {
        return [
            'equipo_local_id' => Equipo::factory(),
            'equipo_visitante_id' => Equipo::factory(),
            'goles_local' => $this->faker->numberBetween(0, 5),
            'goles_visitante' => $this->faker->numberBetween(0, 5),
            'resultado' => $this->faker->randomElement(['local', 'visitante', 'empate']),
            'torneo_id' => Torneo::factory(),
            'fecha' => $this->faker->date(),  // Genera una fecha aleatoria
            'hora' => $this->faker->time(),   // También puedes generar la hora si es necesario
        ];
    }
}
