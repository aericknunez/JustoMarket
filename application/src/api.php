<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();

// ESTE ARCHIVO ES EXCLUSIVO SOLO PARA ECOMMERCE, AQUI SE EJECUTAN LAS SOLICITUDES DEL SERVER

include_once '../common/Alerts.php';
include_once '../common/Fechas.php';
include_once '../common/Encrypt.php';
include_once '../common/Dinero.php';




switch ($_REQUEST["op"]) {


case "1": // detalles del usuario
	include_once '../../system/api/Api.php';
	$data = new Api();
	echo $data->DatosUsuario($_REQUEST["user"], $_REQUEST["secret"]); // datos de usuario
break;





} // termina switch














/////////
$db->close();
?>