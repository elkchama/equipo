<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>Comparación de Precios</title>
    <link rel="stylesheet" href="/assets/css/comparacion.css">
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
  <div class="color-carousel"></div>
  <div class="floating-currency">
    <span style="left: 10%; animation-delay: 0s;">$</span>
    <span style="left: 30%; animation-delay: 2s;">$</span>
    <span style="left: 50%; animation-delay: 4s;">$</span>
    <span style="left: 70%; animation-delay: 1s;">$</span>
    <span style="left: 90%; animation-delay: 3s;">$</span>
    <span style="left: 90%; animation-delay: 3s;">$</span>

  </div>
  <!-- Resto del contenido -->
</body>


<body>
    <nav>
        <a href="{{ route('busquedas.index')}}" class="btn-volver">← Volver</a>
        {{-- O si prefieres ir a una ruta específica: --}}
        {{-- <a href="{{ route('inicio') }}" class="btn-volver">← Volver al Inicio</a> --}}
    </nav>

    <div class="carousel-container">
    <h1>Comparación de Precios</h1>

    <div class="carousel-form">
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
            <p class="error-message">{{ session('error') }}</p>
        @endif
    </div>
</div>
