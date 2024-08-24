<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    // En tu controlador, por ejemplo, TorneoController.php
// En tu controlador, por ejemplo, TorneoController.php
    public function index(Request $request)
    {
        $query = Torneo::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%");
        }

        $torneos = $query->paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.torneos.partials.torneos_list', compact('torneos'))->render(),
                'pagination' => view('pagination::tailwind', ['paginator' => $torneos])->render()
            ]);
        }

        return view('admin.torneos.index', compact('torneos'));
    }




    public function create()
    {
        // Mostrar el formulario para crear un nuevo torneo
        return view('admin.torneos.create');
    }

    public function store(Request $request)
    {
        // Validar y crear un nuevo torneo
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:todos_contra_todos,grupos,eliminatorias_grupos',
            'genero' => 'required|in:masculino,femenino,mixto',
            'estado' => 'required|in:activo,finalizado'
        ]);

        Torneo::create($data);

        // Redirigir a la lista de torneos
        return redirect()->route('admin.torneos.index')->with('success', 'Torneo creado con éxito.');
    }

    public function show($id)
    {
        // Mostrar detalles de un torneo
        $torneo = Torneo::findOrFail($id);

        return view('admin.torneos.show', compact('torneo'));
    }

    public function edit($id)
    {
        // Editar un torneo existente
        $torneo = Torneo::findOrFail($id);

        return view('admin.torneos.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar un torneo existente
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:todos_contra_todos,grupos,eliminatorias_grupos',
            'genero' => 'required|in:masculino,femenino,mixto',
            'estado' => 'required|in:activo,finalizado'
        ]);

        $torneo = Torneo::findOrFail($id);
        $torneo->update($data);

        // Redirigir a la lista de torneos
        return redirect()->route('admin.torneos.index')->with('success', 'Torneo actualizado con éxito.');
    }

    public function destroy($id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true
            ]);
        }

        return redirect()->route('admin.torneos.index')->with('success', 'Torneo eliminado exitosamente');
    }
}
