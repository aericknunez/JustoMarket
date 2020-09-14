<!--Modal: Login / Register Form-->
<div class="modal fade" id="ModalCambiarDireccion" tabindex="-1" role="dialog"
    aria-labelledby="ModalCambiarDireccion" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <!--Content-->
        <div class="modal-content bordeado3">


      <!--Header-->
      <div class="modal-header text-center bg-vino bordeado3">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">CAMBIAR DIRECCIÓN DE ENVÍO</h4>
        <button data-dismiss="modal" class="close" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>


                        <!--Body-->
<div class="modal-body">
<div id="msjdireccion"></div>
<form id="form-cambios" name="form-cambios">


<div class="md-form form-sm mb-3">
    <i class="fas fa-map-marked prefix"></i>
    <input type="text" id="cdireccion" name="cdireccion"
        class="form-control form-control-sm validate" value="<?php echo $recibe_direccion ?>">
    <label data-error="wrong" data-success="right"
        for="cdireccion">Dirección de Envío</label>
</div>


    <div class="row">
        <div class="col-1"><div class="md-form form-sm mb-3">
            <i class="fas fa-map-marker prefix"></i>
        </div></div>
        <div class="col-5">
                <div class="md-form form-sm mb-3">
                    
        <select class="browser-default custom-select md-form form-sm mb-0" id="cdepartamento" name="cdepartamento">
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
                     <select class="browser-default custom-select md-form form-sm mb-0" id="cmunicipio" name="cmunicipio">
                      <?php 

                            $a = $db->query("SELECT id, municipio FROM cobertura_municipio WHERE departamento = '".$recibe_departamento."'");
                              echo '<option>Municipio</option>';
                              foreach ($a as $b) {  
                            echo '<option value="'. $b["id"] .'"'; if($recibe_municipio == $b["id"]){ echo "selected"; }  echo'>'. $b["municipio"] .'</option>'; 
                              } $a->close(); 
                       ?>
                    </select>
                </div>
        </div>
        

    </div>
    




    <div class="row">
        <div class="col-12">
                <div class="md-form form-sm mb-3">
                    <i class="fas fa-phone prefix"></i>
                    <input type="text" id="ctelefono" value="<?php echo $recibe_telefono ?>" name="ctelefono"
                        class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right"
                        for="ctelefono">Teléfono</label>
                </div>
        </div>

    </div>

<div class="md-form form-sm mb-3">
    <i class="fas fa-user-check prefix"></i>
    <input type="text" id="cnombre" value="<?php echo $recibe_nombre ?>" name="cnombre"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="cnombre">Nombre de quien recibe</label>
</div>


<div class="md-form form-sm mb-3">
    <i class="fas fa-map-pin prefix"></i>
    <input type="text" id="creferencia" value="<?php echo $puntoreferencia ?>" name="creferencia"
        class="form-control form-control-sm validate">
    <label data-error="wrong" data-success="right"
        for="creferencia">Punto de referencia</label>
</div>


<div class="text-center form-sm mt-2 letra-gotham-bold">
    <button class="btn btn-info bg-vino" id="btn-cambios" name="btn-cambios">Cambiar Direción <i
            class="fas fa-sign-in ml-1"></i></button>
</div>

</form>
            </div>
            <!--Footer-->
            <div class="modal-footer p-3">
                <button type="button"
                    class="btn outline-vino waves-effect ml-auto vino letra-gotham-bold p-3"
                   data-dismiss="modal">Cerrar</button>
            </div>




        </div>
        <!--/.Content-->
    </div>
</div>
<!--fin Modal: Login / Register Form-->