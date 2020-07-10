<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SESSION["td"] == 100){
$numero = rand(1,9999999999);	
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
	</script>
	';


	// if($_GET["modal"] == "conf_config"){
	// echo '<script type="text/javascript" src="assets/js/query/conf_config.js?v='.$numero.'"></script>';
	// }



} // termina modal


elseif(isset($_GET["pdescuentos"])) {
echo '<script type="text/javascript" src="assets/js/query/planilla.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["planillasver"])) {
echo '<script type="text/javascript" src="assets/js/printThis.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/paginador.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/planilla.js?v='.$numero.'"></script>';
} 

elseif(isset($_GET["backup"])) {
echo '<script type="text/javascript" src="assets/js/query/backup.js?v='.$numero.'"></script>';
} 


else{


}
	
?>

<script>
	
	$("body").on("click","#cambiar",function(){
        var op = $(this).attr('op');
        $.post("application/src/routes.php", {op:op}, 
        	function(htmlexterno){
            window.location.href="?";
        });
    });	


// preloader
    $(window).on("load", function () {
        $('#mdb-preloader').fadeOut('fast');
    });


</script>
