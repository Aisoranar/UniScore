<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'tipo', 
        'genero', 
        'estado'
    ];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }

    public function partidos(): HasMany
    {
        return $this->hasMany(Partido::class);
    }

    public function goleadores(): HasMany
    {
        return $this->hasMany(Goleador::class);
    }

    public function galeria(): HasMany
    {
        return $this->hasMany(Galeria::class, 'torneo_id');
    }
}
