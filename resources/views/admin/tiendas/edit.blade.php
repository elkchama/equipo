@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Tienda</h1>
    <form action="{{ route('admin.tiendas.update', $tienda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $tienda->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $tienda->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $tienda->url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.tiendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
