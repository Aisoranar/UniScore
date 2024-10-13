<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'torneo_id',
        'equipo_local_id',
        'equipo_visitante_id',
        'match_date',
        'match_time',
        'local_score',
        'visitor_score',
        'location',
    ];

    /**
     * Relación con el modelo Torneo.
     * Un partido pertenece a un torneo.
     */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    /**
     * Relación con el equipo local.
     * Un partido pertenece a un equipo local.
     */
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    /**
     * Relación con el equipo visitante.
     * Un partido pertenece a un equipo visitante.
     */
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    /**
     * Relación con el modelo Estadistica.
     * Un partido tiene muchas estadísticas.
     */
    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}
