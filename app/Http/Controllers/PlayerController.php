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
    $equipo = Equipo::with('jugadores')->findOrFail($equipoId); // Carga los jugadores relacionados
    $torneo = Torneo::findOrFail($torneoId);
    $equipos = Equipo::all(); // Cargar todos los equipos para la navegación

    return view('admin.players.index', compact('equipo', 'torneo', 'equipos')); // Asegúrate de incluir $equipos aquí
}





    // Formulario para crear un nuevo jugador
    public function create($torneoId, $equipoId)
{
    $torneo = Torneo::findOrFail($torneoId);
    $equipo = Equipo::where('torneo_id', $torneoId)->findOrFail($equipoId);
    
    // Cargar todos los equipos
    $equipos = Equipo::all(); 

    return view('admin.players.create', compact('torneo', 'equipo', 'equipos'));
}


    // Guardar un nuevo jugador y asociarlo al equipo y torneo
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|integer',
        'position' => 'required|string',
        'equipo_id' => 'required|exists:equipos,id', // Validación
    ]);

    $jugador = new Jugador();
    $jugador->name = $request->name;
    $jugador->number = $request->number;
    $jugador->position = $request->position;
    $jugador->equipo_id = $request->equipo_id; // Asignar el equipo
    $jugador->save();

    return redirect()->route('players.index', ['torneoId' => $request->torneoId, 'equipoId' => $request->equipo_id])
                     ->with('success', 'Jugador agregado exitosamente.');
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
