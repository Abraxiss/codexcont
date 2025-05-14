<?php include('./session/sessionup.php'); ?>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="stylos/stylosmenu.css">
<style type="text/css">
  .dropdown-menu {
    background-color: #222f3e;
    border-radius: 10px;
    padding: 10px;
padding-left: 15px;

  }

</style>

<nav class="navbar navbar-expand-lg navbar-dark " style="background: black";>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>	

  
    
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item active">
         <a class="nav-link" href="home.php"><i class="fas fa-chart-pie"></i> &nbsp INICIO</a>
      </li>    	

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-check-circle"></i> &nbsp REGISTROS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="nav-link" href="voz_apertura_invent.php"> <i class="fas fa-tasks"></i> &nbsp INVENTARIO</a>
          <a class="nav-link active" href="voz_asiento_ingresos.php"><i class="fas fa-plus-circle"></i> &nbsp INGRESOS</a>
          <a class="nav-link" href="voz_asiento_egresos.php"> <i class="fas fa-minus-circle"></i> &nbsp EGRESOS</a>
          <a class="nav-link" href="voz_apertura.php"> <i class="fas fa-columns"></i> &nbsp BALANCE INICIAL</a>
          <div  class="dropdown-divider " style="background:white;"></div>
          
          <a class="nav-link" href="op_registros.php"> <i class="fas fa-trash-alt"></i> &nbsp ELIMINAR</a>
        </div>
      </li>


     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-check-double"></i> &nbsp INFORME
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="nav-link" href="if_balance.php"> <i class="fas fa-th-list"></i> &nbsp BALANCE GENERAL</a>
          <a class="nav-link active" href="if_resultados.php"> <i class="fas fa-th-list"></i> &nbsp RESULTADOS OBTENIDOS</a>
          <div class="dropdown-divider" style="background: white;"></div>
          
          <a class="nav-link" href="if_ratios.php"> <i class="fas fa-th-list"></i> &nbsp RATIOS FINANCIEROS</a>
        </div>
      </li>

     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-robot"></i> &nbsp CODEX
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="nav-link" href="ia/index.php"> <i class="fas fa-square"></i>&nbsp  ASISTENTE DIGITAL </a>>
          <a class="nav-link" href="comandos_list.php"> <i class="fas fa-square"></i> &nbsp  COMANDOS</a>
        </div>
      </li>

     <li class="nav-item active">
        <a class="nav-link" href="user_update.php"> <i class="fas fa-user-circle"></i> &nbsp MI PERFIL</a>
      </li>


    </ul>

  </div>




          <div class="userup">
           
            <span class="icon-user">&nbsp</span>

            <h6 class="font-weight-bold"> <?php  echo $name_up ; ?>&nbsp &nbsp</h6> 
            
          <a href="#V1" class="btn btn-danger" data-toggle="modal"> 
           <span class="icon-exit"></span>
          </a>
          </div>



<div class="modal" tabindex="-1" role="dialog" id="V1" style=" color: black;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CERRAR SESIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas Cerrar Sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
          <a href="./valida/valida_exit.php" class="btn btn-danger" > 

         CERRAR SESIÓN
          </a>
        
      </div>
    </div>
  </div>
</div>



</nav>