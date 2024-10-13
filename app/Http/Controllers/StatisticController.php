<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use App\Models\Jugador;
use App\Models\Partido;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    // Listar estadísticas del partido
    public function index(Partido $partido)
    {
        if (!isset($partido->equipo_local_id) || !isset($partido->equipo_visitante_id)) {
            return redirect()->back()->withErrors('El partido no tiene equipos asignados.');
        }

        $estadisticas = Estadistica::with('jugador.equipo')
            ->where('partido_id', $partido->id)
            ->get();

        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
            ->with('equipo')
            ->get();

        return view('admin.statistics.index', compact('estadisticas', 'partido', 'jugadores'));
    }

    // Crear nuevas estadísticas para un partido
    public function create(Partido $partido)
    {
        if (!isset($partido->equipo_local_id) || !isset($partido->equipo_visitante_id)) {
            return redirect()->back()->withErrors('El partido no tiene equipos asignados.');
        }

        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
            ->with('equipo')
            ->get();

        return view('admin.statistics.create', compact('partido', 'jugadores'));
    }

    // Guardar una nueva estadística
    public function store(Request $request, Partido $partido)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'goals' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $partido->estadisticas()->create($request->all());

        return redirect()->route('admin.matches.statistics.index', ['match' => $partido->id])
            ->with('success', 'Estadística creada con éxito.');
    }

    // Editar estadísticas de un partido
    public function edit(Partido $partido, Estadistica $estadistica)
    {
        $jugadores = Jugador::whereIn('equipo_id', [$partido->equipo_local_id, $partido->equipo_visitante_id])
            ->with('equipo')
            ->get();

        return view('admin.statistics.edit', compact('partido', 'estadistica', 'jugadores'));
    }

    // Actualizar una estadística
    public function update(Request $request, Partido $partido, Estadistica $estadistica)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'goals' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $estadistica->update($request->all());

        return redirect()->route('admin.matches.statistics.index', ['match' => $partido->id])
            ->with('success', 'Estadística actualizada con éxito.');
    }

    // Eliminar una estadística
    public function destroy(Partido $partido, Estadistica $estadistica)
    {
        $estadistica->delete();

        return redirect()->route('admin.matches.statistics.index', ['match' => $partido->id])
            ->with('success', 'Estadística eliminada con éxito.');
    }
}
