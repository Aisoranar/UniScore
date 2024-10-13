@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Equipos</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Coach</th>
                <th>Torneo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
            <tr>
                <td>{{ $equipo->name }}</td>
                <td>{{ $equipo->coach }}</td>
                <td>{{ $equipo->torneo->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
