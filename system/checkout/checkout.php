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
} ?>
              

</div></div></div>

<div class="text-right mt-3">
  <a id="btn-2" class="btn btn-default btn-rounded">Siguiente <i class="fas fa-angle-right ml-1"></i></a>
</div>


  <!-- contenido -->
        </div>
        
        
        <div class="panel panel-primary setup-content" id="step-2">
  <!-- contenido -->

<div class="redondeado2  wow fadeIn">


  <p class="bg-naranja p-3 text-white h5 bordeado3"> Seleccione el método de pago</p>

              <div class="d-block my-3">

                <div class="custom-control custom-radio">
                  <input id="pcredito" name="pago" value="tarjeta" type="radio" class="custom-control-input"  unchecked>
                  <label class="custom-control-label" for="pcredito">Tarjeta de Crédito</label>
                </div>

                <div class="custom-control custom-radio">
                  <input id="pentrega" name="pago" value="entrega" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="pentrega">Pago en Efectivo</label>
                </div>
              </div>

            <div id="msj-entrega">
              <div class="row justify-content-center">
                <div class="col-10 col-md-8 text-center"><p class="bg-verde p-3 text-white bordeado3">Cuando llegue el mensajero con tu orden deberá pagar en efectivo</p></div>
              </div>
            </div>
              <div id="msj-credito">
              <div class="row justify-content-center">
                <div class="col-10 col-md-8 text-center"><p class="bg-verde p-3 text-white bordeado3">Su orden será pagada con tarjeta de crédito con el POS móvil que nuestro mensajero le proporcionará al momento de entregarle su orden </p></div>
              </div>
            </div>


              <hr class="mb-4 border border-dark">
        <?php 

        if($tiempo != NULL){
        Alerts::Mensajex("Su orden llegará en un máximo de $tiempo","info"); }
        ?>

        <p>También puede pasar por nuestra tienda por su orden, estará lista para usted 
<div class="switch">
<label>
No
<input type="checkbox" id="entienda" <?php if($_SESSION["entienda"] == "on") echo "checked"; ?> name="entienda">
<span class="lever"></span> 
Si 
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
        
</div>


<div class="text-right mt-3">
  <a id="btn-1" class="btn btn-default btn-sm btn-rounded"><i class="fas fa-angle-left mr-1"></i> Anterior </a>
  <a id="btn-3" class="btn btn-default btn-rounded">Siguiente <i class="fas fa-angle-right ml-1"></i></a>
</div>
  <!-- contenido -->
        </div>
        
        
        <div class="panel panel-primary setup-content" id="step-3">
  <!-- contenido -->
<div class="redondeado2  wow fadeIn">

  <div class="row">
    <div class="col-md-6">
<?php 

$check->Pedido(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);

?>

   <div id="mensaje"></div>
   <a id="mandarpedido" class="btn btn-primary bg-vino btn-lg btn-block">completar pedido</a>   
      
    </div>
    
    <div class="col-md-6 d-none d-md-block d-lg-block">
      <div class="text-center">
        <p class="bg-verde p-3 text-white bordeado3">Casi hemos terminado. Sólo debe completar su pedido</p>
      <img src="assets/img/gracias.png" class="img-fluid" alt="">
    </div>
    </div>
      

  </div>

      
</div>

<div class="text-right mt-3">
  <a id="btn-2" class="btn btn-default btn-sm btn-rounded"><i class="fas fa-angle-left mr-1"></i> Anterior </a>
</div>
  <!-- contenido -->
        </div>

</div>
<!-- termina el stepper -->

<?php 
} else { // termina cantidad minima

 echo '<div class="bg-vino pt-3 pb-3 white-text text-center">La cantidad minima de su compra debe ser ' . Helpers::Dinero($cant_minima) . ' y de momento solo tiene en el carrito ' . Helpers::Dinero($total) . ' continúe comprando para poder procesar su pedido </div>

 <div class="text-center"><a id="continuarcomprando" class="btn btn-primary bg-naranja btn-md ">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
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
} 





// baner de footer
 require_once 'catalog/catalog/BannerInferior.php';
 require_once 'catalog/catalog/Modal/seguircomprando.php';
 require_once 'catalog/catalog/Modal/gracias.php';
 require_once 'catalog/catalog/Modal/cambiardireccion.php';


?>
