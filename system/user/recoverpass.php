<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'application/common/Encrypt.php';


?>

<div class="container">
  

  <div class="row justify-content-center">
  <div class="col-10 col-md-6">
    <h3 class="text-uppercase bg-naranja white-text font-weight-bold text-center bordeado3 p-3">Recucuperar su password</h3>
  </div>
</div>


<div class="row justify-content-center mb-5">
  <div class="col-6 col-md-4 text-center">
 
    <form id="form-recovery" name="form-recovery">
      
 <p class="h6 mb-4">Ingrese su email</p>

    <!-- Email -->
    <input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail">

    <button class="btn bg-naranja mt-2 text-white" type="submit" id="btn-recovery" name="btn-recovery">RECUPERAR</button>

    </form>


  </div>
  
  <div id="msj"></div>
</div>
<br><br>




</div>