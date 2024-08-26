@extends('layouts.app')

@section('title', 'Galería del Torneo')

@section('content')
    <div class="container mx-auto my-8 p-6 bg-gray-100 shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Galería del Torneo - {{ $torneo->nombre }}</h1>

        @php
            $galeria = $galeria ?? collect();
        @endphp

        @if($galeria->isEmpty())
            <p class="text-center text-gray-500">No hay fotos ni videos disponibles.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($galeria as $item)
                    <div class="gallery-item bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        @if ($item->tipo === 'foto')
                            <img src="{{ asset('storage/' . $item->ruta) }}" alt="Foto" class="w-full h-auto rounded-lg transform hover:scale-105 transition-transform duration-300">
                        @elseif ($item->tipo === 'video')
                            <video controls class="w-full h-auto rounded-lg transform hover:scale-105 transition-transform duration-300">
                                <source src="{{ asset('storage/' . $item->ruta) }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
