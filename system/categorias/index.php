<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/categorias/Inicio.php';
	$cat = new Categorias(); 
include_once 'system/index/InicioModal.php';
	$indexM = new IndexModal(); 

    $_SESSION["categoria"] = $_REQUEST["categoria"];
?>
<div class="container">
<?

  require_once 'system/categorias/barra_buscarCategoria.php';
  require_once 'system/categorias/OrderbyCategoria.php';

  // require_once 'system/categorias/CuerpoCategoria.php';
	// $cat->ProductosCategoria(URL_SERVER . "application/src/api.php?op=12&cantidad=&td=" . TD_SERVER . "&categoria=" . $_REQUEST["categoria"]);
?>

<div id="productos-categorias"></div>

</div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';

?>


<!-- ///  modal para los vinos y licores -->
<?php if($_REQUEST["categoria"] == "vinos y licores" and $_SESSION["mayordeedad"] == FALSE){
?>


<!-- Modal: vinos y locores -->
<!-- <div class="modal fade" id="ModalVinos" tabindex="-1" role="dialog" aria-labelledby="ModalVinos"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal-border-rounded p-2">


            <div class="modal-header p-1 border-0">
            </div>
   
   
            <div class="modal-body p-4">
                <div class="container z-depth-0 text-center">

                <h2 class="vino">¡CONTENIDO RESTRINGIDO!</h2>
                <p>Para poder ver el contenido de las marcas de licores que distribuimos, necesitamos confirmar que eres mayor de edad (18 años de edad como mínimo)</p>
                <h5>¿Eres mayor de 18 años?</h5>

                	<a id="mayoriadeedad" class="btn bg-vino white-text">SÍ</a> 
                	<a href="<?php echo BASE_URL; ?>" class="btn bg-vino white-text">NO</a>

                	<div class="form-check">
					<input type="checkbox" class="form-check-input" id="recuerdame" checked>
					<label class="form-check-label" for="recuerdame">Recuerdame</label>
					</div>


					<div id="msjedad"></div>


                </div>
            </div>
        </div>
    </div>
</div>
 -->



<?
} ?>