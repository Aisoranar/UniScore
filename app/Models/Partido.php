<?php

// app/Models/Partido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 'hora', 'ubicacion', 'equipo_local_id', 'equipo_visitante_id', 'resultado'
    ];

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }
}
