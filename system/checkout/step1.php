    <div class="container wow fadeIn">
      <!--Grid row-->
      <div class="row">

          <!--Card-->
          <div class="card card-body bordeado2">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" class="form-control" value="<?php echo $_SESSION["nombres"]; ?>" readonly>
                    <label>Nombres</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" class="form-control" value="<?php echo $_SESSION["apellidos"]; ?>" readonly>
                    <label>Apellidos</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

     

              <!--email-->
              <div class="md-form mb-2">
                <input type="text"  class="form-control" value="<?php echo $_SESSION["email"]; ?>" readonly>
                <label>Email</label>
              </div>

              <!--address-->
              <div class="md-form mb-2">
                <input type="text" class="form-control" value="<?php echo $recibe_direccion; ?>" readonly>
                <label>Dirección</label>
              </div>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-2 md-form">

                  <label>Pais</label>
                  <input type="text" class="form-control" value="<?php echo $recibe_pais; ?>" readonly>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-2 md-form">

                  <label>Departamento</label>
                  <input type="text" class="form-control" value="<?php echo $departamento; ?>" readonly>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-2 md-form">

                  <label>Municipio</label>
                  <input type="text" class="form-control" value="<?php echo $municipio; ?>" readonly>
                </div>
                <!--Grid column-->

              </div>

              <!--address-->
              <div class="md-form mb-2">
                <input type="text" class="form-control" value="<?php echo $recibe_nombre; ?>" readonly>
                <label>Nombre de la persona que recibe</label>
              </div>

              <!--Grid row-->
<?php if($_SESSION["tipo_cuenta"] != 0){
echo '<div class="text-right mt-3">
<a id="cambiardireccion" class="btn bg-verde btn-sm btn-rounded">Cambiar Dirección de Envío </a></div>';  
} else {
  echo '<div class="text-right mt-3"><a id="cambiardireccion">Cambiar datos </a></div>'; 
} ?>
              

</div></div></div>

<div class="text-right mt-3">
  <a href="?checkout&step=2" class="btn btn-default btn-rounded">Siguiente <i class="fas fa-angle-right ml-1"></i></a>
</div>