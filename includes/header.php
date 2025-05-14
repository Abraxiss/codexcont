<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="google" content="notranslate" /> 
    <meta charset="UTF-8">
    <title>Codex Contable</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, user-scalable=si, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- FUENTES ICONOS LOCAL -->
    <link rel="stylesheet" href="./css/homecodex.css">


  </head>


<style type="text/css">
  .menu-fijo {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;

      background-color: #121212;


  padding: 10px 20px;
  z-index: 1000; /* Asegura que quede por encima del resto */
  box-shadow: 0 2px 5px rgba(0,0,0,0.5);
}


    body {
      padding-top: 60px; /* ajusta esto según la altura de tu header */
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Segoe UI', sans-serif;
    }

</style>




    <!-- Header -->
    <header class="header menu-fijo">
        <div class="user-info">
            <div class="avatar">
              <img src="<?php  echo $user_avatar ; ?>" alt="Avatar del usuario" class="img-fluid" style="width: 100%; height: auto;">
            </div>

            <span><?php  echo $user_nombre ; ?></span>
        </div>
        <button style="color: #30ACF5;" class="menu-btn" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
<div style="background: black;" class="dropdown-menu" id="dropdownMenu">
    <div class="menu-grid">
        <div class="menu-item">
            <button class="menu-btn" onclick="toggleMenu()">
              <i class="fas fa-bars"></i></button>
            <span>o o o</span>
        </div> 
        <div class="menu-item">          
            <a href="./home.php" >
            <i class="fa-solid fa-house"></i>
            <span>Inicio</span>
            </a> 
        </div>             
        <div class="menu-item">
          <a href="./myperfil.php" > 
            <i class="fas fa-user-circle"></i>
            <span>Perfil</span>
          </a>  
        </div>

        <div class="menu-item">
          <a href="./mispartidas.php" > 
            <i class="fas fa-gamepad"></i>
            <span>Partidas</span>
          </a>
        </div>
        <div class="menu-item">
          <a href="#exit" data-bs-toggle="modal" > 
            <i class="fas fa-sign-out-alt"></i>          
           <span >Salir</span>
          </a>
        </div>

    </div>
</div>
    </header>

  
<div class="modal" tabindex="-1" id="exit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cerrar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas Cerrar Sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="./valida/valida_exit.php" class="btn btn-danger" >Cerrar Sesión</a>
      </div>
    </div>
  </div>
</div>


<script>
// Mostrar/ocultar menú personalizado
function toggleMenu() {
    const menu = document.getElementById('dropdownMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}
</script>


  <body>