
<?php 

          @session_start(); 


if (isset($_SESSION['usuario'])) {
      $id_user=$_SESSION['id_user'];
      $user_nombre=$_SESSION['user_nombre'];
      $user_codigo=$_SESSION['user_codigo'];
      $user_avatar=$_SESSION['user_avatar'];

} else {
  @session_destroy();
  mysqli_close($conexion);
  echo'<script type="text/javascript">
    window.location.href="./index.php";
    </script>';

  die();
}
?>

