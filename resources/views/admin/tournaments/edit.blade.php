@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center mb-6 text-blue-600">Editar Torneo: {{ $torneo->name }}</h1>

    <form action="{{ route('tournaments.update', $torneo->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-trophy ml-3 text-gray-500"></i>
                <input type="text" name="name" class="form-control p-2 flex-1" value="{{ old('name', $torneo->name) }}" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="sport_type" class="block text-sm font-medium text-gray-700">Deporte</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-futbol ml-3 text-gray-500"></i>
                <input type="text" name="sport_type" class="form-control p-2 flex-1" value="{{ old('sport_type', $torneo->sport_type) }}" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="tournament_type" class="block text-sm font-medium text-gray-700">Tipo de Torneo</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-list-alt ml-3 text-gray-500"></i>
                <input type="text" name="tournament_type" class="form-control p-2 flex-1" value="{{ old('tournament_type', $torneo->tournament_type) }}" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="number_of_teams" class="block text-sm font-medium text-gray-700">Número de Equipos</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-users ml-3 text-gray-500"></i>
                <input type="number" name="number_of_teams" class="form-control p-2 flex-1" value="{{ old('number_of_teams', $torneo->number_of_teams) }}" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-calendar-alt ml-3 text-gray-500"></i>
                <input type="date" name="start_date" class="form-control p-2 flex-1" value="{{ old('start_date', $torneo->start_date) }}" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
            <div class="flex items-center border border-gray-300 rounded-md">
                <i class="fas fa-calendar-check ml-3 text-gray-500"></i>
                <input type="date" name="end_date" class="form-control p-2 flex-1" value="{{ old('end_date', $torneo->end_date) }}" required>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Actualizar
        </button>
    </form>
</div>
@endsection
