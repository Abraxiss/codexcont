<?php include("../data/conexion.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger variables del formulario
    $id_user = $_POST['id_user']; 
    $codigo_partida = $_POST['codigo_partida'];  

$producto = $_POST['producto']; // "mercaderia"
$condicion = $_POST['condicion']; // "credito"
	$codigo_operacion = $producto . $condicion; // "mercaderiacredito"

    $cantidad = $_POST['cantidad'];




    // Incluir el archivo que contiene la función
    include("Fnuevo_asiento.php");

    // Llamar a la función
    if (registrarAsientoDesdePlantilla($conexion, $codigo_operacion, $cantidad, $id_user, $codigo_partida)) {
     
        // Si todo salió bien:
    // Éxito: reproducir audio + alert
    echo "
    <script>
        var audio = new Audio('../op_voz/audio/r3.mp3');
        audio.play().then(() => {
            alert('✅ Asiento contable registrado correctamente.');
            window.location.href = '../home.php';
        }).catch((error) => {
            console.warn('No se pudo reproducir el audio:', error);
            alert('✅ Asiento contable registrado correctamente.');
            window.location.href = '../home.php';
        });
    </script>";
		exit;

    } else {
    	echo "<script>  alert('❌ Ocurrió un error al registrar el asiento.');  window.location.href = '../home.php'; </script>";
		exit;

    }
}
?>
