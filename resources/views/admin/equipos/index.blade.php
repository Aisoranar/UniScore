@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-extrabold mb-6 text-gray-900">Administrar Equipos</h1>
        
        <!-- Formulario de búsqueda -->
        <div class="flex items-center mb-6 space-x-4">
            <div class="relative flex-1">
                <input type="text" id="search" name="search" value="{{ request()->get('search') }}" placeholder="Buscar equipos..." class="form-input border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 shadow-md placeholder-gray-500">
                <i class="bi bi-search absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400"></i>
            </div>
            <button id="search-btn" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="bi bi-search mr-2"></i> Buscar
            </button>
        </div>

        <!-- Botón para crear equipo -->
        <a href="{{ route('equipos.create', ['torneoId' => $torneo->id]) }}" class="inline-flex items-center py-2 px-4 border border-transparent text-base font-medium rounded-lg shadow-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mb-6">
            <i class="bi bi-plus-circle mr-2"></i> Crear Equipo
        </a>

        <!-- Lista de equipos -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <div id="equipos-list">
                    @include('admin.equipos.partials.equipos_list', ['equipos' => $equipos])
                </div>
                <div id="pagination" class="mt-6">
                    {{ $equipos->appends(request()->except('page'))->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de eliminación -->
    <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-full max-w-sm">
            <h3 class="text-lg font-semibold mb-4">Confirmar Eliminación</h3>
            <p class="mb-4">¿Estás seguro de que deseas eliminar este equipo? Esta acción no se puede deshacer.</p>
            <div class="flex justify-center gap-4">
                <button id="confirm-delete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Eliminar</button>
                <button id="cancel-delete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">Cancelar</button>
            </div>
        </div>
    </div>

    <!-- Script para búsqueda en tiempo real y eliminación -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const searchButton = document.getElementById('search-btn');
            const equiposList = document.getElementById('equipos-list');
            const pagination = document.getElementById('pagination');
            const deleteModal = document.getElementById('delete-modal');
            const confirmDeleteButton = document.getElementById('confirm-delete');
            const cancelDeleteButton = document.getElementById('cancel-delete');

            let deleteUrl = '';

            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                fetchResults(searchInput.value);
            });

            searchInput.addEventListener('input', function() {
                clearTimeout(window.searchTimeout);
                window.searchTimeout = setTimeout(() => {
                    fetchResults(searchInput.value);
                }, 300);
            });

            function fetchResults(query) {
                fetch('{{ route('admin.equipos.index', ['torneoId' => $torneo->id]) }}' + '?search=' + query, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    equiposList.innerHTML = data.html;
                    pagination.innerHTML = data.pagination;
                });
            }

            // Abrir modal de confirmación
            document.addEventListener('click', function(e) {
                if (e.target.matches('.delete-equipo')) {
                    e.preventDefault();
                    deleteUrl = e.target.getAttribute('href');
                    deleteModal.classList.remove('hidden');
                }
            });

            // Confirmar eliminación
            confirmDeleteButton.addEventListener('click', function() {
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchResults(searchInput.value); // Recupera la lista después de la eliminación
                    } else {
                        alert('No se pudo eliminar el equipo.');
                    }
                    deleteModal.classList.add('hidden');
                });
            });

            // Cancelar eliminación
            cancelDeleteButton.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
        });
    </script
