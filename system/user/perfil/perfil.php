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


    if ($r = $db->select("municipio", "cobertura_municipio", "WHERE id = '".$usr_municipio."'")) {     
        $xmunicipio = $r["municipio"];
    }   unset($r);  

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$usr_departamento."'")) {     
        $xdepartamento = $r["departamento"];
    }   unset($r);  




    if ($r = $db->select("municipio, tiempo, costo, cant_minima", "cobertura_municipio", "WHERE id = '".$recibe_municipio."'")) {     
        $municipio = $r["municipio"];
        $tiempo = $r["tiempo"];
        $costo = $r["costo"];
        $cant_minima = $r["cant_minima"];
    }   unset($r);  

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$recibe_departamento."'")) {     
        $departamento = $r["departamento"];
    }   unset($r);  

 ?>

<!-- Card -->
<div class="card card-cascade cascading-admin-card user-card mt-4">

  <!-- Card Data -->
  <div class="admin-up d-flex justify-content-start ml-3 mt-2">
      <h5 class="font-weight-bold dark-grey-text"><i class="fas fa-users"></i> Datos Personales - <span class="text-muted">Perfil</span></h5>
  </div>
  <!-- Card Data -->

  <!-- Card content -->
  <div class="card-body card-body-cascade">



<div class="text-left">
<h2><?php echo $_SESSION["nombre"] ?></h2>












   <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <a href="?perfil&op=1"><i class="far fa-money-bill-alt bg-naranja mr-3 z-depth-2"></i></a>
                <div class="data">
                  <p class="text-uppercase">Productos</p>
                  <h4 class="font-weight-bold dark-grey-text">
                  <?php 
                    echo $check->TotalProductosUsuario(URL_SERVER . "application/src/api.php?op=32&user=".$_SESSION["user"]."&td=" . TD_SERVER);
                     ?>
                       
                     </h4>
                </div>
              </div>

              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <a href="?perfil&op=1"><i class="fas fa-chart-line bg-vino mr-3 z-depth-2"></i></a>
                <div class="data">
                  <p class="text-uppercase">Pedidos</p>
                  <h4 class="font-weight-bold dark-grey-text">

                  <?php 
                    echo $check->TotalPedidosUsuario(URL_SERVER . "application/src/api.php?op=33&user=".$_SESSION["user"]."&td=" . TD_SERVER);
                     ?>
                       
                     </h4>
                </div>
              </div>

              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>



</div>


<?php 
  if($usr_direccion != NULL and $usr_telefono != NULL){
 ?>

<div class="text-left">
<h4>Informaci&oacuten General</h4>
<ul class="pl-2">
<li class="linopunto"><span><strong>Fecha de Nacimientos : </strong></span><?php echo Fechas::FechaEscrita($f_nacimiento) ?></li>
<li class="linopunto"><span><strong>Dirección : </strong></span><?php echo $usr_direccion. ", " .$xmunicipio. ", " .$xdepartamento. ", " .$usr_pais ?></li>
<li class="linopunto"><span><strong>E-mail : </strong></span><a><?php echo $_SESSION["email"]; ?></a></li>
<li class="linopunto"><span><strong>Teléfono : </strong></span><?php echo $usr_telefono ?></li>
</ul>
</div>

<hr>

<div class="text-left">
<h4>Informaci&oacuten de envío</h4>
<ul class="pl-2">
<li class="linopunto"><span><strong>Dirección : </strong></span><?php echo $recibe_direccion. ", " .$municipio. ", " .$departamento. ", " .$usr_pais ?></li>
<li class="linopunto"><span><strong>Teléfono : </strong></span><?php echo $recibe_telefono ?></li>
<?php 
if ($puntoreferencia != NULL) {
echo '<li class="linopunto"><span><strong>Punto de referencia : </strong></span>'.$puntoreferencia.'</li>';
 } ?>

</ul>
</div>

<?

    if($tiempo != NULL){
   echo '<p class="bg-vino white-text text-center pt-2 pb-2 mr-1 ml-1">Todas sus órdenes llegarán en un máximo de '.$tiempo.' hasta su dirección de envío, con un costo de ' . Helpers::Dinero($costo). ' Dólares</p>';

   echo '<p class="bg-naranja white-text text-center pt-2 pb-2 mr-1 ml-1">Para un mejor servicio, la cantidad mínima de compra es de '.Helpers::Dinero($cant_minima).' Dólares</p>';


    }
   


  } else {
    Alerts::Mensajex("Aún no ha registrado sus datos de envío.","danger",'<a href="?perfil&op=2" class="btn btn-info my-4 waves-effect waves-light"">Agregar Datos</a>');
  }
?>


  </div>
  <!-- Card content -->

</div>
<!-- Card -->