<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/index/Inicio.php';
	$ind = new Index(); 
include_once 'system/index/InicioModal.php';
	$indexM = new IndexModal(); 
include_once 'system/detalles/Inicio.php';
	$detalles = new Detalles(); 

?>
<div class="container">
<?
  
 // echo "Detalle: " . $_REQUEST["id"];


  require_once 'system/detalles/barra_buscarDetalle.php';



  $detalles->VerDetalles(BASE_URL . "producto.json"); 

  $ind->ProductosDestacados(BASE_URL . "jsonproductos.json");


?>
</div>
