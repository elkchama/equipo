@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultado de la Comparación</h1>

    @if($productoMasEconomico)
        <h2>Producto: {{ $productoMasEconomico->nombre }}</h2>
        <p>Descripción: {{ $productoMasEconomico->descripcion }}</p>
        <p>Precio más económico: ${{ $mejorPrecio }}</p>
        <p>Tienda: {{ $productoMasEconomico->tienda->nombre }}</p>
        <p>URL Tienda: <a href="{{ $productoMasEconomico->tienda->url }}" target="_blank">{{ $productoMasEconomico->tienda->url }}</a></p>
    @else
        <p>No se encontraron resultados.</p>
    @endif

    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver a productos</a>
</div>
@endsection
