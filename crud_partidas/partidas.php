<?php include("data/conexion.php"); ?>

<?php
// Asegúrate de que $id_user está definido
// Puedes obtenerlo desde sesión u otro medio según tu flujo
// session_start();
// $id_user = $_SESSION['id_user']; 

$query = "SELECT * FROM partidas WHERE id_user = '$id_user' ORDER BY fecha DESC";
$result = mysqli_query($conexion, $query);
?>

<style>
  .card-partida {
    border-left: 4px solid #0d6efd;
    border-radius: 10px;
  }
  .btn-xs {
    font-size: 0.75rem;
    padding: 4px 8px;
  }
   
    .bodyform {
      
      color: black;
      font-family: sans-serif;
      text-align: center;
    }

    .contenedor {
      border: 2px solid #E6E7E8;
      border-radius: 10px;
      padding: 10px;
      margin: 10px auto;
      width: 300px;
      background-color: white;
    }


    .seccion {
      margin-bottom: 5px;
    }

    .opciones {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 10px;
    }

    .opcion {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
    }

    .opcion input[type="radio"] {
      display: none;
    }

    .opcion img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      filter: grayscale(100%);
      transition: filter 0.3s ease;
    }

    .opcion input[type="radio"]:checked + img {
      filter: grayscale(0%);
    }

    .opcion span {
      margin-top: 3px;
      font-size: 10px;
      color: black;
    }

    .cantidad-btns {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .cantidad label {
      background: #888;
      color: white;
      padding: 5px 10px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .cantidad input[type="radio"] {
      display: none;
    }

    .cantidad input[type="radio"]:checked + label {
      background: #007bff;
    }

    .btn-registrar {
      background: #007bff;
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 15px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 20px;
    }

    h5 {
  font-size: 12px; /* o más pequeño si deseas */
}

    h3 {
  font-size: 16px; /* o más pequeño si deseas */
}
    .tituloop {
  margin-top: 5px; 
}

  .card-partida {
    border-left: 4px solid #0d6efd;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    margin-bottom: 1rem;
  }

  .card-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    font-family: sans-serif;
  }

  .info-partida {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }


  .meta-info {
    font-size: 0.85rem;
    color: #333;
  }

  .meta-info .estado {
    color: #3b38d5;
    font-weight: bold;
  }

  .acciones {
    display: flex;
    gap: 10px;
  }

  .acciones button {
    background: none;
    border: none;
    cursor: pointer;
  }

  .acciones .btn-trash {
    color: red;
    font-size: 1.3rem;
  }

  .acciones .btn-check {
    color: #0dcaf0;
    font-size: 1.3rem;
  }

  .acciones .btn-share {
    color: #222;
    font-size: 1.3rem;
  }

  .codigo-bloque .letra {
  background-color: #000;     /* fondo negro */
  color: #fff;                /* texto blanco */
  padding: 6px 8px;           /* espacio interno */
  margin-right: 4px;          /* espacio entre letras */
  border-radius: 4px;         /* opcional */
  font-weight: bold;          /* texto más visible */
  display: inline-block;      /* cada letra en su propio bloque */
  font-family: monospace;     /* estilo de letra uniforme */
  font-size: 16px;            /* tamaño ajustado */
}
   
 </style>



<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🎮 Mis Partidas</h5>
    <a href="crear_partida.php" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#nuevapartida"> + Nueva Partida</a>
  </div>

  <?php while ($partida = mysqli_fetch_assoc($result)): ?>
  <div class="card card-partida">
    <div class="card-body">
      <div class="info-partida">

        <span class="meta-info">📅 <?php echo date("d/m/Y H:i", strtotime($partida['fecha'])); ?></span>
        <span class="meta-info">👥 Jugadores: 3 | Estado: <span class="estado">Activo</span></span>

 <span class="codigo-sala">
  🔗 <span>Codex: </span>
  <span class="codigo-bloque">
    <?php 
      $codigo = $partida['cdg_invitacion'];
      foreach (str_split($codigo) as $char) {
        echo "<span class='letra'>$char</span>";
      }
    ?>
  </span>
</span>

      </div>
      <div class="acciones">
        <form action="eliminar_partida.php" method="POST" onsubmit="return confirm('¿Eliminar esta partida?')">
          <input type="hidden" name="id" value="<?php echo $partida['id_partida']; ?>">
          <button type="submit" class="btn-trash"><i class="fas fa-trash-alt"></i></button>
        </form>
        
        <a href="continuar_partida.php?id=<?php echo $partida['id_partida']; ?>" style="color:blue;" class="btn-icon btn"><i class="fas fa-check-circle"></i></a>
        <button class="btn-share" onclick="compartirPartida('<?php echo $partida['idempresa']; ?>')"><i class="fas fa-share-alt"></i></button>
      </div>
    </div>
  </div>
<?php endwhile; ?>




<!-- Modal -->
<div class="modal fade" id="nuevapartida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Partida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="bodyform">
  <form id="miFormulario" action="crud_partidas/crear.php" method="POST" >


  <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>">

  <img class="tituloop" src="img/nregistro/dados.png" width="50" alt="logo">
  <h6>NUEVA PARTIDA</h6>
 
  <div class="contenedor">
    <!-- EMPRESA -->
    <div class="seccion">
      <h5>Elige una Empresa</h5> <br>
      <div class="opciones">
        <label class="opcion">
          <input type="radio" name="id_empresa" id="SAA" value="1">
          <img src="img/nregistro/SAA.png" alt="Mercadería">
          <span>SAA</span>
          <span>Sociedad Anonima Abierta</span>
        </label>
        <label class="opcion">
          <input type="radio" name="id_empresa" id="SAC" value="2">
          <img src="img/nregistro/SAC.png" alt="Bienes">
          <span>SAC</span>
          <span>Sociedad Anonima Cerrada</span>
        </label>
      </div>
    </div>
    <div class="seccion">
      <div class="opciones">  
       <label class="opcion">
          <input type="radio" name="id_empresa" id="SRL" value="3">
          <img src="img/nregistro/SRL.png" alt="Bienes">
          <span>SRL</span>
          <span>Sociedad de  <br> Responsabilidad Limitada</span>
        </label>
        <label class="opcion">
          <input type="radio" name="id_empresa" id="EIRL" value="4">
          <img src="img/nregistro/EIRL.png" alt="Bienes">
          <span>EIRL</span>
          <span>Empresa Individual <br> de Responsabilidad Limitada </span>
        </label>
      </div>
    </div>
    <div class="seccion">      
      <div class="opciones"> 
        <label class="opcion">
          <input type="radio" name="id_empresa" id="SC" value="5">
          <img src="img/nregistro/SC.png" alt="Bienes">
          <span>SC</span>
          <span>Sociedad Civil</span>
        </label>              

      </div>
    </div>

    

</div>
    <!-- BOTÓN -->

     <button type="submit" class="btn btn-primary  " id="guardar" name="guardar">REGISTRAR</button>

  </form>

  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
       
      </div>
    </div>
  </div>
</div>


<!-- VALIDACIÓN -->

<script>
  document.getElementById('miFormulario').addEventListener('submit', function(e) {
    const id_empresa = document.querySelector('input[name="id_empresa"]:checked');

    let errores = [];

    if (!id_empresa) {
      errores.push("Selecciona una empresa para jugar.");
    }

    if (errores.length > 0) {
      e.preventDefault(); // Evita el envío del formulario
      alert(errores.join("\n")); // Muestra todos los errores en un solo mensaje
    }
  });
</script>
