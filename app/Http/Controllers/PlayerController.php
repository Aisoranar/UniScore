<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::with('jugadores')->findOrFail($equipoId);
        $jugadores = $equipo->jugadores;

        return view('admin.players.index', compact('torneo', 'equipo', 'jugadores'));
    }

    public function create($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::findOrFail($equipoId);

        return view('admin.players.create', compact('torneo', 'equipo'));
    }

    public function store(Request $request, $torneoId, $equipoId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $equipo = Equipo::findOrFail($equipoId);
        $equipo->jugadores()->create($request->all());

        return redirect()->route('players.index', ['torneoId' => $torneoId, 'equipoId' => $equipoId])
                         ->with('success', 'Jugador creado con éxito.');
    }

    public function edit($torneoId, $equipoId, $jugadorId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::findOrFail($equipoId);
        $jugador = Jugador::findOrFail($jugadorId);

        return view('admin.players.edit', compact('torneo', 'equipo', 'jugador'));
    }

    public function update(Request $request, $torneoId, $equipoId, $jugadorId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $jugador = Jugador::findOrFail($jugadorId);
        $jugador->update($request->all());

        return redirect()->route('players.index', ['torneoId' => $torneoId, 'equipoId' => $equipoId])
                         ->with('success', 'Jugador actualizado con éxito.');
    }

    public function destroy($torneoId, $equipoId, $jugadorId)
    {
        $jugador = Jugador::findOrFail($jugadorId);
        $jugador->delete();

        return redirect()->route('players.index', ['torneoId' => $torneoId, 'equipoId' => $equipoId])
                         ->with('success', 'Jugador eliminado con éxito.');
    }
}
