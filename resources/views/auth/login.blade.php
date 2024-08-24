@extends('layouts.auth-master')

@section('content')

    <div class="bg-white shadow-lg rounded-lg border border-gray-200">
        <div class="p-8">
            <h1 class="text-center text-4xl font-extrabold text-blue-700 mb-8">Iniciar Sesión</h1>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                @include('layouts.partials.message')
                

                <div class="mb-6">
                    <label for="cedulaInput" class="block text-base font-medium text-gray-800 mb-2">Cédula</label>
                    <input type="text" name="cedula" id="cedulaInput" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" placeholder="Ingrese su cédula" value="{{ old('cedula') }}" required>
                </div>

                <div class="mb-6">
                    <label for="passwordInput" class="block text-base font-medium text-gray-800 mb-2">Contraseña</label>
                    <input type="password" name="password" id="passwordInput" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" placeholder="Ingrese su contraseña" required>
                </div>

                <div class="mb-6">
                    <label for="roleSelect" class="block text-base font-medium text-gray-800 mb-2">Tipo de Usuario</label>
                    <select name="role" id="roleSelect" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" required>
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <div class="mb-8">
                    <button type="submit" class="w-full py-3 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors duration-300 rounded-lg text-lg font-semibold">Iniciar Sesión</button>
                </div>

                <div class="text-center text-sm text-gray-600">
                    <p>¿No tienes cuenta? <a href="{{ route('register.show') }}" class="text-blue-600 hover:underline font-medium">Crear cuenta</a></p>
                    <p class="mt-3"><a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 hover:underline font-medium">← Volver al inicio</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection
