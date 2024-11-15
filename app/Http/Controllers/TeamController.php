<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Mostrar todos los equipos de un torneo.
     */
    public function index($torneoId)
    {
        $torneo = Torneo::findOrFail($torneoId); // Encuentra el torneo o muestra un error 404.
        $equipos = $torneo->equipos()->get(); // Obtiene todos los equipos asociados al torneo.

        return view('admin.teams.index', compact('equipos', 'torneo'));
    }

    /**
     * Mostrar el formulario para crear un nuevo equipo.
     */
    public function create($torneoId)
    {
        $torneo = Torneo::findOrFail($torneoId); // Verifica que el torneo exista.

        return view('admin.teams.create', compact('torneo'));
    }

    /**
     * Guardar un nuevo equipo en la base de datos.
     */
    public function store(Request $request, $torneoId)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Valida que el nombre del equipo sea requerido y tenga un máximo de 255 caracteres.
            'coach' => 'nullable|string|max:255', // El campo entrenador es opcional.
        ]);

        $torneo = Torneo::findOrFail($torneoId); // Encuentra el torneo relacionado.

        $torneo->equipos()->create([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        return redirect()->route('admin.teams.index', $torneoId)->with('success', 'Equipo agregado correctamente.');
    }

    /**
     * Mostrar el formulario para editar un equipo existente.
     */
    public function edit($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId); // Encuentra el torneo relacionado.
        $equipo = Equipo::findOrFail($equipoId); // Encuentra el equipo a editar.

        return view('admin.teams.edit', compact('torneo', 'equipo'));
    }

    /**
     * Actualizar un equipo existente en la base de datos.
     */
    public function update(Request $request, $torneoId, $equipoId)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Valida que el nombre sea requerido.
            'coach' => 'nullable|string|max:255', // El campo entrenador es opcional.
        ]);

        $equipo = Equipo::findOrFail($equipoId); // Encuentra el equipo a actualizar.

        $equipo->update([
            'name' => $request->name,
            'coach' => $request->coach,
        ]);

        return redirect()->route('admin.teams.index', $torneoId)->with('success', 'Equipo actualizado correctamente.');
    }

    /**
     * Eliminar un equipo.
     */
    public function destroy($torneoId, $equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId); // Encuentra el equipo a eliminar.
        $equipo->delete(); // Elimina el equipo.

        return redirect()->route('admin.teams.index', $torneoId)->with('success', 'Equipo eliminado correctamente.');
    }

    /**
     * Mostrar los detalles de un equipo.
     */
    public function show($torneoId, $equipoId)
    {
        $torneo = Torneo::findOrFail($torneoId); // Encuentra el torneo relacionado.
        $equipo = Equipo::findOrFail($equipoId); // Encuentra el equipo a mostrar.

        return view('admin.teams.show', compact('torneo', 'equipo'));
    }
}
