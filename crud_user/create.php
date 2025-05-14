<audio src="./../op_voz/audio/carga02.mp3" preload="preload" autoplay="autoplay" ></audio>
<?php include('./../includes/header.php'); ?>
<?php include("./../data/conexion.php"); ?>

<style>
	
	.container{  padding-top: 300px;  }

</style>


<?php

if (isset($_POST['guardar'])) {
	
	$user = $_POST['user_dni'];


	$query="SELECT * FROM user WHERE user_dni= '$user' ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	


	if ($numfilas>0) { ?>

		<div class="container col-7">

			<h5>El nombre de Usuario ya se encuentra Registrado...</h5>
	
			<a href="./../index.php" class="btn btn-primary  btn-block" >Regresar...</a>		
		</div>

<?php
	 

	} else {

	

	$c2 = $_POST['user_nombre'];
	$c3 = $_POST['user_dni'];
	$c6 = 1; /*$_POST['user_activo'];*/
	$c7 = $_POST['user_clave'];
	$c8 = 2; /*$_POST['user_nivel'];*/
	$c16 = $_POST['user_telefono'];

	$query= "INSERT INTO user(  
	user_nombre,
	user_dni,
	user_activo,
	user_clave,
	user_nivel,
	user_telefono
	) VALUES (
	'$c2',
	'$c3',
	'$c6', 
	'$c7',
	'$c8',  
	'$c16'
	)";

	/*---create ---*/
	$result = mysqli_query($conexion, $query);?>

	<style>
	
	body{  background: black;  }

</style>


<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col-10">
    	<div class="text-center">
    		<img src="./../img/159.gif" class="image"  height="200"/>

    	</div>
    	<br>
    	<div class="text-center" style=" color: #d2f5fe; font: 40% sans-serif;">
    		<h6>Creando Nuevo Usuario...</h6>
    	
    		
    	

    	</div>
         


    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<meta http-equiv="refresh" content="4; url=./../valida/valida_user3.php?dni=<?php echo $c3  ?>">
	



	<?php	

	}

	} else {

	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../index.php";
    </script>';
	exit();
	die();
	}


	?>

	<?php include('./../includes/footer.php'); ?>