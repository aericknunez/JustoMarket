<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/categorias/Inicio.php';
	$cat = new Categorias(); 
include_once 'system/index/InicioModal.php';
	$indexM = new IndexModal(); 


?>
<div class="container">
<?

// echo "Cat: " . $_REQUEST["categoria"];

  require_once 'system/promociones/barra_buscar.php';

  require_once 'system/promociones/Orderby.php';

	$cat->ProductosCategoria(BASE_URL . "jsonproductos.json");

?>
</div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


?>


