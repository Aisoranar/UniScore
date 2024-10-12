<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $torneos = Torneo::with('equipos', 'partidos')->get();
        return view('admin.tournaments.index', compact('torneos'));
    }

    public function create()
    {
        return view('admin.tournaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_type' => 'required|string|max:255',
            'tournament_type' => 'required|string|max:255',
            'number_of_teams' => 'required|integer|min:2',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Torneo::create($request->all());
        return redirect()->route('tournaments.index')->with('success', 'Torneo creado con éxito.');
    }

    public function show(Torneo $torneo)
    {
        $torneo->load('equipos.jugadores', 'partidos', 'partidos.estadisticas');
        return view('admin.tournaments.show', compact('torneo'));
    }

    public function edit(Torneo $torneo)
    {
        return view('admin.tournaments.edit', compact('torneo'));
    }

    public function update(Request $request, Torneo $torneo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_type' => 'required|string|max:255',
            'tournament_type' => 'required|string|max:255',
            'number_of_teams' => 'required|integer|min:2',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $torneo->update($request->all());
        return redirect()->route('tournaments.index')->with('success', 'Torneo actualizado con éxito.');
    }

    public function destroy(Torneo $torneo)
    {
        $torneo->delete();
        return redirect()->route('tournaments.index')->with('success', 'Torneo eliminado con éxito.');
    }
}
