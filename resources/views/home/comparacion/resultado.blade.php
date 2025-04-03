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
            <li class="nav-item"><a class="nav-link" href="nosotros.html">Productos</a></li>
            <li class="nav-item"><a class="nav-link" href="error500.html">Búsquedas recientes</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tiendas') }}">Tiendas</a></li>
            

          </ul>
          <div class="right-section">
            <div class="search">
              <input type="text" placeholder="Buscar productos" class="search-input">
              <button type="button" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>
            </div>

            <a href="login.html" class="login-button">
              <img src="img/user.png" alt="Usuario" class="user-avatar">
              <div class="text-end px-2">
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">salir</a>
              </div>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
<body>
    <h1>Resultado de Comparación</h1>

    <!-- Botones de navegación -->
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
        
    </div>

    <table border="7">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tienda</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comparacion as $producto)
                <tr>
                    <td>{{ $producto->producto }}</td>
                    <td>{{ $producto->tienda }}</td>
                    <td>{{ number_format($producto->precio, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No se encontraron productos con el precio más barato.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    <div>
       
        
    </div>
</body>
</html>
