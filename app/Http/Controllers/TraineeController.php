<?php

namespace App\Http\Controllers;

use App\Models\ProfileTrainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function show($user_id)
    {
        // Muestra el user_id que estás buscando para depuración
        dd($user_id);
    
        // Busca el perfil del trainee usando el user_id
        $profile = ProfileTrainee::where('user_id', $user_id)->first();
    
        if (!$profile) {
            return redirect()->back()->withErrors(['message' => 'Perfil no encontrado']);
        }
    
        return view('view.trainee.profile', [
            'data' => [
                'profile' => $profile,
            ]
        ]);
    }
    
    
    





    public function index()
    {
        if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'coach') {
            $trainees = ProfileTrainee::with('user')->get();
            return view('view.list.trainees', compact('trainees'));
        }

        return redirect()->route('home.index')->with('error', 'No tienes permiso para acceder a esta página.');
    }

    public function edit($id)
{
    // Agrega un dd para verificar el ID

    // Busca el perfil del trainee usando el ID
    $profile = ProfileTrainee::where('user_id', $id)->first(); 

    // Debug para verificar el perfil
    dd($profile); // Esto te mostrará el contenido del perfil

    if (!$profile) {
        abort(404, 'Perfil no encontrado');
    }

    return view('view.trainee.edit', compact('profile'));
}





public function update(Request $request, $user_id)
{
    $profile = ProfileTrainee::where('user_id', $user_id)->first();

    if (!$profile) {
        return redirect()->back()->withErrors(['message' => 'Perfil no encontrado']);
    }

    // Validar los datos
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'experience_level' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
    ]);

    // Actualizar el perfil
    $profile->update($validatedData);

    return redirect()->route('profile.show', $user_id)->with('success', 'Perfil actualizado exitosamente.');
}

}
