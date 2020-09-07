<!--Modal: Login / Register Form-->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog"
    aria-labelledby="ModalLogin" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <!--Content-->
        <div class="modal-content bordeado3">


      <!--Header-->
      <div class="modal-header text-center bg-vino bordeado3">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Iniciar Sesi&oacuten</h4>
        <button id="CloseModal" op="2" class="close" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>


                <!-- Tab panels -->
                <div class="tab-content">

                        <!--Body-->
                        <form id="form-login" name="form-login" >

                        <div class="modal-body mb-1">
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix vino"></i>
                                <input type="email" name="email"
                                    class="form-control form-control-sm validate">
                                <label data-error="Error!" data-success="Correcto!"
                                    for="email">Email</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix vino"></i>
                                <input type="password" 
                                        name="password" 
                                        id="password"
                                    class="form-control form-control-sm validate">
                                <label data-error="Error!" data-success="Correcto!"
                                    for="password">Contraseña</label>
                            </div>
                            <div id="msj"></div>
                            <div class="text-center mt-2">
                                <button class="btn btn-info bg-vino letra-gotham-bold" type="submit" id="btn-login" name="btn-login">Ingresar</button>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer p-3">
                            <div class="options text-center text-md-right mt-1">
                                <p>¿No tienes cuenta? <a id="mregistro" class="vino">Registrate</a></p>
                                <p><a href="?recovery" class="vino">Olvide la Contraseña</a></p>
                            </div>
                            <button type="button"
                                class="btn outline-vino waves-effect ml-auto letra-gotham-bold p-3"
                                id="CloseModal" op="2">Cerrar</button>
                        </div>
                        
                         </form>

                </div>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--fin Modal: Login / Register Form-->