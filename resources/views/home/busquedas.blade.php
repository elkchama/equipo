<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Encuentra los mejores precios en productos tecnológicos con CONFER, el comparador de precios líder en Colombia.">
  <meta name="author" content="CONFER Team">
  <title>CONFER - Comparador de Precios</title>

  <!-- Estilos externos -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/busqueda.css">

  <!-- Estilos adicionales -->
  <link rel="stylesheet" href="globals.css">
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

  <!-- HERO / BANNER -->
  <main class="hero_area">
    <section class="banner_section">
      <div class="container">
        <h1>Encuentra los Mejores Precios con CONFER</h1>
        <p>Comparador de precios rápido, confiable y gratuito.</p>
        <a  href="{{ route('comparacion') }}" class="btn btn-primary">¡COMPARA!</a>
        <div class="image-gallery">
          <a href="#samsung" class="gallery-btn">
            <img src="img/celilares.jpg" alt="SAMSUNG">
            <h2>CELULARES</h2>
          </a>
          <a href="#iphone" class="gallery-btn">
            <img src="img/consolas.jpg" alt="IPHONE">
            <h2>CONSOLAS</h2>
          </a>
          <a href="#xiaomi" class="gallery-btn">
            <img src="img/audifonos.jpg" alt="XIAOMI">
            <h2>AUDIFONOS</h2>
          </a>
          <a href="#motorola" class="gallery-btn">
            <img src="img/tv.jpg" alt="MOTOROLA">
            <h2>TELEVISORES</h2>
          </a>
        </div>
      </div>
    </section>
  </main>

  <!-- SECCIÓN SOBRE NOSOTROS -->
  <section id="about" class="about_section">
    <div class="container">
      <h2>¿Qué es CONFER?</h2>
      <p>
        En CONFER, nuestra misión es ahorrarte tiempo y dinero ofreciendo una plataforma eficiente para comparar precios de productos tecnológicos en las principales tiendas de Colombia. Navega por un solo sitio y encuentra las mejores ofertas de manera sencilla.
      </p>
      <p>Sabemos lo importante que es para ti ahorrar, así que hacemos lo mejor posible para ayudarte a tomar la mejor decisión.</p>
    </div>
  </section>

  <!-- SECCIÓN DE CARACTERÍSTICAS -->
  <section id="features" class="features_section">
    <div class="container">
      <h2>CONFER</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-search-dollar fa-3x"></i>
            <h4>Comparación de Precios</h4>
            <p>Compara miles de productos de diferentes tiendas en un solo lugar.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-clock fa-3x"></i>
            <h4>Resultados en Tiempo Real</h4>
            <p>Obtén resultados actualizados al instante con nuestra tecnología avanzada.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-lock fa-3x"></i>
            <h4>Seguro y Confiable</h4>
            <p>Protegemos tus datos mientras te ayudamos a ahorrar tiempo y dinero.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN DE BENEFICIOS -->
  <section class="benefits_section">
    <div class="container">
      <h2>Beneficios de Usar CONFER</h2>
      <ul>
        <li>Ahorra tiempo buscando ofertas en múltiples tiendas.</li>
        <li>Accede a descuentos exclusivos de nuestros socios comerciales.</li>
        <li>Facilidad de uso con nuestra interfaz intuitiva.</li>
      </ul>
    </div>
  </section>

  <!-- SECCIÓN DE TESTIMONIOS -->
  <section class="testimonials_section">
    <div class="container">
      <h2>Lo Que Dicen Nuestros Usuarios</h2>
      <div class="row">
        <div class="col-md-4">
          <blockquote>
            "Gracias a CONFER encontré el mejor precio para mi nuevo portátil. ¡Recomendado 100%!"<br>
            <cite>- María López</cite>
          </blockquote>
        </div>
        <div class="col-md-4">
          <blockquote>
            "Una herramienta indispensable para quienes queremos ahorrar sin complicarnos."<br>
            <cite>- Andrés Gómez</cite>
          </blockquote>
        </div>
        <div class="col-md-4">
          <blockquote>
            "Rápido, fácil y confiable. Ahora siempre uso CONFER antes de comprar."<br>
            <cite>- Laura Martínez</cite>
          </blockquote>
        </div>
      </div>
    </div>
  </section>



  <!-- SECCIÓN DE CONTACTO -->
  <section id="contact" class="contact_section">
    <div class="container">
      <h2>Contáctanos</h2>
      <form>
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" id="name" class="form-control" placeholder="Tu nombre">
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" class="form-control" placeholder="Tu correo">
        </div>
        <div class="form-group">
          <label for="message">Mensaje:</label>
          <textarea id="message" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí"></textarea>
        </div>
        <div class="form-group">
          <label for="rating">Calificación:</label>
          <select id="rating" class="form-control" required>
            <option value="">Selecciona una calificación</option>
            <option value="5">⭐⭐⭐⭐⭐ Excelente</option>
            <option value="4">⭐⭐⭐⭐ Muy bueno</option>
            <option value="3">⭐⭐⭐ Bueno</option>
            <option value="2">⭐⭐ Regular</option>
            <option value="1">⭐ Malo</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
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

  <!-- Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/main.js"></script>
  <!-- Script para cambiar clase 'scrolled' en header -->
  <script>
    window.addEventListener("scroll", () => {
      const header = document.getElementById("mainHeader");
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  </script>
</body>

</html>