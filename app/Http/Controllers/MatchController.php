<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index($torneoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $partidos = Partido::where('torneo_id', $torneoId)->get();

        return view('admin.matches.index', compact('torneo', 'partidos'));
    }

    public function create(Torneo $tournament)
    {
        $tournament->load('equipos');

        if ($tournament->equipos->isEmpty()) {
            return redirect()->back()->with('error', 'No hay equipos disponibles para programar un partido.');
        }

        return view('admin.matches.create', compact('tournament'));
    }

    public function store(Request $request, Torneo $tournament)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $tournament->partidos()->create([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'match_date' => $request->fecha,
            'match_time' => $request->hora,
            'location' => $request->ubicacion,
        ]);

        return redirect()->route('tournaments.matches.index', ['tournament' => $tournament->id])
            ->with('success', 'Partido creado con éxito.');
    }

    public function edit(Torneo $tournament, $matchId)
{
    // Intenta cargar el partido por el ID
    $partido = Partido::find($matchId);

    if (!$partido) {
        return redirect()->back()->withErrors('Partido no encontrado');
    }

    $tournament->load('equipos');
    return view('admin.matches.edit', compact('tournament', 'partido'));
}


    public function update(Request $request, Torneo $tournament, Partido $partido)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $partido->update([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'match_date' => $request->fecha,
            'match_time' => $request->hora,
            'location' => $request->ubicacion,
        ]);

        return redirect()->route('tournaments.matches.index', ['tournament' => $tournament->id])
            ->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy(Torneo $tournament, Partido $partido)
    {
        $partido->delete();

        return redirect()->route('tournaments.matches.index', ['tournament' => $tournament->id])
            ->with('success', 'Partido eliminado con éxito.');
    }
}
