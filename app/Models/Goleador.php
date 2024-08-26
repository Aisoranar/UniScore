<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goleador extends Model
{
    protected $fillable = ['jugador_id', 'torneo_id', 'goles'];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'jugador_id', 'id');
    }
}
