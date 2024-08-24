@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Crear Torneo</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.torneos.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre del Torneo:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500" placeholder="Ingrese el nombre del torneo">
                </div>
                <div class="mb-4">
                    <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Torneo:</label>
                    <select id="tipo" name="tipo" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="todos_contra_todos">Todos contra Todos</option>
                        <option value="grupos">Grupos</option>
                        <option value="eliminatorias_grupos">Eliminatorias + Grupos</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-semibold mb-2">Género:</label>
                    <select id="genero" name="genero" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="mixto">Mixto</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado:</label>
                    <select id="estado" name="estado" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="activo">Activo</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="bi bi-save mr-2"></i> Guardar
                    </button>
                    <a href="{{ route('admin.torneos.index') }}" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <i class="bi bi-arrow-left-circle mr-2"></i> Volver a la lista
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
