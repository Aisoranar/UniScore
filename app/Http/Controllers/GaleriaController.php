<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);
        $galeria = $torneo->galeria; // Obtiene las imágenes y videos del torneo

        return view('public.galeria', compact('torneo', 'galeria'));
    }
}
