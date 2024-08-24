<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        // Redirige a la página de inicio si el usuario ya está autenticado
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // Obtener credenciales del formulario
        $credentials = [
            'cedula' => $request->input('cedula'),
            'password' => $request->input('password'),
        ];

        // Validar según el rol seleccionado (user o admin)
        if ($request->role === 'admin') {
            if (!Auth::guard('admin')->attempt($credentials)) {
                return redirect()->back()->withErrors('Cédula y/o Contraseña incorrectos para Administrador')->withInput();
            }

            $admin = Auth::guard('admin')->user();
            return $this->authenticated($request, $admin, '/admin');
        } else {
            if (!Auth::guard('web')->attempt($credentials)) {
                return redirect()->back()->withErrors('Cédula y/o Contraseña incorrectos para Usuario')->withInput();
            }

            $user = Auth::guard('web')->user();
            return $this->authenticated($request, $user, '/home');
        }
    }

    protected function authenticated(Request $request, $user, $redirectPath)
    {
        // Redirige al usuario a la ruta deseada después de la autenticación
        return redirect()->intended($redirectPath);
    }

    public function logout(Request $request)
    {
        // Cierra la sesión del usuario para el guardia actual
        Auth::guard($request->guard ?? 'web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Cierre de sesión exitoso.');
    }
}
