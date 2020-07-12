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



case "11": // destacados
include_once '../../system/index/Inicio.php';
	$ind = new Index(); 
	$ind->ProductosDestacados(URL_SERVER . "application/src/api.php?op=11&cantidad=12&td=" . TD_SERVER);
break;



// case "12": // categorias
// include_once '../../system/cuentas/Cuentas.php';
// 	$cuenta = new Cuentas(); 
// 	$cuenta->DelAbono($_POST["hash"], $_POST["cuenta"]);
// break;



case "13": // promociones (Quitarle la cantidad para que muestre todas las promociones)
include_once '../../system/categorias/Inicio.php';
	$cat = new Categorias(); 
	$cat->ProductosCategoria(URL_SERVER . "application/src/api.php?op=13&cantidad=12&td=" . TD_SERVER);
break;



case "14": // producto detalles
include_once '../../system/index/InicioModal.php';
	$ind = new IndexModal(); 
	$ind->ModalProductos(URL_SERVER . "application/src/api.php?op=14&cod=".$_POST["cod"]."&td=" . TD_SERVER);
break;



case "15": // modal recomendados
include_once '../../system/index/InicioModal.php';
	$ind = new IndexModal(); 
	$ind->ProductosRecomendados(URL_SERVER . "application/src/api.php?op=11&cantidad=12&td=" . TD_SERVER);
break;






} // termina switch














/////////
$db->close();
?>