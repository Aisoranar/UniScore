<?php

namespace App\Http\Controllers;

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
        $torneos = Torneo::where('estado', 'activo')->get();
        return view('public.index', compact('torneos'));
    }
    public function torneos()
{
    $torneos = Torneo::all(); // Obtén todos los torneos
    return view('public.torneo', compact('torneos'));
}



    public function showTorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('public.torneo', compact('torneo'));
    }

    public function clasificacion($id)
    {
        $torneo = Torneo::findOrFail($id);
        $clasificacion = $torneo->equipos()->orderBy('puntos', 'desc')->get();
        return view('public.clasificacion', compact('torneo', 'clasificacion'));
    }

    public function proximosPartidos($id)
    {
        $torneo = Torneo::findOrFail($id);
        $partidos = $torneo->partidos()->where('fecha', '>=', now())->get();
        return view('public.partidos', compact('torneo', 'partidos'));
    }
}
