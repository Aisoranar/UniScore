@extends('layouts.app')

@section('title', 'Goleadores')

@section('content')
    <div class="container mx-auto my-8 p-6 bg-gray-100 shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Goleadores</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-lg font-semibold">N°</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold">Jugador</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold">Equipo</th>
                        <th class="px-6 py-3 text-right text-lg font-semibold">Goles</th>
                        <th class="px-6 py-3 text-right text-lg font-semibold">Partidos Jugados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($goleadores as $index => $goleador)
                        <tr class="@if($index == 0) bg-yellow-100 @else bg-white @endif hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-left text-lg text-gray-700">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                @if($index == 0)
                                    <i class="fas fa-futbol text-yellow-500 text-2xl animate-bounce"></i>
                                    <span class="text-lg font-bold text-gray-800">{{ $goleador->jugador ? $goleador->jugador->nombre : 'Jugador no disponible' }}</span>
                                @else
                                    <span class="text-lg font-medium text-gray-800">{{ $goleador->jugador ? $goleador->jugador->nombre : 'Jugador no disponible' }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-left text-lg text-gray-700">
                                {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->nombre : 'Equipo no disponible' }}
                            </td>
                            <td class="px-6 py-4 text-right text-lg font-semibold text-gray-700">
                                {{ $goleador->goles }}
                            </td>
                            <td class="px-6 py-4 text-right text-lg text-gray-700">
                                {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->partidos_jugados : 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $goleadores->links() }}
        </div>
    </div>
@endsection
