<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\GoleadorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
|
*/

// Ruta principal (página de torneos)
Route::get('/', [PublicController::class, 'index'])->name('home');

// Rutas de Registro de Usuarios
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Rutas de Login de Usuarios
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Ruta de Inicio después del Login
Route::get('/home', [HomeController::class, 'index'])->name('home.dashboard');

// Ruta de Logout para cerrar sesión
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas Públicas para ver los torneos y detalles
Route::get('/torneos', [PublicController::class, 'torneos'])->name('torneos.index');
Route::get('/torneos/{id}', [PublicController::class, 'showTorneo'])->name('torneos.show');

// Ruta para la clasificación de equipos con paginación
Route::get('/clasificacion', [PublicController::class, 'clasificacion'])->name('clasificacion');

// Ruta para ver los próximos partidos
Route::get('/partidos', [PublicController::class, 'proximosPartidos'])->name('partidos');

// Ruta para la galería de fotos y videos con paginación
Route::get('/galeria', [PublicController::class, 'galeria'])->name('galeria');

// Ruta para mostrar todos los equipos con paginación
Route::get('/equipos', [PublicController::class, 'equipos'])->name('equipos');

// Ruta para mostrar los goleadores con paginación
Route::get('/goleadores', [PublicController::class, 'goleadores'])->name('goleadores');

// Rutas de Administración protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta principal del Panel de Administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rutas para la gestión de torneos en el Panel de Administración
    Route::resource('admin/torneos', TorneoController::class)->names([
        'index' => 'admin.torneos.index',
        'create' => 'admin.torneos.create',
        'store' => 'admin.torneos.store',
        'show' => 'admin.torneos.show',
        'edit' => 'admin.torneos.edit',
        'update' => 'admin.torneos.update',
        'destroy' => 'admin.torneos.destroy',
    ]);

    // Rutas para los equipos dentro del contexto del torneo
    Route::prefix('admin/torneos/{torneoId}')->group(function () {
        Route::get('equipos', [EquipoController::class, 'index'])->name('admin.equipos.index');
        Route::get('equipos/create', [EquipoController::class, 'create'])->name('admin.equipos.create');
        Route::post('equipos', [EquipoController::class, 'store'])->name('admin.equipos.store');
        Route::get('equipos/{id}', [EquipoController::class, 'show'])->name('admin.equipos.show');
        Route::get('equipos/{id}/edit', [EquipoController::class, 'edit'])->name('admin.equipos.edit');
        Route::put('equipos/{id}', [EquipoController::class, 'update'])->name('admin.equipos.update');
        Route::delete('equipos/{id}', [EquipoController::class, 'destroy'])->name('admin.equipos.destroy');

        // Rutas para los goleadores dentro del contexto del torneo
        Route::get('goleadores', [GoleadorController::class, 'index'])->name('admin.goleadores.index');
        Route::get('goleadores/create', [GoleadorController::class, 'create'])->name('admin.goleadores.create');
        Route::post('goleadores', [GoleadorController::class, 'store'])->name('admin.goleadores.store');
        Route::get('goleadores/{id}', [GoleadorController::class, 'show'])->name('admin.goleadores.show');
        Route::get('goleadores/{id}/edit', [GoleadorController::class, 'edit'])->name('admin.goleadores.edit');
        Route::put('goleadores/{id}', [GoleadorController::class, 'update'])->name('admin.goleadores.update');
        Route::delete('goleadores/{id}', [GoleadorController::class, 'destroy'])->name('admin.goleadores.destroy');
    });
});

// Rutas para la autenticación de administradores
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
