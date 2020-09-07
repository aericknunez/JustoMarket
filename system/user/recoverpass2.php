<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'application/common/Encrypt.php';

$email = Encrypt::Decrypt($_REQUEST["u"],md5(TD_SERVER));
$time = $_REQUEST["t"] + 3600;



?>

<div class="container">
  

  <div class="row justify-content-center">
  <div class="col-10 col-md-6">
    <h3 class="text-uppercase bg-verde white-text font-weight-bold text-center bordeado3 p-3">Recucuperar su password</h3>
  </div>
</div>


<div class="row justify-content-center mb-5">
  <div class="col-6 col-md-4 text-center">
 
 <?php 
if($time > Fechas::Format(date("H:i:s"))){

if($_REQUEST["hash"] == md5($_REQUEST["u"])){
  ?>

    <form id="form-cambio" name="form-cambio">
      
 <p class="h6 mb-4"><?php echo $email ?></p>

    <!-- Email -->
    <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
    <input type="password" id="pass1" name="pass1" class="form-control mb-2" placeholder="Pasword">
    <input type="password" id="pass2" name="pass2" class="form-control mb-2" placeholder="Repetir Password">


    <button class="btn bg-naranja mt-2 text-white" type="submit" id="btn-cambio" name="btn-cambio">CAMBIAR</button>

  


    </form>
<?php } else {

     echo '<div class="row justify-content-center">
            <div class="col-12">
              <h3 class="text-uppercase bg-vino white-text font-weight-bold text-center bordeado3 p-3">Enlace incorrecto!</h3>
            </div>
          </div>';
} 

} else {
     echo '<div class="row justify-content-center">
            <div class="col-12">
              <h3 class="text-uppercase bg-vino white-text font-weight-bold text-center bordeado3 p-3">El enlace ha caducado.</h3>
              <p> Puede generar un nuevo enlace </p>
              <a href="?recovery" class="btn outline-vino waves-effect ml-auto letra-gotham-bold p-3">Nuevo Enlace</a>
            </div>
          </div>';

}?>
<div id="msj"></div>
  </div>
</div>
<br><br>




</div>