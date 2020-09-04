<?php 

    if ($r = $db->select("*", "login_direcciones", "WHERE user = '".$_SESSION["user"]."'")) { 
       
        $usr_direccion = $r["usr_direccion"];
        $usr_pais = $r["usr_pais"];
        $usr_departamento = $r["usr_departamento"];
        $usr_municipio = $r["usr_municipio"];
        $usr_telefono = $r["usr_telefono"];
        $f_nacimiento = $r["f_nacimiento"];
        $recibe_pais = $r["recibe_pais"];
        $recibe_departamento = $r["recibe_departamento"];
        $recibe_municipio = $r["recibe_municipio"];
        $recibe_direccion = $r["recibe_direccion"];
        $recibe_nombre = $r["recibe_nombre"];
        $recibe_telefono = $r["recibe_telefono"];
        $puntoreferencia = $r["puntoreferencia"];
   

    }   unset($r);  


 ?>
 <div id="msj"></div>
<div class="card card-cascade cascading-admin-card user-card">

  <div class="admin-up d-flex justify-content-start ml-3 mt-4">
      <h5 class="font-weight-bold dark-grey-text"><i class="fas fa-users"></i> Datos Personales - <span class="text-muted">Agregue su direcci&oacuten</span></h5>
  </div>
 <?php 

 if($_GET["msj"] == 1){
  echo '<div class="text-center white-text bg-vino">Por favor ingrese sus datos</div>';
 }

  ?>

  <div class="card-body card-body-cascade">

<form name="form-perfil" method="post" id="form-perfil">

<div class="row">

      <div class="col-md-6">

        <div class="md-form form-sm mb-0">
          <input type="text" id="nombres" name="nombres" class="form-control form-control-sm" value="<?php echo $_SESSION["nombres"] ?>">
          <label for="nombres" class="">Nombres</label>
        </div>

      </div>

      <div class="col-md-6">

        <div class="md-form form-sm mb-0">
          <input type="text" id="apellidos" name="apellidos" class="form-control form-control-sm" value="<?php echo $_SESSION["apellidos"] ?>">
          <label for="apellidos" class="">Nombres</label>
        </div>

      </div>


</div>



<div class="row">


      <div class="col-lg-6">

        <div class="md-form form-sm mb-0">
          <input type="text" id="usr_telefono" name="usr_telefono" class="form-control form-control-sm" value="<?php echo $usr_telefono ?>">
          <label for="usr_telefono" class="">Teléfono</label>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="md-form form-sm mb-0">
           <input placeholder="Seleccione una fecha" type="text" id="f_nacimiento" name="f_nacimiento" class="form-control datepicker my-2" <?php if($f_nacimiento != NULL) echo 'data-value="' . $f_nacimiento .'"'; ?>>
          <label for="f_nacimiento" class="">Fecha Nacimiento</label>
        </div>

      </div>

</div>


<h4 class="mt-3">Dirección de envio</h4>
<div class="alert alert-danger" role="alert">
  <strong>Importante:</strong> La dirección de envío debe estar en el rango establecido por la empresa. Revise el listado de ciudades cubiertas <a id="vercobertura">Aqui</a>
</div>

<div class="row">


      <div class="col-md-12">

        <div class="md-form form-sm mb-0">
          <input type="text" id="recibe_direccion" name="recibe_direccion" class="form-control form-control-sm" value="<?php echo $recibe_direccion ?>">
          <label for="recibe_direccion" class="">Dirección</label>
        </div>

      </div>

</div>



<div class="row">


      <div class="col-lg-4 col-md-12">

        <div class="md-form form-sm mb-0">
          <input type="text" id="recibe_pais" name="recibe_pais" class="form-control form-control-sm disabled" value="El Salvador" >
          <label for="recibe_pais" class="">País</label>
        </div>

      </div>

      <div class="col-lg-4 col-md-6">

        <div class="md-form form-sm mb-0">

        <select class="browser-default custom-select md-form form-sm mb-0" id="recibe_departamento" name="recibe_departamento">
      <?php 

                $a = $db->query("SELECT id, departamento FROM cobertura_departamento");
                  echo '<option>* Seleccione</option>';
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

      <div class="col-lg-4 col-md-6">

        <div class="md-form form-sm mb-0">
         <select class="browser-default custom-select md-form form-sm mb-0" id="recibe_municipio" name="recibe_municipio">
          <?php 

                $a = $db->query("SELECT id, municipio FROM cobertura_municipio WHERE departamento = '".$recibe_departamento."'");
                  echo '<option>* Seleccione</option>';
                  foreach ($a as $b) {  

                      if($recibe_municipio == $b["id"]){
                          echo '<option value="'. $b["id"] .'" selected >'. $b["municipio"] .'</option>'; 
                      } else {
                          echo '<option value="'. $b["id"] .'">'. $b["municipio"] .'</option>'; 
                      }

                  } $a->close(); 
           ?>
        </select>

        </div>

      </div>

