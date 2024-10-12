<?php

// App\Http\Controllers\HomeController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Pasar el nombre y el rol a la vista
        return view('home.index', [
            'name' => $user->name, // Asumiendo que tienes un campo 'name' en tu modelo User
            'role' => $user->role  // Asumiendo que tienes un campo 'role' en tu modelo User
        ]);
    }
}
