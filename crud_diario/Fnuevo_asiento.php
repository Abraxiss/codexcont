<?php 
function registrarAsientoDesdePlantilla($conexion, $codigo_operacion, $cantidad, $id_user, $codigo_partida) {
    // Escapar variables
    $codigo_operacion = mysqli_real_escape_string($conexion, $codigo_operacion);
    $cantidad = floatval($cantidad);
    $id_user = intval($id_user);
    $codigo_partida = intval($codigo_partida);

    // Consultar la plantilla
    $query = "SELECT * FROM plantilla_asientos WHERE codigo_operacion = '$codigo_operacion' ORDER BY orden ASC";
    $result = mysqli_query($conexion, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        echo "No se encontraron líneas para el código de operación.";
        return false;
    }

    // Recorrer la plantilla e insertar en el diario
    while ($row = mysqli_fetch_assoc($result)) {
        $cuenta = $row['cuenta'];
        $nombre_cuenta = $row['nombre_cuenta'];
        $glosa = $row['glosa'];
        $dh = $row['DH'];

        // Extraer cta1 y cta2
        $cta1 = intval(substr($cuenta, 0, 1));
        $cta2 = intval(substr($cuenta, 0, 2));

        // Insertar en el diario
        $insert = "
            INSERT INTO diario (
                id_user, codigo_partida, apertura, cta1, cta2,
                cuenta, nombre_cuenta, glosa, codigo_operacion, DH, IMPORTE
            ) VALUES (
                $id_user, $codigo_partida, 0, $cta1, $cta2,
                '$cuenta', '$nombre_cuenta', '$glosa', '$codigo_operacion', '$dh', $cantidad
            )
        ";

        if (!mysqli_query($conexion, $insert)) {
            echo "Error al insertar línea de asiento: " . mysqli_error($conexion);
            return false;
        }
    }

    return true;
}
?>
