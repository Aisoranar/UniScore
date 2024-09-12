<?php

namespace App\Http\Controllers;

use App\Models\Equipo; // Importar el modelo de Equipo
use App\Models\Goleador; // Importar el modelo de Goleador
use App\Models\Torneo;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.index'); // Vista principal pública
    }

    public function index()
    {
        // Paginación de torneos activos
        $torneos = Torneo::where('estado', 'activo')->paginate(10);
        return view('public.index', compact('torneos'));
    }

    public function torneos()
    {
        $torneos = Torneo::paginate(10); // Paginación de torneos
        return view('public.torneo', compact('torneos'));
    }

    public function showTorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('public.torneo', compact('torneo'));
    }

    // Mostrar clasificación de todos los equipos con paginación
    public function clasificacion()
    {
        $clasificacion = Equipo::orderBy('puntos', 'desc')->paginate(10); // Paginación de clasificación
        return view('public.clasificacion', compact('clasificacion'));
    }

    // Mostrar todos los equipos con paginación
    public function equipos()
    {
        // Paginar 10 equipos por página
        $equipos = Equipo::with('jugadores')->paginate(10);
        return view('public.equipos', compact('equipos'));
    }

    // Mostrar todos los goleadores con paginación
    public function goleadores()
    {
        $goleadores = Goleador::with('jugador') // Relación jugador
                               ->orderBy('goles', 'desc')
                               ->paginate(10); // Paginación de goleadores
        return view('public.goleadores', compact('goleadores'));
    }

    // Mostrar galería de fotos y videos con paginación
    public function galeria()
    {
        $galerias = Torneo::with('galeria')->paginate(10); // Paginación de galería
        return view('public.galeria', compact('galerias'));
    }
}
