<!--Modal: Login / Register Form-->
<div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog"
    aria-labelledby="ModalRegistro" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <!--Content-->
        <div class="modal-content bordeado3">


      <!--Header-->
      <div class="modal-header text-center bg-vino bordeado3">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Registrarse</h4>
        <button id="CloseModal" op="1" class="close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>


                        <!--Body-->
<div class="modal-body">
<div id="msjregister"></div>
<form id="form-registrar" name="form-registrar">
 <div class="md-form form-sm mb-3">
    <i class="fas fa-user prefix"></i>
    <input type="text" id="nombre" name="nombre"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="nombre">Nombres</label>
</div>

 <div class="md-form form-sm mb-3">
    <i class="fas fa-user prefix"></i>
    <input type="text" id="apellido" name="apellido"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="apellido">Apellidos</label>
</div>

<div class="md-form form-sm mb-3">
    <i class="fas fa-envelope prefix"></i>
    <input type="email" id="email" name="email"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="email">Email</label>
</div>


<div class="md-form form-sm mb-3">
    <i class="fas fa-map-marked prefix"></i>
    <input type="text" id="recibe_direccion" name="recibe_direccion"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="recibe_direccion">Dirección de entrega</label>
</div>


    <div class="row">
        <div class="col-1"><div class="md-form form-sm mb-3">
            <i class="fas fa-map-marker prefix"></i>
        </div></div>
        <div class="col-5">
                <div class="md-form form-sm mb-3">
                    
        <select class="browser-default custom-select md-form form-sm mb-0" id="recibe_departamentor" name="recibe_departamentor">
      <?php 

                $a = $db->query("SELECT id, departamento FROM cobertura_departamento");
                  echo '<option>* Departamento</option>';
                  foreach ($a as $b) {  

                      if($recibe_departamento == $b["id"]){
                          echo '<option value="'. $b["id"] .'" selected >'. $b["departamento"] .'</option>'; 
                      } else {
                          echo '<option value="'. $b["id"] .'">'. $b["departamento"] .'</option>'; 
                      }

                  } $a->close(); 

       ?>
      </select>
                </div>
        </div>

        <div class="col-1"><div class="md-form form-sm mb-3">
             <i class="fas fa-map-marker-alt prefix"></i>
        </div></div>

        <div class="col-5">
                <div class="md-form form-sm mb-3">
                     <select class="browser-default custom-select md-form form-sm mb-0" id="recibe_municipior" name="recibe_municipior">
                      <?php 

                            $a = $db->query("SELECT id, municipio FROM cobertura_municipio WHERE departamento = '".$recibe_departamento."'");
                              echo '<option>* Municipio</option>';
                              foreach ($a as $b) {  
                            echo '<option value="'. $b["id"] .'">'. $b["municipio"] .'</option>'; 
                              } $a->close(); 
                       ?>
                    </select>
                </div>
        </div>
        

    </div>
    



    <div class="row">
        <div class="col-6">
                <div class="md-form form-sm mb-3">
                    <i class="fas fa-phone prefix"></i>
                    <input type="text" id="telefono" name="telefono"
                        class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right"
                        for="telefono">Teléfono</label>
                </div>
        </div>

        <div class="col-6">
                <div class="md-form form-sm mb-3">
                    <i class="fas fa-mobile-alt prefix"></i>
                    <input type="text" id="celular" name="celular"
                        class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right"
                        for="celular">Celular</label>
                </div>
        </div>
        

    </div>


<div class="md-form form-sm mb-3">
    <i class="fas fa-map-pin prefix"></i>
    <input type="text" id="puntodereferencia" name="puntodereferencia"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="puntodereferencia">Punto de referencia</label>
</div>

<div class="md-form form-sm mb-3">
    <i class="fas fa-user-check prefix"></i>
    <input type="text" id="nombrerecibe" name="nombrerecibe"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="nombrerecibe">Nombre de quien recibe</label>
</div>


<div class="showpass">
    <div class="md-form form-sm mb-3">
    <i class="fas fa-lock prefix"></i>
    <input type="password" id="password" name="password"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="password">Contraseña</label>
</div>

<div class="md-form form-sm mb-3">
    <i class="fas fa-lock prefix"></i>
    <input type="password" id="confirmpwd" name="confirmpwd"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="confirmpwd">Repetir Contraseña</label>
</div>
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
                    id="CloseModal" op="1">Cerrar</button>
            </div>




        </div>
        <!--/.Content-->
    </div>
</div>
<!--fin Modal: Login / Register Form-->