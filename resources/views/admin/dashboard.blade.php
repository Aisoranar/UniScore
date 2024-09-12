@extends('layouts.admin')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Panel de Administración</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Botón para ver equipos -->
            <a href="{{ url('/admin/torneos/1/equipos') }}" class="block text-center bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-700">
                Ver Equipos
            </a>
            
            <!-- Botón para crear un nuevo equipo -->
            <a href="{{ url('/admin/torneos/1/equipos/create') }}" class="block text-center bg-green-500 text-white py-3 rounded-lg hover:bg-green-700">
                Crear Equipo
            </a>
        </div>
    </div>
@endsection
