<?php
include_once 'application/common/Helpers.php'; // [Para todo]
include_once 'application/includes/variables_db.php';
include_once 'application/common/Mysqli.php';
include_once 'application/includes/DataLogin.php';
$db = new dbConn();
$seslog = new Login();
$seslog->sec_session_start();

echo '<p style="color: red; background: black; font-size: 18px; text-align: center;">ESTAMOS REALIZANDO PRUEBAS EN ESTE MOMENTO ES POBABLE QUE EL SISTEMA ESTE FALLANDO</p>';
print_r($_SESSION);


$_SESSION["last_url"] = HOST_URL . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];


	if($_SESSION["mayordeedad"] == FALSE){
		if($_COOKIE["mayordeedad"] == TRUE){
	      $_SESSION["mayordeedad"] = $_COOKIE["mayordeedad"];      
		}
	}


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
