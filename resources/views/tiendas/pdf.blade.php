<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Comparación de Precios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }
        .date {
            font-size: 11px;
            color: #777;
            margin-bottom: 20px;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .lowest-price {
            background-color: #e6f7ff;
            font-weight: bold;
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .summary-item {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Reporte de Comparación de Precios</div>
        <div class="subtitle">{{ $producto }}</div>
        <div class="date">Generado el: {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tienda</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultados as $resultado)
            <tr class="{{ $resultado['Precio'] == $precioMasBajo ? 'lowest-price' : '' }}">
                <td>{{ $resultado['Tienda'] }}</td>
                <td>${{ number_format($resultado['Precio'], 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-item"><strong>Precio más bajo:</strong> ${{ number_format($precioMasBajo, 2, ',', '.') }}</div>
        <div class="summary-item"><strong>Precio más alto:</strong> ${{ number_format(max(array_column($resultados, 'Precio')), 2, ',', '.') }}</div>
        <div class="summary-item"><strong>Diferencia:</strong> ${{ number_format(max(array_column($resultados, 'Precio')) - $precioMasBajo, 2, ',', '.') }}</div>
        <div class="summary-item"><strong>Total de tiendas comparadas:</strong> {{ count($resultados) }}</div>
    </div>
</body>
</html>
