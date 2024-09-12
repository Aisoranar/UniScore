@extends('layouts.app')

@section('title', 'Clasificación General')

@section('content')
    <div class="container mx-auto my-8 p-6 bg-gray-100 shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Clasificación General</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-lg font-semibold">Equipo</th>
                        <th class="px-6 py-3 text-right text-lg font-semibold">Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clasificacion as $index => $equipo)
                        <tr class="@if($index == 0) bg-yellow-100 @elseif($index == 1) bg-gray-200 @else bg-white @endif hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                @if($index == 0)
                                    <i class="fas fa-crown text-yellow-500 text-2xl animate-bounce"></i>
                                @elseif($index == 1)
                                    <i class="fas fa-medal text-gray-400 text-xl animate-pulse"></i>
                                @elseif($index == 2)
                                    <i class="fas fa-medal text-bronze text-xl animate-pulse"></i>
                                @else
                                    <span class="text-lg font-medium text-gray-800">{{ $index + 1 }}º</span>
                                @endif
                                <span class="text-lg font-medium text-gray-800">{{ $equipo->nombre }}</span>
                            </td>
                            <td class="px-6 py-4 text-right text-lg font-semibold text-gray-700">
                                {{ $equipo->puntos }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
