<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 bg-vino" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link letra-gotham-bold" data-toggle="tab"
                            href="#panelIniciarSesion" role="tab"><i
                                class="fas fa-user mr-1"></i>
                            Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link letra-gotham-bold" data-toggle="tab"
                            href="#panelRegistro" role="tab"><i
                                class="fas fa-user-plus mr-1"></i>
                            Registro</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel Inicar Sesion-->
                    <div class="tab-pane fade in show active" id="panelIniciarSesion"
                        role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="email" id="modalLRInput10"
                                    class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right"
                                    for="modalLRInput10">Email</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="modalLRInput11"
                                    class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right"
                                    for="modalLRInput11">Contraseña</label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-info bg-vino letra-gotham-bold">Acceder
                                    <i class="fas fa-sign-in ml-1"></i></button>
                            </div>
                        </div>

                        <div id="msj"></div>
                        
                        <!--Footer-->
                        <div class="modal-footer p-3">
                            <div class="options text-center text-md-right mt-1">
                                <p>¿No tienes cuenta? <a data-toggle="tab" href="#panelRegistro"
                                        role="tab" class="vino">Registrate</a></p>
                                <p><a href="#" class="vino">Olvide la Contraseña</a></p>
                            </div>
                            <button type="button"
                                class="btn outline-vino waves-effect ml-auto letra-gotham-bold p-3"
                                data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                    <!--/.Panel Iniciar Sesion-->

                    <!--Panel Registro-->
                    <div class="tab-pane fade" id="panelRegistro" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="email" id="modalLRInput12"
                                    class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right"
                                    for="modalLRInput12">Email</label>
                            </div>

                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="modalLRInput13"
                                    class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right"
                                    for="modalLRInput13">Contraseña</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="modalLRInput14"
                                    class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right"
                                    for="modalLRInput14">Repetir Contraseña</label>
                            </div>

                            <div class="text-center form-sm mt-2 letra-gotham-bold">
                                <button class="btn btn-info bg-vino">Registrar <i
                                        class="fas fa-sign-in ml-1"></i></button>
                            </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer p-3">
                            <div class="options text-right">
                                <p class="pt-1">¿Ya tienes cuenta? <a data-toggle="tab"
                                        href="#panelIniciarSesion" role="tab"
                                        class="vino">Inicia Sesion</a></p>
                            </div>
                            <button type="button"
                                class="btn outline-vino waves-effect ml-auto vino letra-gotham-bold p-3"
                                data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!--/.Panel Registro-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--fin Modal: Login / Register Form-->