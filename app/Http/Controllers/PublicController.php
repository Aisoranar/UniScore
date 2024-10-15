<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Partido;
use App\Models\Jugador;
use App\Models\Estadistica;
use App\Models\Equipo;
use App\Models\Torneo;

class PublicController extends Controller
{
    /**
     * Mostrar la vista de la galería.
     */
    public function gallery()
    {
        $galerias = Galeria::all();
        return view('public.gallery', compact('galerias'));
    }

    /**
     * Mostrar la vista de los partidos.
     */
    public function matches()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();
        return view('public.matches', compact('partidos'));
    }

    /**
     * Mostrar la vista de los jugadores.
     */
    public function players()
    {
        $jugadores = Jugador::with('equipo')->get();
        $equipos = Equipo::all(); // Assuming you have an Equipo model for teams
        $torneo = Torneo::first(); // Replace with your logic to get the specific tournament
        return view('public.players', compact('jugadores', 'equipos', 'torneo'));
    }
    
    
    /**
     * Mostrar la vista de las estadísticas.
     */
    public function statistics()
    {
        $estadisticas = Estadistica::with(['jugador', 'jugador.equipo'])->get();
        return view('public.statistics', compact('estadisticas'));
    }

    /**
     * Mostrar la vista de los equipos.
     */
    public function teams($torneoId = null)
    {
        if ($torneoId) {
            // Si se pasa un ID de torneo, filtramos por ese torneo
            $torneo = Torneo::findOrFail($torneoId);
            $equipos = Equipo::where('torneo_id', $torneoId)->with('torneo')->get(); // Filtrar equipos por torneo
        } else {
            // Si no hay un torneo específico, obtenemos todos los equipos con sus torneos
            $equipos = Equipo::with('torneo')->get(); // Cargar equipos con su torneo
        }
    
        return view('public.teams', compact('equipos'));
    }
    
    
    

    /**
     * Mostrar la vista de los torneos.
     */
    public function tournaments()
    {
        $torneos = Torneo::all();
        return view('public.tournaments', compact('torneos'));
    }

    /**
     * Mostrar la vista de los resultados.
     */
    public function results()
    {
        $estadisticas = Estadistica::with(['jugador', 'jugador.equipo'])->get();
        return view('public.statistics', compact('estadisticas'));
    }

    public function inicio()
{
    return view('public.inicio'); // Devuelve la vista de inicio
}
}
