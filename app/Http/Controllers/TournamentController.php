<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    // Muestra la lista de torneos
    public function index()
    {
        $torneos = Torneo::with('equipos', 'partidos')->get();
        return view('admin.tournaments.index', compact('torneos'));
    }

    // Muestra el formulario para crear un nuevo torneo
    public function create()
    {
        return view('admin.tournaments.create');
    }

    // Almacena un nuevo torneo en la base de datos
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

        Torneo::create($request->only([
            'name',
            'sport_type',
            'tournament_type',
            'number_of_teams',
            'start_date',
            'end_date'
        ]));

        return redirect()->route('tournaments.index')->with('success', 'Torneo creado con éxito.');
    }

    // Muestra los detalles de un torneo específico
    public function show($id)
    {
        $torneo = Torneo::with('equipos.jugadores', 'partidos')->findOrFail($id);
        return view('admin.tournaments.show', compact('torneo'));
    }

    // Muestra el formulario para editar un torneo existente
    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('admin.tournaments.edit', compact('torneo'));
    }

    // Actualiza un torneo existente en la base de datos
    public function update(Request $request, $id)
    {
        $torneo = Torneo::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'sport_type' => 'required|string|max:255',
            'tournament_type' => 'required|string|max:255',
            'number_of_teams' => 'required|integer|min:2',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $torneo->update($request->only([
            'name',
            'sport_type',
            'tournament_type',
            'number_of_teams',
            'start_date',
            'end_date'
        ]));

        return redirect()->route('tournaments.index')->with('success', 'Torneo actualizado con éxito.');
    }

    // Elimina un torneo de la base de datos
    public function destroy($id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route('tournaments.index')->with('success', 'Torneo eliminado con éxito.');
    }
}
