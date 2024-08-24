<?php

// app/Models/Equipo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'torneo_id', 'puntos'
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
        return $this->belongsToMany(Partido::class);
    }
}
