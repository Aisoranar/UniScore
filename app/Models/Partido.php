<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 
        'hora', 
        'ubicacion', 
        'equipo_local_id', 
        'equipo_visitante_id', 
        'goles_local', 
        'goles_visitante', 
        'resultado'
    ];

    public function equipoLocal(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function torneo(): BelongsTo
    {
        return $this->belongsTo(Torneo::class);
    }

    public function actualizarResultado($golesLocal, $golesVisitante)
    {
        $this->resultado = "{$golesLocal} - {$golesVisitante}";
        $this->save();

        // Actualizar estadísticas de los equipos
        $equipoLocal = $this->equipoLocal;
        $equipoVisitante = $this->equipoVisitante;

        $equipoLocal->partidos_jugados++;
        $equipoVisitante->partidos_jugados++;

        if ($golesLocal > $golesVisitante) {
            $equipoLocal->partidos_ganados++;
            $equipoVisitante->partidos_perdidos++;
        } elseif ($golesLocal < $golesVisitante) {
            $equipoLocal->partidos_perdidos++;
            $equipoVisitante->partidos_ganados++;
        } else {
            $equipoLocal->partidos_empatados++;
            $equipoVisitante->partidos_empatados++;
        }

        // Actualizar puntos
        $equipoLocal->puntos = ($equipoLocal->partidos_ganados * 3) + $equipoLocal->partidos_empatados;
        $equipoVisitante->puntos = ($equipoVisitante->partidos_ganados * 3) + $equipoVisitante->partidos_empatados;

        // Guardar cambios
        $equipoLocal->save();
        $equipoVisitante->save();
    }
}
