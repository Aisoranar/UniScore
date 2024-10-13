<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    // Especificar el nombre correcto de la tabla
    protected $table = 'jugadores';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'equipo_id',
        'number',
        'position',
    ];

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // Relación con el modelo Estadistica (si aplica)
    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}
