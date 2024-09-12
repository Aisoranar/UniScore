<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Goleador;
use App\Models\Torneo;
use App\Models\Partido;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function home()
    {
        return view('public.index');
    }

    public function index()
    {
        $torneos = Torneo::where('estado', 'activo')->paginate(10);
        return view('public.index', compact('torneos'));
    }

    public function torneos()
    {
        $torneos = Torneo::paginate(10);
        return view('public.torneo', compact('torneos'));
    }

    public function showTorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('public.torneo', compact('torneo'));
    }

    public function clasificacion()
    {
        // Ordenamos por puntos de forma descendente y luego por otros criterios si es necesario
        $clasificacion = Equipo::orderBy('puntos', 'desc')
                               ->orderBy('partidos_ganados', 'desc')
                               ->orderBy('partidos_empatados', 'desc')
                               ->paginate(10);

        return view('public.clasificacion', compact('clasificacion'));
    }

    public function actualizarResultado(Request $request, Partido $partido)
{
    $request->validate([
        'resultado' => 'required|string', // "local" o "visitante" o "empate"
        'goles_local' => 'required|integer',
        'goles_visitante' => 'required|integer',
    ]);

    // Actualiza el resultado del partido
    $partido->resultado = $request->input('resultado');
    $partido->goles_local = $request->input('goles_local');
    $partido->goles_visitante = $request->input('goles_visitante');
    $partido->save();

    // Actualiza las estadísticas de los equipos involucrados
    $equipoLocal = $partido->equipoLocal;
    $equipoVisitante = $partido->equipoVisitante;

    // Actualizamos goles
    $equipoLocal->goles_favor += $partido->goles_local;
    $equipoLocal->goles_contra += $partido->goles_visitante;
    $equipoVisitante->goles_favor += $partido->goles_visitante;
    $equipoVisitante->goles_contra += $partido->goles_local;

    // Actualizamos diferencia de goles
    $equipoLocal->diferencia_goles = $equipoLocal->goles_favor - $equipoLocal->goles_contra;
    $equipoVisitante->diferencia_goles = $equipoVisitante->goles_favor - $equipoVisitante->goles_contra;

    // Se actualizan los partidos ganados/perdidos/empatados
    // (Mantiene la lógica previa que ya has implementado)

    $equipoLocal->save();
    $equipoVisitante->save();

    return redirect()->route('partidos.index')->with('success', 'Resultado actualizado y estadísticas recalculadas.');
}

    public function equipos()
    {
        $equipos = Equipo::with('jugadores')->paginate(10);
        return view('public.equipos', compact('equipos'));
    }

    public function goleadores()
{
    $goleadores = Goleador::with(['jugador.equipo']) // Load the relationships
        ->with(['jugador.equipo' => function($query) {
            $query->withCount(['partidos as partidos_jugados' => function($query) {
                $query->whereNotNull('resultado'); // Count only matches with a result
            }]);
        }])
        ->orderBy('goles', 'desc')
        ->paginate(10);

    return view('public.goleadores', compact('goleadores'));
}

    
    

    public function galeria()
    {
        $galerias = Torneo::with('galeria')->paginate(10);
        return view('public.galeria', compact('galerias'));
    }
}
