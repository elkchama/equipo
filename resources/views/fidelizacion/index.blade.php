@extends('layouts.app')

@section('content')

<h1>Listado de Fidelización</h1>

<a href="{{ route('fidelizacion.create') }}">Crear Fidelización</a>

<table>
    <tr>
        <th>Finalidad</th>
        <th>Puntos Totales</th>
        <th>Límite de Puntos</th>
        <th>Usuario</th>
        <th>Acciones</th>
    </tr>

    @foreach($fidelizaciones as $f)
    <tr>
        <td>{{ $f->finalidad }}</td>
        <td>{{ $f->puntos_totales }}</td>
        <td>{{ $f->limite_puntos }}</td>
        <td>{{ $f->user->name }}</td>
        <td>
            <a href="{{ route('fidelizacion.edit', $f) }}">Editar</a>
            <form action="{{ route('fidelizacion.destroy', $f) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
