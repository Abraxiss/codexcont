<?php include("./../data/conexion.php"); 



if (isset($_GET['dni'])) {
	
	$dni = $_GET['dni'];


$query="SELECT * FROM user WHERE user_dni= '$dni'";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

if ($numfilas>0) {

@session_start();

$id_user=$filas ['id_user']; 
$user_nombre=$filas ['user_nombre'];
$user_dni=$filas ['user_dni'];
$voz=$filas ['voz'];

$_SESSION['id_user']=$id_user;
$_SESSION['user_nombre']=$user_nombre;
$_SESSION['user_dni']=$user_dni;
$_SESSION['voz']=$voz;

$query1=
	"SELECT diario.CTA, diario.USER
	FROM diario
	GROUP BY diario.CTA, diario.USER
	HAVING (((diario.USER)=$id_user))";
	$result1 = mysqli_query($conexion, $query1);  
	$datoos = mysqli_num_rows($result1);


$_SESSION['datoos']=$datoos ;

	echo'<script type="text/javascript">
    window.location.href=".././home.php";
    </script>';


mysqli_close($conexion);
exit();


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./error.php";
    </script>';


die();
}


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./error.php";
    </script>';


die();
}

?>