@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Tiendas</h1>

    <a href="{{ route('admin.tiendas.create') }}" class="btn btn-primary mb-3">Agregar Tienda</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>URL</th>
                <th>¿Es Aliada?</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiendas as $tienda)
                <tr>
                    <td>{{ $tienda->id }}</td>
                    <td>{{ $tienda->nombre }}</td>
                    <td>{{ $tienda->descripcion ?? 'N/A' }}</td>
                    <td>
                        @if ($tienda->url)
                            <a href="{{ $tienda->url }}" target="_blank">Ver sitio</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $tienda->es_aliada ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.tiendas.edit', $tienda) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.tiendas.destroy', $tienda) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
