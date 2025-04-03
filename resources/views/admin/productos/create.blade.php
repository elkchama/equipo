@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Producto</h2>

    <form action="{{ route('admin.productos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="tienda_id" class="form-label">Tienda:</label>
            <select class="form-control" id="tienda_id" name="tienda_id" required>
                <option value="">Selecciona una tienda</option>
                @foreach($tiendas as $tienda)
                    <option value="{{ $tienda->id }}">{{ $tienda->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
