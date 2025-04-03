<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - CONFER</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <header class="header">
    <nav class="navbar">
      <div class="logo">
        <img src="vista/img/logo.png" alt="CONFER Logo">
      </div>
      <ul class="nav-links">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li><a href="{{ route('admin.tiendas.index') }}">Tiendas</a></li>
        <li><a href="{{ route('admin.productos.index')}}">Productos</a></li>
        <li><a href="login.html">Cerrar sesión</a></li>
      </ul>
    </nav>
  </header>

  <main class="main-dashboard">
    <div class="dashboard-container">
      <div class="dashboard-cards">
        <div class="card">
          <h3>Tienda mas buscada</h3>
          <p>Alkosto</p>
        </div>
        <div class="card">
          <h3>Productos comparados</h3>
          <p>1,200</p>
        </div>
        <div class="card">
          <h3>Usuarios Activos</h3>
          <p>850</p>
        </div>
      </div>

  </header>
  <main class="main-dashboard">
    <div class="dashboard-container">
      <div class="charts-section">
        <!-- Gráfico de Ventas por Categoría -->
        <div class="chart-container">
          <h3>Ventas por Categoría</h3>
          <canvas id="categoryChart"></canvas>
        </div>
        <br>
        <br>

        <!-- Gráfico de Ventas por Tienda -->
        <div class="chart-container">
          <h3>Ventas por Tiendas</h3>
          <canvas id="storeChart"></canvas>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Datos para el gráfico de ventas por categoría
    const categoryData = {
      labels: ['Celulares', 'Consolas', 'Audífonos', 'Televisores'],
      datasets: [{
        label: 'Ventas',
        data: [40, 15, 25, 20], // Ejemplo de datos
        backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#9c27b0'],
        borderColor: ['#388e3c', '#f57c00', '#1976d2', '#7b1fa2'],
        borderWidth: 1
      }]
    };

    // Configuración del gráfico de ventas por categoría
    const categoryConfig = {
      type: 'pie',
      data: categoryData,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ": " + tooltipItem.raw + "%";
              }
            }
          }
        }
      }
    };

    // Crear el gráfico de ventas por categoría
    const categoryChart = new Chart(document.getElementById('categoryChart'), categoryConfig);

    // Datos para el gráfico de ventas por tiendas
    const storeData = {
      labels: ['Celulares', 'Audífonos', 'Consolas', 'Televisores'],
      datasets: [
        {
          label: 'Alkosto',
          data: [4.5, 2.3, 3.4, 1.2],
          backgroundColor: '#1976d2',
          borderColor: '#1565c0',
          borderWidth: 1
        },
        {
          label: 'Amazon',
          data: [3.0, 1.8, 2.4, 2.5],
          backgroundColor: '#ff9800',
          borderColor: '#f57c00',
          borderWidth: 1
        },
        {
          label: 'Mercado Libre',
          data: [2.5, 2.7, 2.0, 3.0],
          backgroundColor: '#4caf50',
          borderColor: '#388e3c',
          borderWidth: 1
        }
      ]
    };

    // Configuración del gráfico de ventas por tienda
    const storeConfig = {
      type: 'bar',
      data: storeData,
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            position: 'top',
          }
        }
      }
    };

    // Crear el gráfico de ventas por tienda
    const storeChart = new Chart(document.getElementById('storeChart'), storeConfig);
  </script>

</body>
</html>
      <div class="images-section">
        <h3>Ventas Recientes</h3>
        <div class="image-gallery">
          <div class="image-item">
            <img src="vista/img/samsung.jpg" alt="Celulares">
            <p>Celular Samsung S24 ultra 5G</p>
          </div>
          <div class="image-item">
            <img src="vista/img/ps5.jpg" alt="Consolas">
            <p>Consola PlayStation 5</p>
          </div>
          <div class="image-item">
            <img src="vista/img/auidifonos.jpg" alt="Audífonos">
            <p>Airpods color rosa crema</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer_section">
    <div class="container">
      <p>&copy; 2024 CONFER | By Jonny Fernando Gonzalez Quiroga</p>
      <div class="social_links">
        <br>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>


  <script src="scripts.js"></script>
</body>
</html>
