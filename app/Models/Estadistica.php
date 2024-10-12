<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;

    protected $fillable = [
        'jugador_id',
        'partido_id',
        'goals',
        'yellow_cards',
        'red_cards',
    ];

    // Relación con Jugador
    public function jugador()
    {
        return $this->belongsTo(Jugador::class);
    }

    // Relación con Partido
    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
