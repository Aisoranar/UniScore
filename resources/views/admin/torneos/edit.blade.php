@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Editar Torneo</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.torneos.update', $torneo->id) }}" method="POST" onsubmit="return confirmSave();">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre del Torneo:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $torneo->nombre) }}" class="form-control border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500" placeholder="Ingrese el nombre del torneo">
                </div>
                <div class="mb-4">
                    <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Torneo:</label>
                    <select id="tipo" name="tipo" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="todos_contra_todos" {{ $torneo->tipo == 'todos_contra_todos' ? 'selected' : '' }}>Todos contra Todos</option>
                        <option value="grupos" {{ $torneo->tipo == 'grupos' ? 'selected' : '' }}>Grupos</option>
                        <option value="eliminatorias_grupos" {{ $torneo->tipo == 'eliminatorias_grupos' ? 'selected' : '' }}>Eliminatorias + Grupos</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-semibold mb-2">Género:</label>
                    <select id="genero" name="genero" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="masculino" {{ $torneo->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ $torneo->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="mixto" {{ $torneo->genero == 'mixto' ? 'selected' : '' }}>Mixto</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado:</label>
                    <select id="estado" name="estado" class="form-select border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500">
                        <option value="activo" {{ $torneo->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="finalizado" {{ $torneo->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-yellow-800 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <i class="bi bi-pencil-square mr-2"></i> Actualizar
                    </button>
                    <a href="{{ route('admin.torneos.index') }}" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <i class="bi bi-arrow-left-circle mr-2"></i> Volver a la lista
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmSave() {
            return confirm('¿Estás seguro de que deseas guardar los cambios?');
        }
    </script>
@endsection
