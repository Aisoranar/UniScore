@extends('layouts.auth-master')

@section('content')

    <form action="{{ route('register.post') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <h1 class="text-center text-2xl font-bold mb-6">Crear Cuenta</h1>
        @include('layouts.partials.message')

        <div class="form-group mb-4">
            <label for="cedulaInput" class="form-label">Cédula</label>
            <input type="text" name="cedula" class="form-control" id="cedulaInput" placeholder="Cédula" required>
        </div>

        <div class="form-group mb-4">
            <label for="emailInput" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" id="emailInput" placeholder="Correo electrónico" required>
        </div>

        <div class="form-group mb-4">
            <label for="usernameInput" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Nombre de usuario" required>
        </div>

        <div class="form-group mb-4">
            <label for="roleSelect" class="form-label">Tipo de Usuario</label>
            <select name="role" id="roleSelect" class="form-control" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="passwordInput" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Contraseña" required>
        </div>

        <div class="form-group mb-4">
            <label for="passwordConfirmationInput" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmationInput" placeholder="Confirma tu contraseña" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100">Crear cuenta</button>
        </div>

        <div class="text-center">
            <p>¿Ya tienes cuenta? <a href="{{ route('login.show') }}">Iniciar Sesión</a></p>
        </div>
    </form>

@endsection
