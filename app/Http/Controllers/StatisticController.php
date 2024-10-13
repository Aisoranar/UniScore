<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use App\Models\Partido;
use App\Models\Jugador;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        // Cargamos las estadísticas con las relaciones necesarias.
        $estadisticas = Estadistica::with(['jugador', 'jugador.equipo', 'partido.equipoLocal', 'partido.equipoVisitante'])
            ->get()
            ->groupBy('partido_id'); // Agrupamos solo por partido_id
    
        // Devolver la vista con las estadísticas agrupadas.
        return view('admin.statistics.index', compact('estadisticas'));
    }

    public function create()
    {
        $jugadores = Jugador::all();
        $partidos = Partido::all();
        return view('admin.statistics.create', compact('jugadores', 'partidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'partido_id' => 'required|exists:partidos,id',
            'goals' => 'required|integer|min:0',
            'yellow_cards' => 'required|integer|min:0',
            'red_cards' => 'required|integer|min:0',
        ]);

        Estadistica::create($request->all());

        return redirect()->route('statistics.index')->with('success', 'Estadística agregada correctamente.');
    }

    public function edit($id)
    {
        $estadistica = Estadistica::findOrFail($id);
        $jugadores = Jugador::all();
        $partidos = Partido::all();
        return view('admin.statistics.edit', compact('estadistica', 'jugadores', 'partidos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'partido_id' => 'required|exists:partidos,id',
            'goals' => 'required|integer|min:0',
            'yellow_cards' => 'required|integer|min:0',
            'red_cards' => 'required|integer|min:0',
        ]);

        $estadistica = Estadistica::findOrFail($id);
        $estadistica->update($request->all());

        return redirect()->route('statistics.index')->with('success', 'Estadística actualizada correctamente.');
    }

    public function destroy($id)
    {
        $estadistica = Estadistica::findOrFail($id);
        $estadistica->delete();

        return redirect()->route('statistics.index')->with('success', 'Estadística eliminada correctamente.');
    }
}
