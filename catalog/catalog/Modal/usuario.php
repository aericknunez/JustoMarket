<div class="modal bounceIn" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="ModalUser" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
<div class="modal-content">

          <!--Header-->
          <div class="modal-header">
          <img src="<?php echo BASE_URL . "/assets/img/avatar/" . $_SESSION["avatar"] ?>" id="avatar" class="rounded-circle img-responsive" alt="Avatar photo" >
          </div>
          <!-- head -->
          <!--Body-->
          <div class="modal-body text-center mb-1">

        <h5 class="mt-1 mb-2"><?php echo $_SESSION["nombre"] ?></h5>

          
          <div id="msj"></div>

          <a href="<?php echo BASE_URL ?>application/includes/logout" 
                  class="btn outline-vino waves-effect ml-auto letra-gotham-bold p-3">Cerrar Sesi&oacuten</a>

          </div>
          <!-- bod -->
          <!-- footer -->
          <div class="modal-footer">
          <a id="cerrarModal" class="btn btn-secondary">Cancelar</a>
          </div>
          <!-- foot -->
          
    </div>
    <!--/.Content-->
</div>
</div>

