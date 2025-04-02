<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos Tecnológicos - CONFER</title>
  <!-- Puedes incluir tus hojas de estilo según la estructura de tu proyecto -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="globals.css">
  <link rel="stylesheet" href="/assets/css/productos.css">
</head>
<body>
  <!-- HEADER -->
  <header class="header" id="mainHeader">
    <div class="container">
      <nav class="navbar">
        <!-- Logo y marca -->
        <a href="dashboard.html" class="navbar-brand">
          <img src="/logo.png" alt="CONFER Logo">
          <span>CONFER</span>
        </a>
        <!-- Contenedor de navegación y búsqueda -->
        <div class="navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="nosotros.html">Productos</a></li>
            <li class="nav-item"><a class="nav-link" href="error500.html">Búsquedas recientes</a></li>
            <li class="nav-item"><a class="nav-link" href="tiendas.html">Tiendas</a></li>
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
              <img src="/user-avatar.png" alt="Usuario" class="user-avatar">
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- MAIN CONTENT: Productos por Categoría -->
  <main class="products-section">
    <div class="container">
      <h1 class="section-title">Productos Tecnológicos</h1>
      <p class="section-subtitle">Descubre los mejores productos tecnológicos de nuestras tiendas aliadas.</p>

      <!-- Navegación de categorías -->
      <nav class="product-categories">
        <ul>
          <li><a href="#celulares">Celulares</a></li>
          <li><a href="#computadoras">Computadoras</a></li>
          <li><a href="#televisores">Televisores</a></li>
          <li><a href="#accesorios">Accesorios</a></li>
          <li><a href="#audio">Audio</a></li>
        </ul>
      </nav>

      <!-- Categoría: Celulares -->
      <section id="celulares" class="category-section">
        <h2>Celulares</h2>
        <div class="product-grid">
          <!-- Producto 1 -->
          <div class="product-card">
            <img src="vista/img/celular1.jpg" alt="Samsung Galaxy S21">
            <h3>Samsung Galaxy S21</h3>
            <p class="product-store">Éxito</p>
            <p class="product-price">$1,200,000</p>
            <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 2 -->
          <div class="product-card">
            <img src="vista/img/celular2.jpg" alt="iPhone 13">
            <h3>iPhone 13</h3>
            <p class="product-store">Falabella</p>
            <p class="product-price">$1,500,000</p>
            <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 3 -->
          <div class="product-card">
            <img src="vista/img/celular3.jpg" alt="Xiaomi Redmi Note 10">
            <h3>Xiaomi Redmi Note 10</h3>
            <p class="product-store">Mercado Libre</p>
            <p class="product-price">$800,000</p>
            <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      </section>

      <!-- Categoría: Computadoras -->
      <section id="computadoras" class="category-section">
        <h2>Computadoras</h2>
        <div class="product-grid">
          <!-- Producto 1 -->
          <div class="product-card">
            <img src="vista/img/computadora1.jpg" alt="Dell XPS 13">
            <h3>Dell XPS 13</h3>
            <p class="product-store">Linio</p>
            <p class="product-price">$2,200,000</p>
            <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 2 -->
          <div class="product-card">
            <img src="vista/img/computadora2.jpg" alt="MacBook Air">
            <h3>MacBook Air</h3>
            <p class="product-store">Alkosto</p>
            <p class="product-price">$3,000,000</p>
            <a href="https://www.alkosto.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      </section>

      <!-- Categoría: Televisores -->
      <section id="televisores" class="category-section">
        <h2>Televisores</h2>
        <div class="product-grid">
          <!-- Producto 1 -->
          <div class="product-card">
            <img src="vista/img/televisor1.jpg" alt="LG 55OLED">
            <h3>LG 55OLED</h3>
            <p class="product-store">Ktronix</p>
            <p class="product-price">$2,800,000</p>
            <a href="https://www.ktronix.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 2 -->
          <div class="product-card">
            <img src="vista/img/televisor2.jpg" alt="Samsung QLED 65">
            <h3>Samsung QLED 65</h3>
            <p class="product-store">Homecenter</p>
            <p class="product-price">$3,500,000</p>
            <a href="https://www.homecenter.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      </section>

      <!-- Categoría: Accesorios -->
      <section id="accesorios" class="category-section">
        <h2>Accesorios</h2>
        <div class="product-grid">
          <!-- Producto 1 -->
          <div class="product-card">
            <img src="vista/img/accesorio1.jpg" alt="Audífonos Sony">
            <h3>Audífonos Sony</h3>
            <p class="product-store">Éxito</p>
            <p class="product-price">$250,000</p>
            <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 2 -->
          <div class="product-card">
            <img src="vista/img/accesorio2.jpg" alt="Teclado Logitech">
            <h3>Teclado Logitech</h3>
            <p class="product-store">Falabella</p>
            <p class="product-price">$150,000</p>
            <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      </section>

      <!-- Categoría: Audio -->
      <section id="audio" class="category-section">
        <h2>Audio</h2>
        <div class="product-grid">
          <!-- Producto 1 -->
          <div class="product-card">
            <img src="vista/img/audio1.jpg" alt="Bocina JBL">
            <h3>Bocina JBL</h3>
            <p class="product-store">Mercado Libre</p>
            <p class="product-price">$300,000</p>
            <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
          <!-- Producto 2 -->
          <div class="product-card">
            <img src="vista/img/audio2.jpg" alt="Parlante Bose">
            <h3>Parlante Bose</h3>
            <p class="product-store">Linio</p>
            <p class="product-price">$450,000</p>
            <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      </section>
    </div>
  </main>

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
