@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Crear Nueva Tienda</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tiendas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Tienda</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="url" name="url" id="url" class="form-control">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="es_aliada" id="es_aliada" class="form-check-input" value="1">
                <label for="es_aliada" class="form-check-label">¿Es aliada?</label>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Tienda</button>
            <a href="{{ route('admin.tiendas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
