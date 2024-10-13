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

    // Relación con el modelo Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // Relación con el equipo local
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    // Relación con el equipo visitante
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    // Relación con el modelo Estadistica
    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }

    
}
