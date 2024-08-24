<ul class="list-group list-group-flush">
    @forelse ($torneos as $torneo)
        <li class="list-group-item flex items-center justify-between border-b border-gray-200 p-4">
            <div class="flex items-center">
                <i class="bi bi-trophy-fill text-yellow-500 mr-3"></i>
                <a href="{{ route('admin.torneos.show', $torneo->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                    {{ $torneo->nombre }}
                </a>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.torneos.edit', $torneo->id) }}" class="inline-flex items-center py-1 px-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-yellow-800 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <i class="bi bi-pencil-square mr-1"></i> Editar
                </a>
                <form action="{{ route('admin.torneos.destroy', $torneo->id) }}" method="POST" onsubmit="return confirmDelete();" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center py-1 px-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-red-800 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <i class="bi bi-trash mr-1"></i> Eliminar
                    </button>
                </form>
            </div>
        </li>
    @empty
        <li class="list-group-item text-center py-4">No hay torneos disponibles.</li>
    @endforelse
</ul>
