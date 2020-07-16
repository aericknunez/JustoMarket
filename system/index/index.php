<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

include_once 'system/index/InicioModal.php';
	$indexM = new IndexModal(); 


?>
<div class="container">
<?


 // index
    require_once 'system/index/carrusel_index.php';

    require_once 'system/index/barra_buscarIndex.php';
// cuerpo
    require_once 'system/index/carCategorias.php';

    require_once 'system/index/IndexBanner.php';
?>
<!-- llamar productos destacados desde jquery -->
<div id="productos-destacados"></div>


</div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


?>