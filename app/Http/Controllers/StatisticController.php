<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use App\Models\Jugador;
use App\Models\Partido;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Partido $partido)
    {
        // Obtener estadísticas del partido con la información del jugador y su equipo
        $estadisticas = Estadistica::with('jugador.equipo')
                        ->where('partido_id', $partido->id)
                        ->get();

        // Obtener los jugadores de ambos equipos para poder agregar estadísticas
        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
                        ->with('equipo')
                        ->get();

        return view('admin.statistics.index', compact('estadisticas', 'partido', 'jugadores'));
    }

    public function create(Partido $partido)
    {
        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
                        ->with('equipo')
                        ->get();
        return view('admin.statistics.create', compact('partido', 'jugadores'));
    }

    public function store(Request $request, Partido $partido)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'goals' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $partido->estadisticas()->create($request->all());
        return redirect()->route('matches.statistics.index', ['match' => $partido->id])->with('success', 'Estadística creada con éxito.');
    }

    public function edit(Partido $partido, Estadistica $estadistica)
    {
        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
                        ->with('equipo')
                        ->get();
        return view('admin.statistics.edit', compact('partido', 'estadistica', 'jugadores'));
    }

    public function update(Request $request, Partido $partido, Estadistica $estadistica)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'goals' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $estadistica->update($request->all());
        return redirect()->route('matches.statistics.index', ['match' => $partido->id])->with('success', 'Estadística actualizada con éxito.');
    }

    public function destroy(Partido $partido, Estadistica $estadistica)
    {
        $estadistica->delete();
        return redirect()->route('matches.statistics.index', ['match' => $partido->id])->with('success', 'Estadística eliminada con éxito.');
    }
}
