@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Crear Nuevo Equipo para el Torneo - {{ $torneo->nombre }}</h1>
        <form action="{{ route('equipos.store', ['torneo' => $torneo->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium text-gray-700">Nombre del Equipo</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="puntos" class="block text-lg font-medium text-gray-700">Puntos</label>
                <input type="number" id="puntos" name="puntos" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
