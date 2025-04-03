@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Producto</h2>

    <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="tienda_id" class="form-label">Tienda:</label>
            <select class="form-control" id="tienda_id" name="tienda_id" required>
                @foreach($tiendas as $tienda)
                    <option value="{{ $tienda->id }}" {{ $producto->tienda_id == $tienda->id ? 'selected' : '' }}>
                        {{ $tienda->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
