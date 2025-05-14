<?php

        $conexion = mysqli_connect(
          'localhost',
          'root',
          '',
          'contable'
        ) or die(mysqli_erro($mysqli));
          
?>

<?php include('./session/sessionup.php'); 
?>

<style type="text/css">
    i{
   
   font: 150% sans-serif;
}
    
</style>



<?php 
$query1=
"SELECT diario.CTA, diario.USER
FROM diario
GROUP BY diario.CTA, diario.USER
HAVING (((diario.USER)=$user_up))";
$result1 = mysqli_query($conexion, $query1);  
$datoos = mysqli_num_rows($result1);
 ?>

<?php 

 if ($datoos>0) {

     if ($user_voz>0) {
      
      include("menubar_vz.php");
      
      } else {
      
      include("menubar.php");  
      }

  } else {

  include("menubar0.php");

  }

?>