@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold mb-8 text-gray-800">Editar Torneo</h1>
    <div class="bg-white shadow-xl rounded-lg p-8">
        <form action="{{ route('admin.torneos.update', $torneo->id) }}" method="POST" onsubmit="return confirmSave();">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre del Torneo:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $torneo->nombre) }}" class="form-input border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm" placeholder="Ingrese el nombre del torneo">
            </div>
            <div class="mb-6">
                <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Torneo:</label>
                <select id="tipo" name="tipo" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="todos_contra_todos" {{ $torneo->tipo == 'todos_contra_todos' ? 'selected' : '' }}>Todos contra Todos</option>
                    <option value="grupos" {{ $torneo->tipo == 'grupos' ? 'selected' : '' }}>Grupos</option>
                    <option value="eliminatorias_grupos" {{ $torneo->tipo == 'eliminatorias_grupos' ? 'selected' : '' }}>Eliminatorias + Grupos</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="genero" class="block text-gray-700 font-semibold mb-2">Género:</label>
                <select id="genero" name="genero" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="masculino" {{ $torneo->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ $torneo->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="mixto" {{ $torneo->genero == 'mixto' ? 'selected' : '' }}>Mixto</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado:</label>
                <select id="estado" name="estado" class="form-select border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <option value="activo" {{ $torneo->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="finalizado" {{ $torneo->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="inline-flex items-center py-3 px-6 border border-transparent text-base font-semibold rounded-full shadow-md text-white bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-300">
                    <i class="bi bi-save mr-2"></i> Guardar Cambios
                </button>
                <a href="{{ route('admin.torneos.index') }}" class="inline-flex items-center py-3 px-6 border border-transparent text-base font-semibold rounded-full shadow-md text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
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
