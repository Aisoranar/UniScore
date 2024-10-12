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

    // Relación con Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // Relación con Equipo Local
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    // Relación con Equipo Visitante
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    // Relación con Estadísticas
    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}
