<?php
include("../data/conexion.php");

// Validar que se reciben los datos esperados
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Reemplaza estos con los nombres reales de los inputs en tu formulario
    $id_empresa = $_POST['id_empresa'];
    $id_user = $_POST['id_user']; // Puede venir de sesión si ya está logueado


    // Función para generar código único
    function generarCodigoInvitacion($longitud = 4) {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo;
    }

    // Asegurarse que el código sea único
    do {
        $codigo_invitacion = generarCodigoInvitacion();
        $check = mysqli_query($conexion, "SELECT id_partida FROM partidas WHERE cdg_invitacion = '$codigo_invitacion'");
    } while (mysqli_num_rows($check) > 0);

    // Insertar en la tabla
    $sql = "INSERT INTO partidas (cdg_invitacion, idempresa, id_user)
            VALUES ('$codigo_invitacion', '$id_empresa', '$id_user')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
    echo "
    <script>
        // Crear el audio
        var audio = new Audio('../op_voz/audio/r5.mp3');

        // Reproducir el audio
        audio.play().then(() => {
            alert('✅ Partida creada con éxito. Código de invitación: $codigo_invitacion');
            window.location.href = '../mispartidas.php';
        }).catch((error) => {
            // Si no se puede reproducir, igual mostrar el alert
            console.warn('No se pudo reproducir el audio:', error);
            alert('✅ Partida creada con éxito. Código de invitación: $codigo_invitacion');
            window.location.href = '../mispartidas.php';
        });
    </script>";


    } else {
        echo "<script>
            alert('❌ Error al crear la partida: " . mysqli_error($conexion) . "');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Acceso no válido.');
        window.location.href = 'home.php';
    </script>";
}
?>
