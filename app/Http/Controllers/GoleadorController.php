<?php

namespace App\Http\Controllers;

use App\Models\Goleador;
use App\Models\Torneo;
use App\Models\Jugador;
use Illuminate\Http\Request;

class GoleadorController extends Controller
{
    /**
     * Muestra la lista de goleadores para un torneo específico.
     *
     * @param  int  $torneoId
     * @return \Illuminate\View\View
     */
    public function index($torneoId)
    {
        // Obtener el torneo
        $torneo = Torneo::findOrFail($torneoId);

        // Obtener todos los goleadores del torneo, ordenados por goles en orden descendente
        $goleadores = Goleador::with('jugador')
            ->where('torneo_id', $torneoId)
            ->orderBy('goles', 'desc')
            ->get();

        return view('public.goleadores', compact('torneo', 'goleadores'));
    }

    /**
     * Muestra el formulario para crear un nuevo goleador.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtener todos los torneos y jugadores para el formulario
        $torneos = Torneo::all();
        $jugadores = Jugador::all();
        return view('goleadores.create', compact('torneos', 'jugadores'));
    }

    /**
     * Almacena un nuevo goleador en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'torneo_id' => 'required|exists:torneos,id',
            'goles' => 'required|integer',
        ]);

        Goleador::create([
            'jugador_id' => $request->input('jugador_id'),
            'torneo_id' => $request->input('torneo_id'),
            'goles' => $request->input('goles'),
        ]);

        return redirect()->route('goleadores.index', $request->input('torneo_id'))->with('success', 'Goleador creado exitosamente.');
    }

    /**
     * Muestra la lista de goleadores para un torneo específico utilizando la lógica de agrupación.
     *
     * @param  int  $torneoId
     * @return \Illuminate\View\View
     */
    public function showGoleadores($torneoId)
{
    $torneo = Torneo::findOrFail($torneoId);

    // Obtener los jugadores del torneo con sus goles, agrupados y ordenados
    $goleadores = Jugador::whereHas('equipo', function ($query) use ($torneoId) {
        $query->where('torneo_id', $torneoId);
    })->select('nombre')
      ->selectRaw('SUM(goles) as goles')
      ->groupBy('nombre')
      ->orderBy('goles', 'desc')
      ->take(10)
      ->get();

    return view('public.goleadores', compact('torneo', 'goleadores'));
}


}
