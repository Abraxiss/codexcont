<?php include("session/sessionup.php"); ?>
<?php include('includes/header.php'); ?>
 

 

   <!-- grefico generado -->
<?php include('crud_partidas/partidas.php'); ?>


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