<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();
include_once '../includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();

include_once '../common/Fechas.php';
include_once '../../system/config/Inicio.php';

$redirect = $_SESSION["last_url"];
if($redirect == BASE_URL . "?perfil"){
	$redirect = BASE_URL;
}

        $inicia = new Inicio();
        $inicia->RegisterInOut(2); // registra la salida
	
// Unset all session values 
$_SESSION = array();

// get session parameters 
$params = session_get_cookie_params();

// Delete the actual cookie. 
setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

// Destroy session 
session_destroy();

header("location: " . $redirect);

exit();
?>