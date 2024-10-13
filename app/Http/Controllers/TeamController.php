<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Listar equipos por torneo
    public function index($torneoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipos = Equipo::where('torneo_id', $torneoId)->get();

        return view('admin.teams.index', compact('torneo', 'equipos'));
    }

    // Formulario para registrar un nuevo equipo
    public function create($torneoId)
{
    $torneo = Torneo::findOrFail($torneoId);
    $torneos = Torneo::all(); // Obtener todos los torneos

    // Verificar si se alcanzó el número máximo de equipos
    if ($torneo->equipos->count() >= $torneo->number_of_teams) {//corregir
        return redirect()->route('teams.index', $torneoId)
                         ->with('error', 'No se pueden registrar más equipos en este torneo.');
    }

    return view('admin.teams.create', compact('torneo', 'torneos'));
}

    // Guardar el nuevo equipo y asociarlo al torneo
    public function store(Request $request, $torneoId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach' => 'nullable|string|max:255',
        ]);

        $torneo = Torneo::findOrFail($torneoId);

        // Verificar si se alcanzó el número máximo de equipos
        if ($torneo->equipos->count() >= $torneo->number_of_teams) {
            return redirect()->route('teams.index', $torneoId)
                             ->with('error', 'No se pueden registrar más equipos en este torneo.');
        }

        $torneo->equipos()->create($request->only(['name', 'coach']));

        return redirect()->route('teams.index', $torneoId)
                         ->with('success', 'Equipo registrado con éxito.');
    }

    // Formulario para editar un equipo
    public function edit($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);

        return view('admin.teams.edit', compact('torneo', 'equipo'));
    }

    // Actualizar los datos del equipo
    public function update(Request $request, $torneoId, $equipoId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach' => 'nullable|string|max:255',
        ]);

        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);
        $equipo->update($request->only(['name', 'coach']));

        return redirect()->route('teams.index', $torneoId)
                         ->with('success', 'Equipo actualizado con éxito.');
    }

    // Eliminar un equipo del torneo
    public function destroy($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId);
        $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);

        // Verificar si el equipo pertenece al torneo
        if ($equipo->torneo_id != $torneoId) {
            return redirect()->route('teams.index', $torneoId)
                             ->with('error', 'El equipo no pertenece a este torneo.');
        }

        // Eliminar jugadores asociados al equipo
        $equipo->jugadores()->delete();

        // Eliminar el equipo
        $equipo->delete();

        return redirect()->route('teams.index', $torneoId)
                         ->with('success', 'Equipo eliminado con éxito.');
    }
}
