<?php
include_once 'application/common/Helpers.php'; // [Para todo]
include_once 'application/includes/variables_db.php';
include_once 'application/common/Mysqli.php';
include_once 'application/includes/DataLogin.php';
$db = new dbConn();
$seslog = new Login();
$seslog->sec_session_start();

if($_SESSION["mayordeedad"] == FALSE){
	if($_COOKIE["mayordeedad"] == TRUE){
      $_SESSION["mayordeedad"] = $_COOKIE["mayordeedad"];      
	}
}

unset($_SESSION["categorias_menu"]);
if($_SESSION["categorias_menu"] == NULL){
	include_once 'system/index/IndexCategorias.php';
	$catex = new GetCategorias();
	$datacat = $catex->GetCategorias(URL_SERVER . "application/src/api.php?op=35&td=" . TD_SERVER);	
	$_SESSION["categorias_menu"] = $datacat;
}

// echo '<p style="color: red; background: black; font-size: 18px; text-align: center;">ESTAMOS REALIZANDO PRUEBAS EN ESTE MOMENTO ES PROBABLE QUE EL SISTEMA ESTE FALLANDO</p>';


$_SESSION["last_url"] = HOST_URL . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];


if ($seslog->login_check() == TRUE) {
    include_once 'catalog/index.php';
} else {
	if(isset($_GET["perfil"])){
		header("location: ?");
	}
    include_once 'catalog/index.php';
}

$db->close();
?>
