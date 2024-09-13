@extends('layouts.app')

@section('content')
    <h1 class="text-center text-3xl font-bold mb-6 text-blue-800">Clasificación</h1>

    <!-- Diseño mobile-first con tarjetas -->
    <div class="grid gap-6 sm:grid-cols-2 lg:hidden">
        @foreach($clasificacion as $index => $equipo)
            <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                        <span class="ml-3 text-lg font-bold text-gray-800">{{ $equipo->nombre }}</span>
                    </div>
                    <span class="text-gray-500 font-semibold"># {{ $index + 1 }}</span>
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>Puntos:</strong> {{ $equipo->puntos }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>PJ:</strong> {{ $equipo->partidos_jugados }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>PG:</strong> {{ $equipo->partidos_ganados }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>PE:</strong> {{ $equipo->partidos_empatados }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>PP:</strong> {{ $equipo->partidos_perdidos }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>GF:</strong> {{ $equipo->goles_favor }}
                </div>
                <div class="text-sm text-gray-600 mb-1">
                    <strong>GC:</strong> {{ $equipo->goles_contra }}
                </div>
                <div class="text-sm text-gray-600">
                    <strong>+/-:</strong> {{ $equipo->diferencia_goles }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tabla visible en pantallas más grandes -->
    <div class="overflow-x-auto hidden lg:block">
        <table class="table-auto w-full bg-white shadow-xl rounded-lg overflow-hidden animate__animated animate__fadeInUp">
            <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white shadow-md">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Equipo</th>
                    <th class="p-3 text-left">PJ</th>
                    <th class="p-3 text-left">PG</th>
                    <th class="p-3 text-left">PE</th>
                    <th class="p-3 text-left">PP</th>
                    <th class="p-3 text-left">GF</th>
                    <th class="p-3 text-left">GC</th>
                    <th class="p-3 text-left">+/-</th>
                    <th class="p-3 text-left">Puntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clasificacion as $index => $equipo)
                    <tr class="border-b hover:bg-gradient-to-r from-green-100 to-blue-100 transition duration-300 ease-in-out hover:shadow-lg transform hover:scale-[1.02]">
                        <td class="p-3 font-semibold text-gray-700">{{ $index + 1 }}</td>
                        <td class="p-3 flex items-center">
                            <i class="fas fa-shield-alt text-blue-600 text-lg mr-2"></i> <!-- Ícono representativo del equipo -->
                            {{ $equipo->nombre }}
                        </td>
                        <td class="p-3 text-gray-600">{{ $equipo->partidos_jugados }}</td>
                        <td class="p-3 text-green-600 font-bold">{{ $equipo->partidos_ganados }}</td>
                        <td class="p-3 text-yellow-600">{{ $equipo->partidos_empatados }}</td>
                        <td class="p-3 text-red-600">{{ $equipo->partidos_perdidos }}</td>
                        <td class="p-3 text-gray-600">{{ $equipo->goles_favor }}</td>
                        <td class="p-3 text-gray-600">{{ $equipo->goles_contra }}</td>
                        <td class="p-3 text-gray-600">{{ $equipo->diferencia_goles }}</td>
                        <td class="p-3 font-bold text-blue-800">{{ $equipo->puntos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6 flex justify-center">
        {{ $clasificacion->links('pagination::tailwind') }}
    </div>

    <style>
        .table-wrapper {
            background: linear-gradient(145deg, #e6e6e6, #ffffff);
            border-radius: 12px;
            padding: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        thead tr {
            text-align: left;
            font-weight: bold;
            font-size: 1.1rem;
        }

        th, td {
            padding: 14px 16px;
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
    </style>

    <!-- Enlace a Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
