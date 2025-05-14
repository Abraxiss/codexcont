

<!-- Diario -->

<style>
  body {
    background-color: #121212;
    color: #e0e0e0;
  }

  .record-card {
    background: #1e1e1e;
    border-radius: 10px;
    padding: 10px 15px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .record-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
  }

  .record-title {
    margin: 0;
    font-size: 16px;
    color: #f1f1f1;
  }

  .record-icon {
    width: 40px;
    height: 40px;
    background: #2c2c2c;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    margin-right: 10px;
  }

  .record-icon img {
    max-width: 100%;
    height: auto;
  }

  .btn-icon {
    font-size: 20px;
    border: none;
    background: transparent;
    cursor: pointer;
    transition: color 0.2s ease;
  }

  .btn-icon:hover {
    color: #00bcd4;
  }

  .badge.bg-primary {
    background-color: #1976d2 !important;
    color: white;
  }

  h5.text-center {
    font-family: 'Comic Sans MS', sans-serif;
    color: #ffffff;
    margin-top: 20px;
  }
</style>



<?php

$query = "SELECT diario.id_user, diario.codigo_partida, diario.apertura, diario.IMPORTE, diario.fecha_at, diario.codigo_operacion
FROM diario
GROUP BY diario.id_user, diario.codigo_partida, diario.apertura, diario.IMPORTE, diario.fecha_at, diario.codigo_operacion
HAVING (((diario.id_user)=18) AND ((diario.apertura)=0))
ORDER BY diario.fecha_at DESC;

";
$result = mysqli_query($conexion, $query);
?>

  <h5 class="text-center " style="font-family: 'Comic Sans MS', sans-serif;">– DIARIO –</h5>

  <!-- Registro de ejemplo -->
    <?php while ($filas = mysqli_fetch_assoc($result)): ?>
  <div class="record-card d-flex align-items-center">
    <div class="d-flex align-items-center">
      <div class="record-icon">
        <img src="img/nregistro/v.png" alt="ventas" class="img-fluid" style="background:#1e1e1e;">
        
      </div>
       <p class="record-title mb-0">
  <?php echo date("H:i", strtotime($filas['fecha_at'])); ?>
</p>

       🕙<p class="record-title mb-0"><?php echo $filas['codigo_operacion']; ?></p>
    </div>
    <div class="d-flex align-items-center gap-3">
      <span class="badge bg-primary fs-6"><?php echo $filas['IMPORTE']; ?></span>
      <button style="color:red;" class="btn-icon "><i class="fas fa-trash"></i></button>
      <button style="color:black;" class="btn-icon "><i class="fas fa-check-circle"></i></button>
    </div>
  </div>

<?php endwhile; ?>

</div>
