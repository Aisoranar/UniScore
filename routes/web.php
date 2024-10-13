<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SuperAdminController;
use App\Http\Controllers\CoachController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileCoachController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StatisticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí se registran las rutas para la aplicación. Estas rutas son cargadas
| por el RouteServiceProvider dentro de un grupo que contiene el middleware "web".
|
*/

// Ruta de la página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación para el SuperAdmin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    // CRUD de usuarios, accesible solo para el SuperAdmin
    Route::resource('users', UserController::class);

    // Ruta para la creación de roles (incluye los roles 'coach' y 'student')
    Route::post('/superadmin/create-role', [SuperAdminController::class, 'createRole'])
        ->name('superadmin.createRole');

    // Dashboard del SuperAdmin
    Route::get('/superadmin', [SuperAdminController::class, 'index'])
        ->name('superadmin.index');

    // Ruta para cerrar sesión del SuperAdmin
    Route::post('/superadmin/logout', [SuperAdminController::class, 'logout'])
        ->name('superadmin.logout');
});

// Rutas de registro solo para el SuperAdmin
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register.show')
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.perform')
    ->middleware('guest');

// Rutas de login (accesibles para cualquier usuario no autenticado)
Route::get('/login', [LoginController::class, 'show'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.perform')
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    // Ruta accesible para superadmin y estudiante
    Route::get('/estudiante', function () {
        return view('view.estudiante.index');
    })->name('estudiante.dashboard')->middleware('role:student|superadmin');

    // Ruta accesible solo para superadmin y coach
    Route::get('/coach', function () {
        return view('view.coach.index');
    })->name('coach.dashboard')->middleware('role:coach|superadmin');
});

// Ruta para mostrar el home de usuarios autenticados
Route::get('/home', [HomeController::class, 'index'])
    ->name('home.index')
    ->middleware('auth');

// Ruta para cerrar sesión usando POST (accesible para todos los usuarios autenticados)
Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout.perform')
    ->middleware('auth');

// Rutas para gestionar el perfil del estudiante
Route::get('/perfil/{id}/editar', [TraineeController::class, 'edit'])
    ->name('perfil.editar')
    ->middleware('auth');
Route::put('/perfil/{id}', [TraineeController::class, 'update'])
    ->name('student.update')
    ->middleware('auth');

// Rutas para la lista de coach y estudiantes
Route::middleware(['auth'])->group(function () {
    Route::get('/list/coach', [CoachController::class, 'index'])
        ->name('list.coach')
        ->middleware('role:superadmin');
    Route::get('/list/students', [TraineeController::class, 'index'])
        ->name('list.students')
        ->middleware('role:coach|superadmin');
});

// Rutas para el perfil del coach
Route::middleware('auth')->group(function () {
    Route::get('/coach/perfil/{id}', [ProfileCoachController::class, 'show'])
        ->name('coach.perfil.show');
    Route::get('/coach/perfil-edit/{id}', [ProfileCoachController::class, 'edit'])
        ->name('coach.perfil.edit');
    Route::put('/coach/perfil/{id}', [ProfileCoachController::class, 'update'])
        ->name('coach.perfil.update');
});

// Rutas para los perfiles
Route::middleware(['auth'])->prefix('profile')->group(function () {
    Route::get('/{id}', [TraineeController::class, 'show'])
        ->name('profile.show');
    Route::put('/coach/{user_id}', [ProfileCoachController::class, 'update'])
        ->name('profile.updateCoach');
    Route::put('/{user_id}', [TraineeController::class, 'update'])
        ->name('profile.update');
    Route::put('/update-student/observation', [TraineeController::class, 'updateStudentObservation'])
        ->name('profile.updateStudentObservation');
});

// Rutas para la gestión de torneos y recursos relacionados
Route::middleware(['auth', 'role:superadmin'])->prefix('admin')->group(function () {
    // CRUD de Torneos
    Route::resource('tournaments', TournamentController::class);
    
    // CRUD de Equipos por Torneo
    Route::resource('tournaments.teams', TeamController::class)->shallow();
    
    // CRUD de Jugadores por Equipo
    Route::resource('teams.players', PlayerController::class)->shallow();

    // CRUD de Partidos por Torneo
    Route::resource('tournaments.matches', MatchController::class)->shallow();

    // CRUD de Estadísticas por Partido
    Route::resource('matches.statistics', StatisticController::class)->shallow();

    // Rutas personalizadas para equipos dentro de torneos
    Route::prefix('torneos/{torneo}/equipos')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('teams.index');
        Route::get('/crear', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/{equipo}/editar', [TeamController::class, 'edit'])->name('teams.edit');
        Route::put('/{equipo}', [TeamController::class, 'update'])->name('teams.update');
        Route::delete('/{equipo}', [TeamController::class, 'destroy'])->name('teams.destroy');
    });
});
