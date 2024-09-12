<!-- resources/views/public/actualizar_resultado.blade.php -->

<form action="{{ route('partidos.actualizar', $partido->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="resultado">Resultado</label>
    <select name="resultado">
        <option value="local">Local</option>
        <option value="visitante">Visitante</option>
        <option value="empate">Empate</option>
    </select>

    <label for="goles_local">Goles Local</label>
    <input type="number" name="goles_local" value="{{ old('goles_local') }}">

    <label for="goles_visitante">Goles Visitante</label>
    <input type="number" name="goles_visitante" value="{{ old('goles_visitante') }}">

    <button type="submit">Actualizar</button>
</form>
