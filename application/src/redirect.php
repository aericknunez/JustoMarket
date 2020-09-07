<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_GET["modal"])) include_once 'system/modal/modal.php';

elseif(isset($_GET["user"])) include_once 'system/user/user.php';

elseif(isset($_GET["categoria"])){
	include_once 'system/categorias/index.php';
		if($_SESSION["redirect_checkout"] == TRUE){
		unset($_SESSION["redirect_checkout"]);
	}
} 

elseif(isset($_GET["detalle"])){
	 include_once 'system/detalles/index.php';
	 	if($_SESSION["redirect_checkout"] == TRUE){
		unset($_SESSION["redirect_checkout"]);
	}
}

elseif(isset($_GET["promociones"])) {
	include_once 'system/promociones/index.php';
		if($_SESSION["redirect_checkout"] == TRUE){
		unset($_SESSION["redirect_checkout"]);
	}
}

elseif(isset($_GET["contacto"])) include_once 'system/contacto/index.php';


elseif(isset($_GET["cart"])){
	 include_once 'system/checkout/index.php';
	 $_SESSION["redirect_checkout"] = TRUE;
}

elseif(isset($_GET["checkout"])) {
	include_once 'system/checkout/checkout.php';
	$_SESSION["redirect_checkout"] = TRUE;
}

elseif(isset($_GET["perfil"])) include_once 'system/user/index.php';

elseif(isset($_GET["faq"])) include_once 'system/documentos/preguntas.php';

elseif(isset($_GET["terminos"])) include_once 'system/documentos/terminos.php';

elseif(isset($_GET["cobertura"])) include_once 'system/documentos/cobertura.php';

elseif(isset($_GET["recovery"])) include_once 'system/user/recoverpass.php';

elseif(isset($_GET["recoverypass"])) include_once 'system/user/recoverpass2.php';


else{

	include_once 'system/index/index.php';
	if($_SESSION["redirect_checkout"] == TRUE){
		unset($_SESSION["redirect_checkout"]);
	}
	

} // else
	
?>