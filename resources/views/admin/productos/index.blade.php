@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>
    <h2>Gestión de Productos</h2>

    <div class="mb-3">
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">Agregar Producto</a>
        <!-- Botón para generar el PDF -->
        <a href="{{ route('admin.productos.pdf') }}" class="btn btn-success">
            <i class="fas fa-file-pdf"></i> Generar Reporte PDF
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Tienda</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->tienda->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
