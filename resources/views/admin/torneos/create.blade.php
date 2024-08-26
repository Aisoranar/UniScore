@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold mb-8 text-gray-800">Crear Torneo</h1>
    <div class="bg-white shadow-xl rounded-lg p-8">
        <form action="{{ route('admin.torneos.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre del Torneo:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-input border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm" placeholder="Ingrese el nombre del torneo">
            </div>
            <div class="mb-6">
                <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Torneo:</label>
                <select id="tipo" name="tipo" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="todos_contra_todos">Todos contra Todos</option>
                    <option value="grupos">Grupos</option>
                    <option value="eliminatorias_grupos">Eliminatorias + Grupos</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="genero" class="block text-gray-700 font-semibold mb-2">Género:</label>
                <select id="genero" name="genero" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="mixto">Mixto</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado:</label>
                <select id="estado" name="estado" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="activo">Activo</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="inline-flex items-center py-3 px-6 border border-transparent text-base font-semibold rounded-full shadow-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                    <i class="bi bi-save mr-2"></i> Guardar
                </button>
                <a href="{{ route('admin.torneos.index') }}" class="inline-flex items-center py-3 px-6 border border-transparent text-base font-semibold rounded-full shadow-md text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                    <i class="bi bi-arrow-left-circle mr-2"></i> Volver a la lista
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
