<?php
// Inicia la sesión antes que todo

include("session/sessionup.php");
include("data/conexion.php");
include('includes/header.php');
include('includes/botonflotante.php');
?>

<audio src="./op_voz/audio/efect7.mp3" preload="preload" autoplay="autoplay" ></audio>
<audio src="./op_voz/audio/carga.mp3" preload="preload" autoplay="autoplay" ></audio>


 

   <!-- grefico generado -->


<?php include('grafos/flujodecaja.php'); ?>

    <!-- Barra navegación -->


<?php include('includes/barrainferior.php'); ?>

<script>
function toggleMenu() {
    const menu = document.getElementById('dropdownMenu');
    menu.classList.toggle('show');
}
</script>

<!-- Bootstrap JS (¡indispensable para que funcione el modal!) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>