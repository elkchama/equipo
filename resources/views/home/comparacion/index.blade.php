@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>

    @foreach($productos as $producto)
        <div class="producto">
            <h2>{{ $producto->nombre }}</h2>
            <p>{{ $producto->descripcion }}</p>
            <p>Precio: ${{ $producto->precio }}</p>
            <p>Tienda: {{ $producto->tienda->nombre }}</p>

            <form action="{{ route('comparar.precios') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <button type="submit" class="btn btn-warning">Comparar precios</button>
            </form>
        </div>
        <hr>
    @endforeach
</div>
@endsection
