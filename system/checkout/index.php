<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

?>

<!-- <div class="container">
  <div class="row">

  	<div class="col-md-3 bg-vino">Imagen</div>
    <div class="col-md-9 bg-danger">
      Descripcion del producto
      <div class="row">
        <div class="col-md-4 bg-secondary">cantidad</div>
        <div class="col-5 col-md-4 bg-light">precio</div>
        <div class="col-5 col-md-3 bg-success">Monto</div>
        <div class="col-2 col-md-1 bg-info">Borrar</div>
      </div>
    </div>
    

  </div>
</div> -->

<div class="container">
<div id="contenidocart"></div>
</div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


 require_once 'catalog/catalog/Modal/seguircomprando.php';
?>



