<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index($torneoId)
{
    $torneo = Torneo::findOrFail($torneoId);
    $equipos = $torneo->equipos()->with('jugadores')->get(); // Cargar jugadores de cada equipo

    return view('admin.equipos.index', compact('torneo', 'equipos'));
}


    public function create($torneoId)
    {
        $torneo = Torneo::findOrFail($torneoId);

        return view('admin.equipos.create', compact('torneo'));
    }

    public function store(Request $request, $torneoId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puntos' => 'nullable|integer',
        ]);

        $torneo = Torneo::findOrFail($torneoId);

        $equipo = new Equipo([
            'nombre' => $request->input('nombre'),
            'puntos' => $request->input('puntos', 0),
            'torneo_id' => $torneo->id,
        ]);

        $equipo->save();

        return redirect()->route('admin.equipos.index', ['torneoId' => $torneo->id])
                         ->with('success', 'Equipo creado con éxito.');
    }

    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);

        return view('admin.equipos.show', compact('equipo'));
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);

        return view('admin.equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puntos' => 'nullable|integer',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update([
            'nombre' => $request->input('nombre'),
            'puntos' => $request->input('puntos', 0),
        ]);

        return redirect()->route('admin.equipos.index', ['torneoId' => $equipo->torneo_id])
                         ->with('success', 'Equipo actualizado con éxito.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $torneoId = $equipo->torneo_id;
        $equipo->delete();

        return redirect()->route('admin.equipos.index', ['torneoId' => $torneoId])
                         ->with('success', 'Equipo eliminado con éxito.');
    }
}
