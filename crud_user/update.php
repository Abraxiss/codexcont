<?php include('.././session/sessionup.php'); ?>
<?php include(".././data/conexion.php"); ?>

<?php


if (isset($_POST['user_dni'])) {
	  
  $c2 = $_POST['user_nombre'];
  $c3 = $_POST['user_dni']; 
  $c4 = $_POST['user_empresa'];
  $c5 = $_POST['user_correo'];
  $c6 = 1; /*$_POST['user_activo'];*/
  $c7 = $_POST['user_clave'];
  $c8 = 2; /*$_POST['user_nivel'];*/
  $c12 = $_POST['user_facebook'];
  $c13 = $_POST['user_whatsapp'];
  $c14 = $_POST['user_instagram'];  
  $c15 = $_POST['user_correocop'];
  $c16 = $_POST['user_telefono'];
  $c17 = $_POST['user_direccion'];
  $c18 = $_POST['voz'];
//echo  $c18;
//die();
  $query = "UPDATE user set

user_nombre ='$c2',
user_dni ='$c3',
user_empresa ='$c4',
user_correo ='$c5',
user_activo ='$c6',
user_clave  ='$c7',
user_nivel  ='$c8',
user_facebook ='$c12',
user_whatsapp ='$c13',
user_instagram  ='$c14',
user_correocop  ='$c15',
user_telefono  ='$c16',
user_direccion  ='$c17',
voz  ='$c18'

  WHERE id_user=$user_up";

  mysqli_query($conexion, $query);




}


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../home.php";
    </script>';
exit();

?>