</div>


<div class="row">


      <div class="col-md-9">

        <div class="md-form form-sm mb-0">
          <input type="text" id="recibe_nombre" name="recibe_nombre" class="form-control form-control-sm" value="<?php echo $recibe_nombre ?>">
          <label for="recibe_nombre" class="">Nombre de la persona que recibe el pedido</label>
        </div>

      </div>

     <div class="col-md-3">

        <div class="md-form form-sm mb-0">
          <input type="text" id="recibe_telefono" name="recibe_telefono" class="form-control form-control-sm" value="<?php echo $recibe_telefono ?>">
          <label for="form9" class="">Teléfono (Opcional)</label>
        </div>

      </div>
      
</div>


<div class="row">
      <div class="col-md-12">
        <div class="md-form mb-0">
          <textarea type="text" id="puntoreferencia" name="puntoreferencia" class="md-textarea form-control" rows="3">
            <?php echo $puntoreferencia ?>
          </textarea>
          <label for="puntoreferencia">Punto de referencia a destacar de su dirección (opcional)</label>
        </div>

      </div>
</div>


<h4 class="mt-3">Dirección de residencia</h4>
<div class="row">
  <dic class="col-md-12">
            <div class="switch">
            <label>
             Mi dirección es igual a la dirección de envío ||  NO
              <input type="checkbox" id="conf_direccion" name="conf_direccion" <?php 
              if ($usr_direccion != NULL and ($usr_direccion == $recibe_direccion)) {
               echo 'checked="checked"';
              } ?> >
              <span class="lever bg-vino"></span> SI 
            </label>
          </div>
  </dic>
</div>


<div id="direccionresidencia">
<div class="row">

      <div class="col-md-12">

        <div class="md-form form-sm mb-0">
          <input type="text" id="usr_direccion" name="usr_direccion" class="form-control form-control-sm" value="<?php echo $usr_direccion ?>">
          <label for="form6" class="">Dirección</label>
        </div>

      </div>
</div>


<div class="row">


      <div class="col-lg-4 col-md-12">

        <div class="md-form form-sm mb-0">
          <input type="text" id="usr_pais" name="usr_pais" class="form-control form-control-sm disabled" value="<?php echo $usr_pais ?>">
          <label for="usr_pais" class="">País</label>
        </div>

      </div>


      <div class="col-lg-4 col-md-6">

        <div class="md-form form-sm mb-0">
          <select class="browser-default custom-select md-form form-sm mb-0" id="usr_departamento" name="usr_departamento">
      <?php 

                $a = $db->query("SELECT id, departamento FROM cobertura_departamento");
                  echo '<option>* Seleccione</option>';
                  foreach ($a as $b) {  

                      if($usr_departamento == $b["id"]){
                          echo '<option value="'. $b["id"] .'" selected >'. $b["departamento"] .'</option>'; 
                      } else {
                          echo '<option value="'. $b["id"] .'">'. $b["departamento"] .'</option>'; 
                      }

                  } $a->close(); 

       ?>
      </select>
        </div>

      </div>

      <div class="col-lg-4 col-md-6">

        <div class="md-form form-sm mb-0">
          <select class="browser-default custom-select md-form form-sm mb-0" id="usr_municipio" name="usr_municipio">
          <?php 

                $a = $db->query("SELECT id, municipio FROM cobertura_municipio WHERE departamento = '".$usr_departamento."'");
                  echo '<option>* Seleccione</option>';
                  foreach ($a as $b) {  

                      if($usr_municipio == $b["id"]){
                          echo '<option value="'. $b["id"] .'" selected >'. $b["municipio"] .'</option>'; 
                      } else {
                          echo '<option value="'. $b["id"] .'">'. $b["municipio"] .'</option>'; 
                      }

                  } $a->close(); 
           ?>
        </select>
        </div>

      </div>

</div>
</div> 



<div class="row d-flex float-right">
    <button class="btn bg-vino white-text my-4 z-depth-2" type="submit" id="btn-perfil" name="btn-perfil">
      <i class="far fa-save"></i> Guardar </button>
 </form>
</div>


  </div>


</div>
