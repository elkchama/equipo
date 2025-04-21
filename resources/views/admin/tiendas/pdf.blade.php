<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Tiendas del sistema</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre de Tienda</th>
                <th>Descripción</th>
                <th>Nombre de Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiendas as $tienda)
                @foreach($tienda->productos as $producto)
                    <tr>
                        <td>{{ $tienda->nombre }}</td>
                        <td>{{ $tienda->descripcion ?? '-' }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>
</html>
