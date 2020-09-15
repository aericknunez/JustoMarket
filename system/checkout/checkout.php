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


/// verifico si esta logeado 
if ($_SESSION["user"] != NULL) {


 if( $check->CantidadProductos(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]) > 0){


  if($recibe_direccion != NULL and $usr_telefono != NULL){
 ?>

<div id="msj"></div>



<h4 class="bg-naranja white-text text-center pt-3 pb-3"><strong>DATOS DE FACTURACIÓN</strong></h4>
 
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
<!-- inicia stepper -->
<div class="container">
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step col-xs-3"> 
              <a id="btn-1" type="button" class="btn bg-vino text-white btn-circle">1</a>
              <p><small>Dirección de Envío</small></p>
          </div>
          <div class="stepwizard-step col-xs-3"> 
              <a id="btn-2" type="button" class="btn bg-vino text-white btn-circle">2</a>
              <p><small>Forma de Pago</small></p>
          </div>
          <div class="stepwizard-step col-xs-3"> 
              <a id="btn-3" type="button" class="btn bg-vino text-white btn-circle">3</a>
              <p><small>Finalizar</small></p>
          </div>
      </div>
  </div>
    


        <div class="panel panel-primary setup-content" id="step-1">
  <!-- contenido -->
<?php 
if(!isset($_REQUEST["step"])){
include_once 'system/checkout/step1.php';
}
 ?>
  <!-- contenido -->
        </div>
        
        
        <div class="panel panel-primary setup-content" id="step-2">
  <!-- contenido -->
<?php 
if($_REQUEST["step"] == "2"){
include_once 'system/checkout/step2.php';
}
 ?>
  <!-- contenido -->
        </div>
        
        
        <div class="panel panel-primary setup-content" id="step-3">
  <!-- contenido -->
<?php 
if($_REQUEST["step"] == "3"){
include_once 'system/checkout/step3.php';
}
 ?>
  <!-- contenido -->
        </div>

</div>
<!-- termina el stepper -->

<?php 
} else { // termina cantidad minima

 echo '<div class="bg-vino pt-3 pb-3 white-text text-center mt-4 bordeado3 ml-2 mr-2 pr-2 pl-2">¡Hola! En tu municipio el pedido mínimo para poder despacharte es de ' . Helpers::Dinero($cant_minima) . ' te invitamos a que puedas aumentar el monto de tu compra. ¡Gracias!</div>

 <div class="text-center mt-4"><a id="continuarcomprando" class="btn btn-primary bg-naranja btn-md ">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
}

 ?>





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
    <h4 class="text-uppercase">Debes Iniciar sesión para completar tu pedido.</h4>
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
} 





// baner de footer
 require_once 'catalog/catalog/BannerInferior.php';
 require_once 'catalog/catalog/Modal/seguircomprando.php';
 require_once 'catalog/catalog/Modal/gracias.php';
 require_once 'catalog/catalog/Modal/cambiardireccion.php';


?>
