<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiendas de Colombia</title>
  <link rel="stylesheet" href="/assets/css/tienda.css">
  <link rel="stylesheet" href="tiendas.css">

</head>
<body>
  <!-- HEADER -->
  <header class="header" id="mainHeader">
    <div class="container">
      <nav class="navbar">
        <a href="dashboard.html" class="navbar-brand">
          <img src="img/logo.png" alt="CONFER Logo">
          <span>CONFER</span>
        </a>
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

  <!-- SECCIÓN TIENDAS -->
  <section class="stores-section">
    <div class="stores-header">
    <br></br>
    <br></br>
   
    
    <a href="{{ route('busquedas.index')}}" class="btn-volver">← Volver</a>
      <h1>Tiendas de Colombia</h1>
      <p>Explora las mejores tiendas en línea y físicas de Colombia. Encuentra los productos que necesitas en las plataformas más reconocidas del país.</p>
      
    </div>

    <div class="stores-container">
    

      <?php
      // EJEMPLO: Array con todas las tiendas (podrías obtenerlo de la base de datos)
      $tiendas = [
        [
          'nombre' => 'Éxito',
          'descripcion' => 'Una de las cadenas de tiendas más grandes del país, ofrece productos de todo tipo.',
          'url' => 'https://www.exito.com',
          'imagen' => 'img/exito.jpg'
        ],
        [
          'nombre' => 'Falabella',
          'descripcion' => 'Retailer reconocido con una amplia gama de productos para el hogar, moda y tecnología.',
          'url' => 'https://www.falabella.com',
          'imagen' => 'img/falabella.jpg'
        ],
        [
          'nombre' => 'Mercado Libre',
          'descripcion' => 'Plataforma líder de comercio electrónico en Latinoamérica, con millones de productos.',
          'url' => 'https://www.mercadolibre.com.co',
          'imagen' => 'img/mercado.jpg'
        ],
        [
          'nombre' => 'Linio',
          'descripcion' => 'Popular plataforma de e-commerce que ofrece tecnología, moda y más.',
          'url' => 'https://www.linio.com.co',
          'imagen' => 'img/linio.jpg'
        ],
        [
          'nombre' => 'Alkosto',
          'descripcion' => 'Gran variedad de productos tecnológicos, electrodomésticos y más, a precios competitivos.',
          'url' => 'https://www.alkosto.com',
          'imagen' => 'img/alkosto.png'
        ],
        [
          'nombre' => 'Ktronix',
          'descripcion' => 'Especializada en tecnología y electrónica, con amplia selección de gadgets y dispositivos.',
          'url' => 'https://www.ktronix.com',
          'imagen' => 'img/ktronix.jpg'
        ],
        [
          'nombre' => 'Homecenter',
          'descripcion' => 'Todo para el hogar y la construcción, con ofertas en muebles, herramientas y decoración.',
          'url' => 'https://www.homecenter.com.co',
          'imagen' => 'img/homecenter.png'
        ]
      ];

      // Verificamos si tenemos tiendas
      if (!empty($tiendas)) {
        foreach ($tiendas as $tienda) {
          // Generamos el HTML para cada tienda
          echo '<a href="'.htmlspecialchars($tienda['url']).'" class="store-card" target="_blank">';
          echo '<img src="'.htmlspecialchars($tienda['imagen']).'" alt="Logo '.htmlspecialchars($tienda['nombre']).'">';
          echo '</h2>';
          echo '<p>'.htmlspecialchars($tienda['descripcion']).'</p>';
          echo '</a>';
        }
      } else {
        echo '<p>No se encontraron tiendas.</p>';
      }
      ?>
    </div>
    <br><br>
  </section>

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
