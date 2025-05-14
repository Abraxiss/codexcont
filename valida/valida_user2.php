<?php include("./../data/conexion.php"); 



if (isset($_POST['cdg'])) {
	
	$cdg = $_POST['cdg'];


$query="SELECT * FROM user WHERE user_codigo= '$cdg'";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

if ($numfilas>0) {

@session_start();

$id_user=$filas ['id_user']; 
$user_nombre=$filas ['user_nombre'];
$user_codigo=$filas ['user_codigo'];
$user_avatar=$filas ['user_avatar'];


//echo $id_user;
//die();

$_SESSION['id_user']=$id_user;
$_SESSION['user_nombre']=$user_nombre;
$_SESSION['user_codigo']=$user_codigo;
$_SESSION['user_avatar']=$user_avatar;



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