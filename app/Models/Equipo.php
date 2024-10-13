<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'torneo_id',
        'coach',
    ];

    // Relación con el modelo Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // Relación con el modelo Jugador
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    // Relación con partidos en los que participa como equipo local
    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    // Relación con partidos en los que participa como equipo visitante
    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
