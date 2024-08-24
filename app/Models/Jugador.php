<?php

// app/Models/Jugador.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'equipo_id', 'tarjetas_amarillas', 'tarjetas_rojas', 'goles'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
