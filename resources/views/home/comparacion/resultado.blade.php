<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/css/resultado.css">
</head>
<!-- HEADER -->
<header class="header" id="mainHeader">
    <div class="container">
      <nav class="navbar">
        <!-- Logo y marca -->
        <a href="dashboard.html" class="navbar-brand">
          <img src="img/logo.png" alt="CONFER Logo">
          <span>CONFER</span>
        </a>

           <!-- Contenedor de navegación y búsqueda -->
        <div class="navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('productos.index')}}">Productos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tiendas') }}">Tiendas</a></li>

          </ul>
          <div class="right-section">
            <form action="{{ route('search.buscar') }}" method="GET" class="search d-flex">
                <input type="text" name="query" placeholder="Buscar productos" class="search-input" required>
                <button type="submit" class="search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>

        <a href="login.html" class="login-button">
            <img src="img/user.png" alt="Usuario" class="user-avatar">
          </a>
            <div class="text-end px-2">
              <a href="{{ route('logout.perform') }}" class="link-nav-clone">Salir</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
<body>
    <h1>Resultado de Comparación</h1>

    <!-- Botones de navegación -->
    <div class="btn-container">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>

    </div>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Comparación</title>
    <link rel="stylesheet" href="{{ asset('css/resultado.css') }}">
    <style>
        /* Estilos básicos para la tabla */
        body {
            background: #e4e4e4;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
          font-size: 2.8rem;
           font-weight: bold;
           text-align: center;
          margin-bottom: 20px;

         /* Multicolor degradado aplicado al texto */
          background: linear-gradient(90deg,rgb(12, 48, 133),rgb(157, 20, 87),rgb(186, 45, 26),rgb(14, 101, 125));
          background-size: 300% 300%;
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
         animation: h1Gradient 5s ease infinite;
        }

@keyframes h1Gradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

        table {
            width: 80%;
            margin: 0 auto 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4caf50;
            color:rgb(255, 255, 255);
        }
        tr:nth-child(even) td {
            background-color: #f7f7f7;
        }
        tr:hover td {
            background-color: #e0f7fa;
        }
        /* Resaltar la fila del precio más bajo */
        .precio-bajo {
            background-color: #b2dfdb !important;
            font-weight: bold;
        }
        p {
            text-align: cente;
            font-size: 3.1rem;
            color: #094166;
        }
    </style>
</head>
<body>
    <h1>Resultado de Comparación</h1>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tienda</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr class="{{ $producto->precio == $precioMasBajo ? 'precio-bajo' : '' }}">
                    <td>{{ $producto->producto }}</td>
                    <td>{{ $producto->tienda }}</td>
                    <td>{{ number_format($producto->precio, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No se encontraron precios para este producto.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p>El precio más bajo es: {{ number_format($precioMasBajo, 2, ',', '.') }}</p>


</body>
</html>

