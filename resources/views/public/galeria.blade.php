@extends('layouts.app')

@section('title', 'Galería del Torneo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Galería del Torneo - {{ $torneo->nombre }}</h1>

        @php
            $galeria = $galeria ?? collect();
        @endphp

        @if($galeria->isEmpty())
            <p class="text-center text-gray-500">No hay fotos ni videos disponibles.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($galeria as $item)
                    <div class="gallery-item bg-gray-100 p-2 rounded-lg shadow-md">
                        @if ($item->tipo === 'foto')
                            <img src="{{ asset('storage/' . $item->ruta) }}" alt="Foto" class="w-full h-auto rounded-lg">
                        @elseif ($item->tipo === 'video')
                            <video controls class="w-full rounded-lg">
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
