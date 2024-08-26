@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Detalles del Equipo - {{ $equipo->nombre }}</h1>
        <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
        <p><strong>Puntos:</strong> {{ $equipo->puntos }}</p>
        <a href="{{ route('equipos.edit', ['id' => $equipo->id]) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('equipos.destroy', ['id' => $equipo->id]) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection
