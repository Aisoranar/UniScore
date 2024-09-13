@extends('layouts.app')

@section('title', 'Goleadores')

@section('content')
    <div class="container mx-auto my-8 p-4 bg-gray-100 shadow-xl rounded-lg">
        <h1 class="text-4xl font-bold text-center text-blue-800 mb-6">Goleadores</h1>

        <!-- Diseño mobile-first con tarjetas -->
        <div class="grid gap-6 sm:grid-cols-2 lg:hidden">
            @foreach ($goleadores as $index => $goleador)
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <i class="{{ $index == 0 ? 'fas fa-crown text-yellow-500 animate-pulse' : 'fas fa-user text-blue-600' }} text-xl"></i>
                            <span class="ml-3 text-lg font-bold text-gray-800">{{ $goleador->jugador ? $goleador->jugador->nombre : 'Jugador no disponible' }}</span>
                        </div>
                        <span class="text-gray-500 font-semibold">N° {{ $index + 1 }}</span>
                    </div>
                    <div class="text-sm text-gray-600 mb-1">
                        <strong>Equipo:</strong> {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->nombre : 'Equipo no disponible' }}
                    </div>
                    <div class="text-sm text-gray-600 mb-1">
                        <strong>Goles:</strong> {{ $goleador->goles }}
                    </div>
                    <div class="text-sm text-gray-600">
                        <strong>Partidos Jugados:</strong> {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->partidos_jugados : 'N/A' }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tabla visible en pantallas más grandes -->
        <div class="overflow-x-auto hidden lg:block">
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeInUp">
                <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">N°</th>
                        <th class="px-4 py-3 text-left">Jugador</th>
                        <th class="px-4 py-3 text-left">Equipo</th>
                        <th class="px-4 py-3 text-right">Goles</th>
                        <th class="px-4 py-3 text-right">Partidos Jugados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($goleadores as $index => $goleador)
                        <tr class="border-b hover:bg-gradient-to-r from-green-100 to-blue-100 transition duration-300 ease-in-out hover:shadow-lg transform hover:scale-[1.02]">
                            <td class="px-4 py-4 text-left text-lg font-semibold text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-4 flex items-center space-x-3">
                                <i class="{{ $index == 0 ? 'fas fa-crown text-yellow-500 animate-pulse' : 'fas fa-user text-blue-600' }} text-lg"></i>
                                <span class="text-lg font-medium text-gray-800">{{ $goleador->jugador ? $goleador->jugador->nombre : 'Jugador no disponible' }}</span>
                            </td>
                            <td class="px-4 py-4 text-left text-lg text-gray-700">
                                {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->nombre : 'Equipo no disponible' }}
                            </td>
                            <td class="px-4 py-4 text-right text-lg font-semibold text-gray-700">
                                {{ $goleador->goles }}
                            </td>
                            <td class="px-4 py-4 text-right text-lg text-gray-700">
                                {{ $goleador->jugador && $goleador->jugador->equipo ? $goleador->jugador->equipo->partidos_jugados : 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-6 flex justify-center">
            {{ $goleadores->links('pagination::tailwind') }} <!-- Paginación estilizada -->
        </div>
    </div>

    <style>
        .container {
            background: linear-gradient(145deg, #e6e6e6, #ffffff);
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 0.95rem;
            background: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        thead tr {
            text-align: left;
            font-weight: bold;
            font-size: 1rem;
        }

        th, td {
            padding: 12px 8px;
        }

        tbody tr {
            border-bottom: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }

        tbody tr:hover {
            background: linear-gradient(145deg, #d7e2f1, #bcd4f4);
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .table-auto i {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>

    <!-- Enlace a Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
