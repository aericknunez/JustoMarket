<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

include_once 'system/checkout/Inicio.php';
$check = new CheckOut();


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

    if ($r = $db->select("municipio, tiempo", "cobertura_municipio", "WHERE id = '".$recibe_municipio."'")) {     
        $municipio = $r["municipio"];
        $tiempo = $r["tiempo"];
    }   unset($r);  

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$recibe_departamento."'")) {     
        $departamento = $r["departamento"];
    }   unset($r);  



 ?>




<?php 

/// verifico si esta logeado 
if ($seslog->login_check() == TRUE) {





 if( $check->CantidadProductos(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]) > 0){


  if($usr_direccion != NULL and $usr_telefono != NULL){
 ?>








<h4 class="bg-naranja white-text text-center pt-3 pb-3"><strong>DATOS DE FACTURACIÓN</strong></h4>
 <main>
    <div class="container wow fadeIn">
      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

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
              <div class="md-form mb-5">
                <input type="text"  class="form-control" value="<?php echo $_SESSION["email"]; ?>" readonly>
                <label>Email</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" class="form-control" value="<?php echo $recibe_direccion; ?>" readonly>
                <label>Dirección</label>
              </div>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 md-form">

                  <label>Pais</label>
                  <input type="text" class="form-control" value="<?php echo $recibe_pais; ?>" readonly>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 md-form">

                  <label>Departamento</label>
                  <input type="text" class="form-control" value="<?php echo $departamento; ?>" readonly>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 md-form">

                  <label>Municipio</label>
                  <input type="text" class="form-control" value="<?php echo $municipio; ?>" readonly>
                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!-- <hr> -->

<!--               <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div> -->

              <hr>

              <div class="d-block my-3">

              	<?php Alerts::Mensajex("En este momento sólo está disponible el pago contra entrega","success"); ?>

                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" disabled unchecked>
                  <label class="custom-control-label" for="credit">Tarjeta de credito</label>
                </div>
<!--                 <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div> -->
                <div class="custom-control custom-radio">
                  <input id="entrega" name="entrega" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="entrega">Pago contra entrega</label>
                </div>
              </div>
<!--               <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div> -->
<!--               <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div> -->

              <hr class="mb-4">
        <?php 

        if($tiempo != NULL){
        Alerts::Mensajex("Su orden llegará en un máximo de $tiempo","info"); }
        ?>
              
              <hr class="mb-4">
              <a id="mandarpedido" class="btn btn-primary bg-vino btn-lg btn-block">Terminar mi pedido</a>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <?php 

          $check->Pedido(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);

           ?>

      <!-- Promo code -->
  <!--    <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form> -->
          <!-- Promo code -->

            <div id="mensaje"></div>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>








<?php 
  } else {
    Alerts::Mensajex("Aún no ha registrado sus datos de envío.","danger",'<a href="?perfil&op=2" class="btn btn-info my-4 waves-effect waves-light"">Agregar Datos</a>');
  }


} else { /// la cantidad es 0

  echo '<div class="col-12 text-center mb-4">
      <img src="'. BASE_URL .'assets/img/carritovacio.png"
                class="img-fluid">
    </div>';

    Alerts::Mensajex("No existen productos agregados para facturar. Puede seguir explorando nuestro catálogo y elegir sus productos","danger");
}



/// si no esta logeado
} else {

?>


<div class="container" style="min-height: 700px;">

  <main>
    
    <div class="row d-flex justify-content-center">
      <div class="col-12 text-center" >
        <img src="assets/img/error.png" alt=""> <br>
         <h4>Debes Iniciar sesión para poder continuar.</h4>
        <a id="mlogin" class="btn bg-vino white-text"> Ingresar</a>
      </div>
    </div>

  </main>

</div>

<?
} ?>























<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


?>


