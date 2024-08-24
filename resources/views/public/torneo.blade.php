@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">{{ $torneo->nombre }}</h1>
    <p class="text-muted text-center mb-5">{{ ucfirst($torneo->tipo) }} - {{ ucfirst($torneo->genero) }}</p>

    <div class="row justify-content-center">
        <!-- Enlace a Clasificación -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('clasificacion', $torneo->id) }}" class="btn btn-primary btn-block">
                Ver Clasificación
            </a>
        </div>

        <!-- Enlace a Próximos Partidos -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('partidos', $torneo->id) }}" class="btn btn-secondary btn-block">
                Próximos Partidos
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Detalles del Torneo -->
        <div class="col-md-12">
            <h3 class="mb-3">Detalles del Torneo</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> {{ $torneo->nombre }}</li>
                <li class="list-group-item"><strong>Tipo:</strong> {{ ucfirst($torneo->tipo) }}</li>
                <li class="list-group-item"><strong>Género:</strong> {{ ucfirst($torneo->genero) }}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($torneo->estado) }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn {
        padding: 15px;
        font-size: 18px;
    }
    .list-group-item {
        font-size: 16px;
    }
</style>
@endpush
