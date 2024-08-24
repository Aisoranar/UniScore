@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-blue-500 to-teal-500 text-white py-5 px-6">
                <h1 class="text-3xl font-bold">Detalles del Torneo</h1>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <p class="text-gray-600 font-medium">Nombre:</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ $torneo->nombre }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <p class="text-gray-600 font-medium">Tipo:</p>
                        <p class="text-lg text-gray-800 font-semibold capitalize">{{ $torneo->tipo }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <p class="text-gray-600 font-medium">Género:</p>
                        <p class="text-lg text-gray-800 font-semibold capitalize">{{ $torneo->genero }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <p class="text-gray-600 font-medium">Estado:</p>
                        <p class="text-lg text-gray-800 font-semibold capitalize">{{ $torneo->estado }}</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('admin.torneos.edit', $torneo->id) }}" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="bi bi-pencil-square mr-2"></i> Editar
                    </a>
                    <form action="{{ route('admin.torneos.destroy', $torneo->id) }}" method="POST" onsubmit="return confirmDelete();" class="inline-flex items-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <i class="bi bi-trash3 mr-2"></i> Eliminar
                        </button>
                    </form>
                    <a href="{{ route('admin.torneos.index') }}" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <i class="bi bi-arrow-left-circle mr-2"></i> Volver a la lista
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar este torneo? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
