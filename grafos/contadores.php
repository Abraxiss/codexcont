
<style>
    body {
      background-color: #cfd4db;
      font-family: 'Segoe UI', sans-serif;
    }
.counter-box {
  background: white;
  border-radius: 12px;
  padding: 5px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.counter-label {
  font-weight: bold;
  color: #27a8b2;
  text-transform: uppercase;
  font-size: 15px;
}

.counter-icon {
  font-size: 33px;
  color: #27a8b2;
}

.counter-value {
  font-size: 36px;
  font-weight: bold;
  color: #27a8b2;
}


  </style>


<?php

$query = "SELECT diario.id_user, diario.codigo_partida, diario.fecha_at, diario.codigo_operacion
FROM diario
GROUP BY diario.id_user, diario.codigo_partida, diario.fecha_at, diario.codigo_operacion
HAVING (((diario.id_user)=18));
";
$result = mysqli_query($conexion, $query);
  $numfilas = mysqli_num_rows($result);


?>

<div class="container py-2">
  <!-- Top counters -->
  <div class="row mb-2">
<div class="col-6">
  <div class="counter-box text-center">
    <div class="counter-label">Contadores</div>
    <div class="d-flex justify-content-center align-items-center mt-2">
      <div class="counter-icon"><i class="fas fa-user"></i></div>
      <div class="counter-value ms-2">3</div>
    </div>
  </div>
</div>
<div class="col-6">
  <div class="counter-box text-center">
    <div class="counter-label" style="color: #7ec540;">Asientos</div>
    <div class="d-flex justify-content-center align-items-center mt-2">
      <div class="counter-icon" style="color: #7ec540;"><i class="fas fa-layer-group"></i></div>
      <div class="counter-value ms-2" style="color: #7ec540;"><?php echo $numfilas; ?></div>
    </div>
  </div>
</div>

</div>
</div>
