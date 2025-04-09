<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos Tecnológicos - CONFER</title>
  <!-- Incluye tus hojas de estilo según la estructura de tu proyecto -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="globals.css">
  <link rel="stylesheet" href="/assets/css/productos.css">
  <style>
    /* ------------------------------
       Estilos para el Filtro de Categorías
    ------------------------------ */
    .filter-menu {
      margin: 120px auto 30px;
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }
    .filter-menu button {
      background: #fff;
      border: 2px solid #ff5858;
      color: #ff5858;
      padding: 8px 16px;
      border-radius: 4px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .filter-menu button.active,
    .filter-menu button:hover {
      background: #ff5858;
      color: #fff;
    }

    /* ------------------------------
       Grid de Productos
    ------------------------------ */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding-bottom: 40px;
    }
    .product-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      text-align: center;
      padding: 15px;
    }
    .product-card:hover {
      transform: translateY(-5px);
    }
    .product-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 4px;
    }
    .product-card h3 {
      margin-top: 10px;
      font-size: 1.1rem;
      color: #333;
    }
    .product-store {
      font-size: 0.9rem;
      color: #777;
      margin: 5px 0;
    }
    .product-price {
      font-size: 1rem;
      color: #ff5858;
      margin: 10px 0;
    }
    .product-card .btn {
      margin-top: 10px;
      padding: 8px 14px;
      font-size: 0.9rem;
    }
  </style>
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
  <a href="{{ route('busquedas.index')}}" class="btn-volver">← Volver</a>

  <!-- MAIN CONTENT: Productos con Filtro -->
  
 <a href="{{ route('busquedas.index')}}" class="btn-volver">← Volver</a>
  <main class="products-section">
  
    <div class="container">
    
      <h1 class="section-title">Productos Tecnológicos</h1>
      <p class="section-subtitle" style="text-align:center; margin-bottom: 30px;">Selecciona una categoría para ver los productos</p>

      <!-- Menú de Filtro -->
      <div class="filter-menu">
        <button class="filter-btn active" data-filter="all">Todos</button>
        <button class="filter-btn" data-filter="celulares">Celulares</button>
        <button class="filter-btn" data-filter="computadoras">Computadoras</button>
        <button class="filter-btn" data-filter="televisores">Televisores</button>
        <button class="filter-btn" data-filter="accesorios">Accesorios</button>
        <button class="filter-btn" data-filter="audio">Audio</button>
      </div>

      <!-- Grid de Productos -->
      <div class="product-grid">
        <!-- Productos - Celulares -->
        <div class="product-card" data-category="celulares">
          <img src="vista/img/celular1.jpg" alt="Samsung Galaxy S21">
          <h3>Samsung Galaxy S21</h3>
          <p class="product-store">Éxito</p>
          <p class="product-price">$1,200,000</p>
          <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="celulares">
          <img src="vista/img/celular2.jpg" alt="iPhone 13">
          <h3>iPhone 13</h3>
          <p class="product-store">Falabella</p>
          <p class="product-price">$1,500,000</p>
          <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="celulares">
          <img src="vista/img/celular3.jpg" alt="Xiaomi Redmi Note 10">
          <h3>Xiaomi Redmi Note 10</h3>
          <p class="product-store">Mercado Libre</p>
          <p class="product-price">$800,000</p>
          <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="celulares">
          <img src="vista/img/celular4.jpg" alt="Huawei P40">
          <h3>Huawei P40</h3>
          <p class="product-store">Éxito</p>
          <p class="product-price">$1,100,000</p>
          <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="celulares">
          <img src="vista/img/celular5.jpg" alt="OnePlus 9">
          <h3>OnePlus 9</h3>
          <p class="product-store">Falabella</p>
          <p class="product-price">$1,300,000</p>
          <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>

        <!-- Productos - Computadoras -->
        <div class="product-card" data-category="computadoras">
          <img src="vista/img/computadora1.jpg" alt="Dell XPS 13">
          <h3>Dell XPS 13</h3>
          <p class="product-store">Linio</p>
          <p class="product-price">$2,200,000</p>
          <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="computadoras">
          <img src="vista/img/computadora2.jpg" alt="MacBook Air">
          <h3>MacBook Air</h3>
          <p class="product-store">Alkosto</p>
          <p class="product-price">$3,000,000</p>
          <a href="https://www.alkosto.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="computadoras">
          <img src="vista/img/computadora3.jpg" alt="HP Envy">
          <h3>HP Envy</h3>
          <p class="product-store">Mercado Libre</p>
          <p class="product-price">$1,900,000</p>
          <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="computadoras">
          <img src="vista/img/computadora4.jpg" alt="Lenovo ThinkPad">
          <h3>Lenovo ThinkPad</h3>
          <p class="product-store">Linio</p>
          <p class="product-price">$2,500,000</p>
          <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="computadoras">
          <img src="vista/img/computadora5.jpg" alt="Asus ZenBook">
          <h3>Asus ZenBook</h3>
          <p class="product-store">Alkosto</p>
          <p class="product-price">$2,800,000</p>
          <a href="https://www.alkosto.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>

        <!-- Productos - Televisores -->
        <div class="product-card" data-category="televisores">
          <img src="vista/img/televisor1.jpg" alt="LG 55OLED">
          <h3>LG 55OLED</h3>
          <p class="product-store">Ktronix</p>
          <p class="product-price">$2,800,000</p>
          <a href="https://www.ktronix.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="televisores">
          <img src="vista/img/televisor2.jpg" alt="Samsung QLED 65">
          <h3>Samsung QLED 65</h3>
          <p class="product-store">Homecenter</p>
          <p class="product-price">$3,500,000</p>
          <a href="https://www.homecenter.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="televisores">
          <img src="vista/img/televisor3.jpg" alt="Sony Bravia 55">
          <h3>Sony Bravia 55</h3>
          <p class="product-store">Falabella</p>
          <p class="product-price">$3,200,000</p>
          <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="televisores">
          <img src="vista/img/televisor4.jpg" alt="Philips 50LED">
          <h3>Philips 50LED</h3>
          <p class="product-store">Mercado Libre</p>
          <p class="product-price">$1,900,000</p>
          <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="televisores">
          <img src="vista/img/televisor5.jpg" alt="Panasonic 60">
          <h3>Panasonic 60</h3>
          <p class="product-store">Linio</p>
          <p class="product-price">$2,600,000</p>
          <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>

        <!-- Productos - Accesorios -->
        <div class="product-card" data-category="accesorios">
          <img src="vista/img/accesorio1.jpg" alt="Audífonos Sony">
          <h3>Audífonos Sony</h3>
          <p class="product-store">Éxito</p>
          <p class="product-price">$250,000</p>
          <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="accesorios">
          <img src="vista/img/accesorio2.jpg" alt="Teclado Logitech">
          <h3>Teclado Logitech</h3>
          <p class="product-store">Falabella</p>
          <p class="product-price">$150,000</p>
          <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="accesorios">
          <img src="vista/img/accesorio3.jpg" alt="Mouse Gamer">
          <h3>Mouse Gamer</h3>
          <p class="product-store">Mercado Libre</p>
          <p class="product-price">$120,000</p>
          <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="accesorios">
          <img src="vista/img/accesorio4.jpg" alt="Base Refrigerante">
          <h3>Base Refrigerante</h3>
          <p class="product-store">Linio</p>
          <p class="product-price">$100,000</p>
          <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="accesorios">
          <img src="vista/img/accesorio5.jpg" alt="Protector de Pantalla">
          <h3>Protector de Pantalla</h3>
          <p class="product-store">Alkosto</p>
          <p class="product-price">$80,000</p>
          <a href="https://www.alkosto.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>

        <!-- Productos - Audio -->
        <div class="product-card" data-category="audio">
          <img src="vista/img/audio1.jpg" alt="Bocina JBL">
          <h3>Bocina JBL</h3>
          <p class="product-store">Mercado Libre</p>
          <p class="product-price">$300,000</p>
          <a href="https://www.mercadolibre.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="audio">
          <img src="vista/img/audio2.jpg" alt="Parlante Bose">
          <h3>Parlante Bose</h3>
          <p class="product-store">Linio</p>
          <p class="product-price">$450,000</p>
          <a href="https://www.linio.com.co" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="audio">
          <img src="vista/img/audio3.jpg" alt="Auriculares Beats">
          <h3>Auriculares Beats</h3>
          <p class="product-store">Falabella</p>
          <p class="product-price">$350,000</p>
          <a href="https://www.falabella.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="audio">
          <img src="vista/img/audio4.jpg" alt="Micrófono Rode">
          <h3>Micrófono Rode</h3>
          <p class="product-store">Éxito</p>
          <p class="product-price">$500,000</p>
          <a href="https://www.exito.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
        <div class="product-card" data-category="audio">
          <img src="vista/img/audio5.jpg" alt="Sistema de Sonido">
          <h3>Sistema de Sonido</h3>
          <p class="product-store">Ktronix</p>
          <p class="product-price">$650,000</p>
          <a href="https://www.ktronix.com" target="_blank" class="btn btn-primary">Ver producto</a>
        </div>
      </div>
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

  <!-- Script para filtrar productos -->
  <script>
    // Obtén todos los botones del filtro y las tarjetas de producto
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        // Quitar la clase 'active' de todos los botones y agregarla al seleccionado
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filterValue = button.getAttribute('data-filter');

        productCards.forEach(card => {
          // Si el filtro es "all" se muestran todos o si coincide con data-category
          if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>
