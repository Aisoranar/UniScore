@extends('layouts.app')

@section('content')

<h1 class="text-center mt-1 mb-4">Selecciona un Equipo para Ver Jugadores</h1>
<div class="row justify-content-center">
    @foreach($equipos as $eq)
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="card text-center border-primary shadow-lg" style="border-radius: 15px;">
            <div class="card-body">
                <h5 class="card-title">{{ $eq->name }}</h5>
                <p class="card-text">Haz clic para ver los jugadores de este equipo.</p>
                <a href="{{ route('players.index', ['torneoId' => $torneo->id, 'equipoId' => $eq->id]) }}" class="btn btn-primary btn-lg" style="border-radius: 20px;">
                    <i class="fas fa-users"></i> Ver Jugadores
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Mensaje para los usuarios no autenticados -->
@if(!isset($equipo))
    <p class="text-center mt-5">Seleccione un equipo para ver los jugadores.</p>
@endif

<!-- Si hay un equipo seleccionado, mostrar los jugadores -->
@if(isset($equipo))
    <h2 class="text-center mb-4">Jugadores del Equipo: <span class="text-primary">{{ $equipo->name }}</span></h2>

    <div class="d-none d-md-block"> <!-- Para pantallas grandes -->
        <h3 class="text-center mt-5 mb-4">Jugadores</h3>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Posición</th>
                    <th>Equipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipo->jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->name }}</td>
                    <td>{{ $jugador->number }}</td>
                    <td>{{ $jugador->position }}</td>
                    <td>{{ $equipo->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-block d-md-none"> <!-- Para pantallas pequeñas -->
        <h3 class="text-center mt-5 mb-4">Jugadores</h3>
        <div class="row justify-content-center">
            @foreach($equipo->jugadores as $jugador)
            <div class="col-12 mb-4">
                <div class="card border-primary shadow-lg" style="border-radius: 15px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $jugador->name }}</h5>
                        <p class="card-text"><strong>Número:</strong> {{ $jugador->number }}</p>
                        <p class="card-text"><strong>Posición:</strong> {{ $jugador->position }}</p>
                        <p class="card-text"><strong>Equipo:</strong> {{ $equipo->name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Mostrar el botón de Agregar Jugador solo si el usuario ha iniciado sesión -->
    @auth
    <div class="text-center mt-4 mb-5">
        <a href="{{ route('players.create', ['torneoId' => $torneo->id, 'equipoId' => $equipo->id]) }}" class="btn btn-success btn-lg" style="border-radius: 20px;">
            <i class="fas fa-user-plus"></i> Agregar Jugador
        </a>
    </div>
    @endauth
@endif

@endsection
