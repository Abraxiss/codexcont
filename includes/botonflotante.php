<style type="text/css">
         /* Botón flotante */
        .fab {
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #2196F3;
            color: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            cursor: pointer;
            font-size: 1.5rem;
            z-index: 100;
        }

</style>


    <!-- Botón flotante trigger para lanzar modal-->
    <button type="button" class="fab" data-bs-toggle="modal" data-bs-target="#MAS">+</button>



<!-- Modal -->
<div class="modal fade" id="MAS" tabindex="-1" aria-labelledby="galeriaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="height: 90vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="galeriaModalLabel">OPERACIONES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body p-0" style="height: 100%;">
        <?php include('mas_registros.php'); ?>
      </div>
    </div>
  </div>
</div>



