<?php
$conexion = mysqli_connect(
	'localhost', 
	'root', 
	'', 
	'jdmcodex');

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Opcional: establecer el conjunto de caracteres a UTF-8
mysqli_set_charset($conexion, "utf8");

// Puedes ahora usar $conexion en tus consultas
?>



<?php
/*
		$conexion = mysqli_connect(
		'localhost',
		'root',		  
		'',
		'jdmcodex'
		) or die(mysqli_erro($mysqli));
*/		  
?>

<?php
/*
		$conexion = mysqli_connect(
		'sql207.tonohost.com',
		'ottos_26114525',		  
		'Peru_2020',
		'ottos_26114525_academi'
		) or die(mysqli_erro($mysqli));
*/		  
?>