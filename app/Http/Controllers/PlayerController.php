<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // Listar jugadores por torneo y equipo
    public function index($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::with('jugadores')->where('torneo_id', $torneoId)->findOrFail($equipoId);
        $jugadores = $equipo->jugadores;

        return view('admin.players.index', compact('torneo', 'equipo', 'jugadores'));
    }

    // Formulario para crear un nuevo jugador
    public function create($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);

        return view('admin.players.create', compact('torneo', 'equipo'));
    }

    // Guardar un nuevo jugador y asociarlo al equipo y torneo
    public function store(Request $request, $torneoId, $equipoId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer',
            'position' => 'required|string',
        ]);

        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);
        $equipo->jugadores()->create($request->all());

        return redirect()->route('players.index', ['torneoId' => $torneoId, 'equipoId' => $equipoId])
                         ->with('success', 'Jugador creado con éxito.');
    }

    // Formulario para editar un jugador existente
    public function edit($torneoId, $equipoId, $jugadorId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);
        $jugador = Jugador::findOrFail($jugadorId);

        return view('admin.players.edit', compact('torneo', 'equipo', 'jugador'));
    }

    // Actualizar los datos del jugador
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

    // Eliminar un jugador
    public function destroy($torneoId, $equipoId, $jugadorId)
    {
        $jugador = Jugador::findOrFail($jugadorId);
        $jugador->delete();

        return redirect()->route('players.index', ['torneoId' => $torneoId, 'equipoId' => $equipoId])
                         ->with('success', 'Jugador eliminado con éxito.');
    }
}
