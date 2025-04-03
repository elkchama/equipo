<!DOCTYPE html>

<html lang="es">
<!-- Enlace al CSS desde una vista Blade -->
<head>
    <meta charset="UTF-8">
    <title>Comparación de Precios</title>
    <link rel="stylesheet" href="/assets/css/comparacion.css">
</head>

<body>
    <h1>Comparación de Precios</h1>

    <form action="{{ route('comparar') }}" method="POST">
        @csrf
        <label for="producto_id">Selecciona un producto:</label>
        <select name="producto_id" id="producto_id" required>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
        <button type="submit">Comparar</button>
    </form>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>
