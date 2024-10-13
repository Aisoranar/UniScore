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
    // Cargar los equipos asociados al torneo
    $tournament->load('equipos');

    // Validar si hay equipos disponibles
    if ($tournament->equipos->isEmpty()) {
        return redirect()->back()->with('error', 'No hay equipos disponibles para programar un partido.');
    }

    // Mostrar la vista de creación de partido con el torneo y sus equipos
    return view('admin.matches.create', compact('tournament'));
}


    public function store(Request $request, Torneo $torneo)
    {
        // Verificar que los datos están llegando correctamente
        // dd($request->all());

        // Validar los datos del formulario
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'match_date' => 'required|date',
            'match_time' => 'required',
            'location' => 'nullable|string|max:255',
        ]);

        // Crear el partido asociado al torneo
        $torneo->partidos()->create([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'location' => $request->location,
        ]);

        return redirect()->route('tournaments.matches.index', ['tournament' => $torneo->id])
            ->with('success', 'Partido creado con éxito.');
    }

    public function edit(Torneo $torneo, Partido $partido)
    {
        return view('admin.matches.edit', compact('torneo', 'partido'));
    }

    public function update(Request $request, Torneo $torneo, Partido $partido)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'match_date' => 'required|date',
            'match_time' => 'required',
            'location' => 'nullable|string|max:255',
        ]);

        // Actualizar el partido
        $partido->update([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'location' => $request->location,
        ]);

        return redirect()->route('tournaments.matches.index', ['tournament' => $torneo->id])
            ->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy(Torneo $torneo, Partido $partido)
    {
        $partido->delete();

        return redirect()->route('tournaments.matches.index', ['tournament' => $torneo->id])
            ->with('success', 'Partido eliminado con éxito.');
    }
}
