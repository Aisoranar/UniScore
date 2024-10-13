<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(Torneo $torneo) {
        $partidos = Partido::where('torneo_id', $torneo->id)->get();
        return view('admin.matches.index', compact('torneo', 'partidos'));
    }
    


    public function create(Torneo $torneo)
    {
        return view('admin.matches.create', compact('torneo'));
    }

    public function store(Request $request, Torneo $torneo)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'match_date' => 'required|date',
            'match_time' => 'required',
            'location' => 'nullable|string|max:255',
        ]);

        $torneo->partidos()->create($request->all());
        return redirect()->route('matches.index', $torneo)->with('success', 'Partido creado con éxito.');
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

        $partido->update($request->all());
        return redirect()->route('matches.index', $torneo)->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy(Torneo $torneo, Partido $partido)
    {
        $partido->delete();
        return redirect()->route('matches.index', $torneo)->with('success', 'Partido eliminado con éxito.');
    }
}
