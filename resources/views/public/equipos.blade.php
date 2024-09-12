@extends('layouts.app')

@section('title', 'Equipos del Torneo')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">Equipos del Torneo</h1>

        <!-- Lista de equipos -->
        <div class="row g-4">
            @foreach ($equipos as $equipo)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="card-header bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $equipo->nombre }}</h5>
                                <span class="badge bg-white text-dark">Puntos: {{ $equipo->puntos }}</span>
                            </div>
                        </div>
                        <div class="card-body bg-gray-100">
                            <h6 class="text-lg font-semibold text-gray-700 mb-3">Jugadores</h6>
                            <ul class="list-group list-group-flush">
                                @foreach ($equipo->jugadores as $jugador)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <i class="fas fa-user-circle fa-lg text-gray-600"></i>
                                            </div>
                                            <div>
                                                <strong class="text-gray-800">{{ $jugador->nombre }}</strong>
                                                <div class="text-xs text-gray-600">
                                                    @if($jugador->tarjetas_amarillas > 0)
                                                        <span class="text-warning"><i class="fas fa-square"></i> {{ $jugador->tarjetas_amarillas }}</span>
                                                    @endif
                                                    @if($jugador->tarjetas_rojas > 0)
                                                        <span class="text-danger ms-2"><i class="fas fa-square"></i> {{ $jugador->tarjetas_rojas }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <span class="badge bg-success">{{ $jugador->goles }} <i class="fas fa-futbol"></i></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
<div class="mt-5 d-flex justify-content-center">
    {{ $equipos->links('pagination::bootstrap-4') }} <!-- Correctly using Bootstrap 4 pagination style -->
</div>

    </div>
@endsection
