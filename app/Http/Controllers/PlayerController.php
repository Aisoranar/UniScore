<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Torneo $torneo, Equipo $equipo)
    {
        $jugadores = $equipo->jugadores;
        return view('admin.players.index', compact('torneo', 'equipo', 'jugadores'));
    }

    public function create(Torneo $torneo, Equipo $equipo)
    {
        return view('admin.players.create', compact('torneo', 'equipo'));
    }

    public function store(Request $request, Torneo $torneo, Equipo $equipo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $equipo->jugadores()->create($request->all());
        return redirect()->route('players.index', ['torneo' => $torneo->id, 'equipo' => $equipo->id])
                         ->with('success', 'Jugador creado con éxito.');
    }

    public function edit(Torneo $torneo, Equipo $equipo, Jugador $jugador)
    {
        return view('admin.players.edit', compact('torneo', 'equipo', 'jugador'));
    }

    public function update(Request $request, Torneo $torneo, Equipo $equipo, Jugador $jugador)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $jugador->update($request->all());
        return redirect()->route('players.index', ['torneo' => $torneo->id, 'equipo' => $equipo->id])
                         ->with('success', 'Jugador actualizado con éxito.');
    }

    public function destroy(Torneo $torneo, Equipo $equipo, Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('players.index', ['torneo' => $torneo->id, 'equipo' => $equipo->id])
                         ->with('success', 'Jugador eliminado con éxito.');
    }
}
