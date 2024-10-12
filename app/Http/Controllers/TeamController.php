<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Torneo $torneo)
    {
        $equipos = $torneo->equipos;
        return view('admin.teams.index', compact('torneo', 'equipos'));
    }

    public function create(Torneo $torneo)
    {
        return view('admin.teams.create', compact('torneo'));
    }

    public function store(Request $request, Torneo $torneo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach' => 'nullable|string|max:255',
        ]);

        $torneo->equipos()->create($request->all());
        return redirect()->route('teams.index', $torneo)->with('success', 'Equipo creado con éxito.');
    }

    public function edit(Torneo $torneo, Equipo $equipo)
    {
        return view('admin.teams.edit', compact('torneo', 'equipo'));
    }

    public function update(Request $request, Torneo $torneo, Equipo $equipo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach' => 'nullable|string|max:255',
        ]);

        $equipo->update($request->all());
        return redirect()->route('teams.index', $torneo)->with('success', 'Equipo actualizado con éxito.');
    }

    public function destroy(Torneo $torneo, Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('teams.index', $torneo)->with('success', 'Equipo eliminado con éxito.');
    }
}
