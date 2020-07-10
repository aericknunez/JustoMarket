<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();
include_once '../includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();


include_once '../common/Alerts.php';
include_once '../common/Fechas.php';
include_once '../common/Encrypt.php';
include_once '../common/Dinero.php';



switch ($_REQUEST["op"]) {



case "405": // agragar Abono
include_once '../../system/cuentas/Cuentas.php';
	$cuenta = new Cuentas(); 
	$cuenta->AddAbono($_POST);
break;



case "406": // Borrar Abono
include_once '../../system/cuentas/Cuentas.php';
	$cuenta = new Cuentas(); 
	$cuenta->DelAbono($_POST["hash"], $_POST["cuenta"]);
break;



case "408": // Borrar cuenta
include_once '../../system/cuentas/Cuentas.php';
	$cuenta = new Cuentas(); 
	$cuenta->DelCuenta($_POST["iden"]);
break;







} // termina switch














/////////
$db->close();
?>