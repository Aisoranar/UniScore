<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goleador extends Model
{
    use HasFactory;
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
