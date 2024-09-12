<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'partidos_perdidos'
    ];

    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function partidos()
    {
        return $this->belongsToMany(Partido::class)
                    ->withPivot('goles', 'es_local'); 
    }

    // C:\laragon\www\uniscore\app\Models\Equipo.php

public function actualizarEstadisticas()
{
    $partidos = $this->partidos;

    $this->partidos_jugados = $partidos->count();
    $this->partidos_ganados = $partidos->where('pivot.resultado', 'ganado')->count();
    $this->partidos_empatados = $partidos->where('pivot.resultado', 'empatado')->count();
    $this->partidos_perdidos = $this->partidos_jugados - $this->partidos_ganados - $this->partidos_empatados;

    // Calcular puntos
    $this->puntos = ($this->partidos_ganados * 3) + $this->partidos_empatados;

    // Calcular goles a favor y en contra
    $this->goles_favor = $partidos->sum('pivot.goles_local');  // Dependiendo de si es local o visitante
    $this->goles_contra = $partidos->sum('pivot.goles_visitante');

    // Calcular la diferencia de goles
    $this->diferencia_goles = $this->goles_favor - $this->goles_contra;

    $this->save();
}

}
