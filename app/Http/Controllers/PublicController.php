<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Estadistica;
use App\Models\Galeria;
use App\Models\Jugador;
use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Mostrar todos los torneos
    public function tournaments()
    {
        $tournaments = Torneo::all();
        return view('public.tournaments', compact('tournaments'));
    }

    // Mostrar todos los equipos
    public function teams()
    {
        $teams = Equipo::with('torneo')->get();
        return view('public.teams', compact('teams'));
    }

    // Mostrar todos los jugadores
    public function players()
    {
        $players = Jugador::with('equipo')->get();
        return view('public.players', compact('players'));
    }

    // Mostrar todos los partidos
    public function matches()
    {
        $matches = Partido::with(['equipoLocal', 'equipoVisitante', 'torneo'])->get();
        return view('public.matches', compact('matches'));
    }

    // Mostrar todos los resultados (partidos jugados)
    public function results()
    {
        $results = Partido::whereNotNull('local_score')->whereNotNull('visitor_score')->get();
        return view('public.results', compact('results'));
    }

    // Mostrar todas las estadísticas
    public function statistics()
    {
        $statistics = Estadistica::with(['jugador', 'partido'])->get();
        return view('public.statistics', compact('statistics'));
    }

    // Mostrar galería de imágenes
    public function gallery()
    {
        $gallery = Galeria::all();
        return view('public.gallery', compact('gallery'));
    }
}
