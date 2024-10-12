<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Equipo $equipo)
    {
        $jugadores = $equipo->jugadores;
        return view('admin.players.index', compact('equipo', 'jugadores'));
    }

    public function create(Equipo $equipo)
    {
        return view('admin.players.create', compact('equipo'));
    }

    public function store(Request $request, Equipo $equipo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $equipo->jugadores()->create($request->all());
        return redirect()->route('players.index', $equipo)->with('success', 'Jugador creado con éxito.');
    }

    public function edit(Equipo $equipo, Jugador $jugador)
    {
        return view('admin.players.edit', compact('equipo', 'jugador'));
    }

    public function update(Request $request, Equipo $equipo, Jugador $jugador)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $jugador->update($request->all());
        return redirect()->route('players.index', $equipo)->with('success', 'Jugador actualizado con éxito.');
    }

    public function destroy(Equipo $equipo, Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('players.index', $equipo)->with('success', 'Jugador eliminado con éxito.');
    }
}
