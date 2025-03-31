@extends('layouts.app')

@section('content')
<h1>Crear Fidelización</h1>
<form action="{{ route('fidelizacion.store') }}" method="POST">
    @csrf
    <label>Finalidad:</label>
    <input type="text" name="finalidad">
    
    <label>Puntos Totales:</label>
    <input type="number" name="puntos_totales">

    <label>Límite de Puntos:</label>
    <input type="number" name="limite_puntos">

    <label>Usuario:</label>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <button type="submit">Guardar</button>
</form>
@endsection
