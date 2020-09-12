<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SESSION["td"] == 100){
$numero = rand(1,9999);	
} else {
$numero = 1;	
}

//$numero = 1;

if(isset($_GET["modal"])) { 
echo '
	<script>
		$(document).ready(function()
		{
		  $("#' . $_GET["modal"] . '").modal("show");
		});
	</script>';


} // termina modal


elseif(isset($_GET["cart"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/cart.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["perfil"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/perfil.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["checkout"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/checkout.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/stepper.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["categoria"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/categorias.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["promociones"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/categorias.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["recovery"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/checkout.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["recoverypass"])) {
echo '<script type="text/javascript" src="'.BASE_URL.'assets/js/checkout.js?v='.$numero.'"></script>';
} 


else{


}




if($_REQUEST["categoria"] == "vinos y licores" and $_SESSION["mayordeedad"] == FALSE){
?>

<!-- 	<script>
		$(document).ready(function()
		{
		  $("#ModalVinos").modal("show");
		});
	</script> -->

<?
} 

?>

