<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultados de Búsqueda - CONFER</title>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="/assets/css/busqueda.css">
  <link rel="stylesheet" href="/assets/css/search.css">
  <!-- Incluye tu CSS personalizado al final -->
  <link rel="stylesheet" href="/assets/css/estilos-personalizados.css">
</head>
<body>

  <!-- HEADER -->
  <header class="header" id="mainHeader">
    <div class="container">
      <nav class="navbar">
        <!-- Logo y marca -->
        <a href="dashboard.html" class="navbar-brand">
          <img src="img/logo.png" alt="CONFER Logo">
          <span>CONFER</span>
        </a>
        <!-- Navegación y búsqueda -->
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
      </nav>
    </div>
  </header>

  <!-- MAIN (Contenedor principal) -->
  <main class="contenido-principal">
    <div class="container my-5">
      <br></br>
      <br></br>

      <a href="{{ route('busquedas.index')}}" class="btn-volver">← Volver</a>
      <h2 class="mb-4">Resultados para: "{{ $termino }}"</h2>
      <div class="row mb-4">
        <div class="col-md-12">
          <h5>Resultados encontrados: {{ $productos->count() }}</h5>
          <br></bar>
        </div>
        

      @if ($productos->isEmpty())
  <div class="alert alert-warning">No se encontraron productos para tu búsqueda.</div>
@else
  <div class="contenedor-productos">
    @foreach ($productos as $producto)
      <div class="producto-card">
        <h5 class="titulo">{{ $producto->nombre }}</h5>
        <p class="descripcion">
          Precio: ${{ number_format($producto->precio, 0, ',', '.') }}<br>
          Tienda: {{ $producto->tienda->nombre ?? 'Sin tienda asignada' }}
        </p>
        <a href="#" class="ver-detalles">Ver Detalles</a>
      </div>
    @endforeach
  </div>

<div class="boton-comparar-wrapper">
  <a href="{{ route('comparacion') }}" class="btn-compara">¡COMPARA!</a>
    <br></br>
  </div>
@endif

  <!-- FOOTER -->
  <footer class="footer_section">
    <div class="container">
      <p>&copy; 2024 CONFER | By Jonny Fernando Gonzalez Quiroga</p>
      <div class="social_links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
</body>
</html>
