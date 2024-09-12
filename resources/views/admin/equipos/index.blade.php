<!-- Lista de equipos -->
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-6">
        <ul class="divide-y divide-gray-200">
            @foreach($equipos as $equipo)
                <li class="py-4 flex">
                    <div class="ml-3">
                        <p class="text-lg font-semibold text-gray-900">
                            {{ $equipo->nombre }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ count($equipo->jugadores) }} jugadores
                        </p>
                    </div>
                    <div class="ml-auto">
                        <!-- Corrección: pasar ambos parámetros -->
                        <a href="{{ route('admin.equipos.edit', ['torneoId' => $torneo->id, 'id' => $equipo->id]) }}" class="text-blue-600 hover:text-blue-900">Editar</a>

                        <form action="{{ route('admin.equipos.destroy', ['torneoId' => $torneo->id, 'id' => $equipo->id]) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
