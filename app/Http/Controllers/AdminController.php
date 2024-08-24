<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $torneos = Torneo::all();
        return view('admin.index', compact('torneos'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $torneo = Torneo::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Torneo creado exitosamente.');
    }

    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('admin.show', compact('torneo'));
    }

    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('admin.edit', compact('torneo'));
    }

    public function update(Request $request, $id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Torneo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Torneo eliminado exitosamente.');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('cedula', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['cedula' => 'Cédula o contraseña incorrecta.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
