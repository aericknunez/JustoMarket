<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/index/InicioModal.php';
	$indexM = new IndexModal(); 
include_once 'system/detalles/Inicio.php';
	$detalles = new Detalles(); 

?>
<div class="container">
<?
  
 // echo "Detalle: " . $_REQUEST["id"];


  require_once 'system/detalles/barra_buscarDetalle.php';



$detalles->VerDetalles("http://localhost/cozto/application/src/api.php?op=14&cod=".$_REQUEST["id"]."&td=10");

// $ind->ProductosDestacados(URL_SERVER . "application/src/api.php?op=11&cantidad=12&td=" . TD_SERVER);

?>
<!-- llamar productos destacados desde jquery -->
<div id="productos-destacados">Destacados</div>


</div>
