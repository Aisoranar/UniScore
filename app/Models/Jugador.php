<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    protected $fillable = [
        'nombre', 
        'edad', 
        'posicion', 
        'equipo_id', 
        'tarjetas_amarillas', 
        'tarjetas_rojas', 
        'goles'
    ];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function goleadores(): HasMany
    {
        return $this->hasMany(Goleador::class, 'jugador_id', 'id');
    }
}
