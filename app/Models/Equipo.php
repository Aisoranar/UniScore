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

    // Relación con Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // Relación con Jugadores
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    // Relación con Partidos como equipo local
    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    // Relación con Partidos como equipo visitante
    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
