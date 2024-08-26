<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores'; // Asegúrate de que sea el nombre correcto de la tabla

    protected $fillable = [
        'nombre', 'equipo_id', 'tarjetas_amarillas', 'tarjetas_rojas', 'goles'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function goleadores()
    {
        return $this->hasMany(Goleador::class, 'jugador_id', 'id');
    }
}
