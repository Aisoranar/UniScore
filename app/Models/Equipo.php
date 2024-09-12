<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'torneo_id', 
        'puntos', 
        'partidos_jugados', 
        'partidos_ganados', 
        'partidos_empatados', 
        'partidos_perdidos',
        'goles_favor', 
        'goles_contra', 
        'diferencia_goles'
    ];

    public function jugadores(): HasMany
    {
        return $this->hasMany(Jugador::class);
    }

    public function torneo(): BelongsTo
    {
        return $this->belongsTo(Torneo::class);
    }

    public function partidos(): HasMany
    {
        return $this->hasMany(Partido::class, 'equipo_local_id')
            ->orWhere('equipo_visitante_id', $this->id);
    }

    public function actualizarEstadisticas()
    {
        $partidos = $this->partidos;

        $this->partidos_jugados = $partidos->count();
        $this->partidos_ganados = $partidos->where('resultado', 'ganado')->count();
        $this->partidos_empatados = $partidos->where('resultado', 'empatado')->count();
        $this->partidos_perdidos = $this->partidos_jugados - $this->partidos_ganados - $this->partidos_empatados;

        // Calcular puntos
        $this->puntos = ($this->partidos_ganados * 3) + $this->partidos_empatados;

        // Calcular goles a favor y en contra
        $this->goles_favor = $partidos->sum('goles_local');  // Dependiendo de si es local o visitante
        $this->goles_contra = $partidos->sum('goles_visitante');

        // Calcular la diferencia de goles
        $this->diferencia_goles = $this->goles_favor - $this->goles_contra;

        $this->save();
    }
}
