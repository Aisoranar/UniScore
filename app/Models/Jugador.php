<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'equipo_id',
        'number',
        'position',
    ];

    // Relación con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // Relación con Estadísticas
    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}
