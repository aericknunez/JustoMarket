<!--Modal: Login / Register Form-->
<div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog"
    aria-labelledby="ModalRegistro" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <!--Content-->
        <div class="modal-content">


      <!--Header-->
      <div class="modal-header text-center bg-vino">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Registrarse</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>


                        <!--Body-->
                        <div class="modal-body">
<div id="msj"></div>
 <form id="form-registrar" name="form-registrar">

             <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="nombre" name="nombre"
                    class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right"
                    for="nombre">Nombres</label>
            </div>

             <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="apellido" name="apellido"
                    class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right"
                    for="apellido">Apellidos</label>
            </div>

               <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix"></i>
                <input type="email" id="email" name="email"
                    class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right"
                    for="email">Email</label>
            </div>

            <div class="md-form form-sm mb-5">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="password" name="password"
                    class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right"
                    for="password">Contraseña</label>
            </div>

            <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="confirmpwd" name="confirmpwd"
                    class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right"
                    for="confirmpwd">Repetir Contraseña</label>
            </div>

            <div class="text-center form-sm mt-2 letra-gotham-bold">
                <button class="btn btn-info bg-vino" id="btn-registrar" name="btn-registrar">Registrar <i
                        class="fas fa-sign-in ml-1"></i></button>
            </div>
<input type="hidden" name="tipo" id="tipo" value="2" />

</form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer p-3">
                            <div class="options text-right">
                                <p class="pt-1">¿Ya tienes cuenta? <a id="iniciarsesion" 
                                        class="vino">Inicia Sesion</a></p>
                            </div>
                            <button type="button"
                                class="btn outline-vino waves-effect ml-auto vino letra-gotham-bold p-3"
                                data-dismiss="modal">Cerrar</button>
                        </div>




        </div>
        <!--/.Content-->
    </div>
</div>
<!--fin Modal: Login / Register Form-->