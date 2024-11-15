@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Detalles del Equipo</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $team->name }}</h5>
            <p class="card-text"><strong>Torneo:</strong> {{ $team->torneo->name }}</p>
            <p class="card-text"><strong>Entrenador:</strong> {{ $team->coach }}</p>
            <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
