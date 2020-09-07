<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/busqueda/Clase.php';
	$search = new Busqueda(); 
?>
<div class="container">
<?

// echo "Cat: " . $_REQUEST["categoria"];

  require_once 'system/busqueda/barra_buscar.php';

?>
<div id="busquedas">
	
<?php 

	$search->Buscar(URL_SERVER . "application/src/api.php?op=15&search=".$_POST["search"]."&td=" . TD_SERVER);

 ?>	
</div>


</div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


?>


