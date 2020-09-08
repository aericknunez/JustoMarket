<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

include_once 'system/checkout/Inicio.php';
$check = new CheckOut();

include_once 'system/config/Inicio.php';
  $ini = new Inicio();

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

    if ($r = $db->select("municipio, tiempo, cant_minima", "cobertura_municipio", "WHERE id = '".$recibe_municipio."'")) {     
        $municipio = $r["municipio"];
        $tiempo = $r["tiempo"];
        $cant_minima = $r["cant_minima"];
    }   unset($r);  

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$recibe_departamento."'")) {     
        $departamento = $r["departamento"];
    }   unset($r);  



 ?>




<?php 

/// verifico si esta logeado 
if ($_SESSION["user"] != NULL) {





 if( $check->CantidadProductos(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]) > 0){


  if($recibe_direccion != NULL and $usr_telefono != NULL){
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

<?php 
// verifico que el total de venta sea mayor a la cantidad minima
  $data["usuario"] = $_SESSION["usuario"];
  $data["orden"] = $_SESSION["orden"];

  $ototal = $ini->ObtenerTotal(URL_SERVER . "application/src/api.php?op=22&td=" . TD_SERVER, $data);
  $datax = json_decode($ototal, true);

if($datax["total"] != NULL){
  $total = $datax["total"];
}

if($cant_minima < $total){

 ?>

              <div class="d-block my-3">

              	<?php  Alerts::Mensajex("En este momento sólo está disponible el pago contra entrega","success"); ?>

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

        <p>También puede pasar por nuestra tienda por su orden, estará lista para usted 
<div class="switch">
<label>
Off
<input type="checkbox" id="entienda" <?php if($_SESSION["entienda"] == "on") echo "checked"; ?> name="entienda">
<span class="lever"></span> 
On 
  || Recoger en tienda
</label>
</div>
        </p>
 <div id="verentienda">
   <?php 
if($_SESSION["entienda"] == "on"){
  echo '<div class="text-center text-uppercase"><a href="https://www.google.com/maps/d/edit?mid=1MgdX1iArlCXkCc6VfQ31rZVjURMjKvNb&usp=sharing" target="_blank">Ver el mapa de nuestra ubicación</a></div>';
} ?>
 </div>    
          
              <hr class="mb-4">
              <a id="mandarpedido" class="btn btn-primary bg-vino btn-lg btn-block">completar pedido</a>

<?php 
} else { // termina cantidad minima

 echo '<div class="bg-vino pt-3 pb-3 white-text text-center">La cantidad minima de su compra debe ser ' . Helpers::Dinero($cant_minima) . ' y de momento solo tiene en el carrito ' . Helpers::Dinero($total) . ' continúe comprando para poder procesar su pedido </div>

 <div class="text-center"><a id="continuarcomprando" class="btn btn-primary bg-naranja btn-md ">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
}

 ?>

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

echo '<div class="bg-vino pt-3 pb-3 white-text text-center mb-5">No existen productos agregados para realizar el pedido. Puede seguir explorando nuestro catálogo y elegir los productos que mas desee </div>';

  echo '<div class="col-12 text-center mb-4">
      <img src="'. BASE_URL .'assets/img/carritovacio.png"
                class="img-fluid">
    </div>';


 echo '<div class="text-center"><a id="continuarcomprando" class="btn btn-primary bg-naranja btn-md ">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
}



/// si no esta logeado
} else {

?>


<div class="container" style="min-height: 700px;">

  <main>
    
    <div class="row d-flex justify-content-center">
      <div class="col-12 text-center" >
        <img src="assets/img/error.png" class="img-fluid" alt=""> <br>


<div class="row justify-content-center mb-3">
  <div class="col-md-6 col-11 bordeado3 bg-verde pt-2">
    <h4 class="text-uppercase">Debes Iniciar sesión para completar su pedido.</h4>
         <p class="h6 font-weight-bold">O también puedes comprar como invitado</p>
  </div>
</div>
         
        

<a id="mlogin" class="btn bg-vino white-text btn-rounded mb-4">Iniciar sesión para Continuar
<i class="fas fa-angle-right right"></i></a>
<a id="minvitado" class="btn bg-naranja white-text btn-rounded ml-4 mb-4">Comprar como invitado
<i class="fas fa-angle-right right"></i></a>

      </div>
    </div>

  </main>

</div>

<?
} ?>















<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';




 require_once 'catalog/catalog/Modal/seguircomprando.php';

 require_once 'catalog/catalog/Modal/gracias.php';


?>


















