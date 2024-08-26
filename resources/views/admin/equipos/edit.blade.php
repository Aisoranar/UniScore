@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Editar Equipo - {{ $equipo->nombre }}</h1>
        <form action="{{ route('equipos.update', ['id' => $equipo->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium text-gray-700">Nombre del Equipo</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('nombre', $equipo->nombre) }}" required>
            </div>
            <div class="mb-4">
                <label for="puntos" class="block text-lg font-medium text-gray-700">Puntos</label>
                <input type="number" id="puntos" name="puntos" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('puntos', $equipo->puntos) }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
