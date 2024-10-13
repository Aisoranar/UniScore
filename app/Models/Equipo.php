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

    /**
     * Relación con el modelo Torneo
     * Un equipo pertenece a un torneo.
     */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    /**
     * Relación con el modelo Jugador
     * Un equipo tiene muchos jugadores.
     */
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    /**
     * Relación con el modelo Partido como equipo local
     * Un equipo puede jugar muchos partidos como local.
     */
    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    /**
     * Relación con el modelo Partido como equipo visitante
     * Un equipo puede jugar muchos partidos como visitante.
     */
    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
