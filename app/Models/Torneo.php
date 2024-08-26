<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'tipo', 'genero', 'estado'
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }
    public function goleadores()
{
    return $this->hasMany(Goleador::class);
}

    public function galeria()
    {
        return $this->hasMany(Galeria::class, 'torneo_id');
    }

}
