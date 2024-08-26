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
    // Utiliza paginate en lugar de get() o all()
    $torneos = Torneo::where('estado', 'activo')->paginate(10); // Pagina 10 torneos por página
    return view('public.index', compact('torneos'));
}

public function torneos()
{
    $torneos = Torneo::paginate(10); // Pagina 10 torneos por página
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

    // Nueva función para mostrar los equipos
    public function equipos($id)
    {
        $torneo = Torneo::findOrFail($id);
        $equipos = $torneo->equipos;
        return view('public.equipos', compact('torneo', 'equipos'));
    }

    // Nueva función para mostrar los goleadores
    public function goleadores($id)
{
    $torneo = Torneo::findOrFail($id);
    $goleadores = $torneo->goleadores()->orderBy('goles', 'desc')->get();
    return view('public.goleadores', compact('torneo', 'goleadores'));
}



    // Nueva función para mostrar fotos y videos
    public function galeria($id)
    {
        $torneo = Torneo::findOrFail($id);
        $galeria = $torneo->galeria; // Asegúrate de que esta relación esté definida en el modelo Torneo
        return view('public.galeria', compact('torneo', 'galeria'));
    }
}
