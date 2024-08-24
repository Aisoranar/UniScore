<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
|
*/

// Ruta principal (página de bienvenida)
Route::get('/', [PublicController::class, 'home'])->name('home');

// Rutas de Registro de Usuarios
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Rutas de Login de Usuarios
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Ruta de Inicio después del Login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta de Logout para cerrar sesión
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas Públicas para ver los torneos y detalles
Route::get('/torneos', [PublicController::class, 'index'])->name('torneos.index');
Route::get('/torneos/{id}', [PublicController::class, 'showTorneo'])->name('torneos.show');
Route::get('/clasificacion/{id}', [PublicController::class, 'clasificacion'])->name('clasificacion');
Route::get('/partidos/{id}', [PublicController::class, 'proximosPartidos'])->name('partidos');

// Rutas de Administración protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta principal del Panel de Administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rutas para la gestión de torneos en el Panel de Administración
    Route::resource('/admin/torneos', TorneoController::class)->names([
        'index' => 'admin.torneos.index',
        'create' => 'admin.torneos.create',
        'store' => 'admin.torneos.store',
        'show' => 'admin.torneos.show',
        'edit' => 'admin.torneos.edit',
        'update' => 'admin.torneos.update',
        'destroy' => 'admin.torneos.destroy',
    ]);
});

// Rutas para la autenticación de administradores
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
