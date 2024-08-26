@extends('layouts.app')

@section('content')
<main class="container mx-auto p-4">
    <section class="tournaments-section py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <h1 class="text-center text-5xl font-bold text-gray-800 mb-12">
                <i class="fas fa-trophy text-yellow-500"></i> Torneos Disponibles
            </h1>

            @if(isset($torneos) && $torneos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @php
                        $colors = ['bg-red-500', 'bg-green-500', 'bg-blue-500', 'bg-purple-500', 'bg-yellow-500', 'bg-indigo-500', 'bg-pink-500'];
                        $icons = [
                            'fas fa-futbol',
                            'fas fa-shoe-prints',
                            'fas fa-flag-checkered',
                            'fas fa-stopwatch',
                            'fas fa-tshirt',
                            'fas fa-user-shield',
                            'fas fa-whistle',
                        ];
                        $index = 0;
                    @endphp
                    
                    @foreach($torneos as $torneo)
                        @php
                            $color = $colors[$index % count($colors)];
                            $icon = $icons[$index % count($icons)];
                            $index++;
                        @endphp

                        <div class="relative {{ $color }} rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden p-6">
                            <div class="absolute top-4 right-4">
                                @if($torneo->estado === 'activo')
                                    <span class="inline-block w-4 h-4 bg-green-300 rounded-full shadow-md" title="Activo"></span>
                                @elseif($torneo->estado === 'finalizado')
                                    <span class="inline-block w-4 h-4 bg-red-300 rounded-full shadow-md" title="Finalizado"></span>
                                @endif
                            </div>

                            <div class="flex items-center justify-center h-32 mb-6 text-white">
                                <i class="{{ $icon }} text-6xl"></i>
                            </div>

                            <h5 class="text-center text-2xl font-semibold mb-3 text-white">{{ $torneo->nombre }}</h5>
                            <p class="text-center text-white mb-4">{{ Str::limit($torneo->descripcion, 100) }}</p>
                            
                            <div class="text-center">
                                <a href="{{ route('torneos.show', $torneo->id) }}" class="inline-block px-5 py-2 bg-white text-gray-800 font-semibold rounded-lg hover:bg-gray-200 transition-colors duration-300">Ver Detalles</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-xl text-gray-700">No hay torneos disponibles en este momento.</p>
            @endif
        </div>
    </section>
</main>
@endsection
