<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menú de Registros - CODEX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>




    h3 {
      color: #66ccff;
    }

    .img-box {
      background-color: #1e1e1e;
      border-radius: 16px;
      padding: 20px;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
      cursor: pointer;
      position: relative;
    }

    .img-box:hover {
      transform: translateY(-5px) scale(1.05);
      background-color: #2a2a2a;
      box-shadow: 0 0 15px rgba(102, 204, 255, 0.5);
    }

    .img-box img {
      width: 64px;
      height: 64px;
      transition: transform 0.3s ease;
    }

    .img-box:hover img {
      transform: scale(1.1) rotate(-3deg);
    }

    .img-box:active {
      animation: clickEffect 0.4s ease-out;
    }

    @keyframes clickEffect {
      0% {
        transform: scale(1);
        box-shadow: 0 0 0 rgba(102, 204, 255, 0.5);
      }
      50% {
        transform: scale(0.95);
        box-shadow: 0 0 20px rgba(102, 204, 255, 0.8);
      }
      100% {
        transform: scale(1);
        box-shadow: 0 0 0 rgba(102, 204, 255, 0);
      }
    }

    span {
      font-weight: 500;
      color: #e0e0e0;
    }

    @media (max-width: 768px) {
      .col-4 {
        flex: 0 0 50%;
        max-width: 50%;
      }
    }

.container{

      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Segoe UI', sans-serif;
}
      
  </style>
</head>
<body>
  <div class="container py-4">
    <h3 class="fw-bold mb-4 text-center">Nuevo Registro</h3>

    <div class="row g-4 justify-content-center">
      <div class="col-4">
        <a href="nuevo_inventario.php">
          <div class="img-box">
            <img src="img/nregistro/i.png" alt="inventario" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Inventario Inicial</span>
      </div>

      <div class="col-4">
        <a href="nueva_venta.php">
          <div class="img-box">
            <img src="img/nregistro/V.png" alt="ventas" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Realizar Ventas</span>
      </div>

      <div class="col-4">
        <a href="nuevo_pasivos.php">
          <div class="img-box">
            <img src="img/nregistro/pagos.png" alt="deudas" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Gestión de Deudas</span>
      </div>

      <div class="col-4">
        <a href="nuevo_capital.php">
          <div class="img-box">
            <img src="img/nregistro/C.png" alt="capital" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Gestión de Capital</span>
      </div>

      <div class="col-4">
        <a href="nuevo_gasto.php">
          <div class="img-box">
            <img src="img/nregistro/g.png" alt="gastos" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Nuevo Gasto</span>
      </div>

      <div class="col-4">
        <a href="nueva_compraB.php">
          <div class="img-box">
            <img src="img/nregistro/bienes.png" alt="bienes" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Compra de Bienes</span>
      </div>

      <div class="col-4">
        <a href="nueva_compraM.php">
          <div class="img-box">
            <img src="img/nregistro/cm.png" alt="mercadería" />
          </div>
        </a>
        <span class="d-block text-center mt-2">Compra de Mercadería</span>
      </div>

      <div class="col-4">
        <div class="img-box">
          <img src="img/nregistro/e.png" alt="eventos" />
        </div>
        <span class="d-block text-center mt-2">Registro de Eventos</span>
      </div>
    </div>
  </div>
<script>
  // Efecto de salida antes de redireccionar
  document.querySelectorAll('.btn-link').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const destination = this.getAttribute('href');
      const box = this.querySelector('.img-box');
      box.classList.add('exit-animation');
      const delay = parseInt(this.dataset.delay) || 300;
      setTimeout(() => {
        window.location.href = destination;
      }, delay);
    });
  });
</script>
  <script>
    function toggleSelected(element) {
      element.classList.add("clicked");
      setTimeout(() => {
        element.classList.remove("clicked");
      }, 400);
    }
  </script>
</body>
</html>
