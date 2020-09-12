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


case "10": // destacados del index pequenos
include_once '../../system/index/ProductosDestacadosP.php';
	$ind = new Index(); //&order=DESC
	$cantidad = $_POST["cantidad"];
	$ind->ProductosDestacados(URL_SERVER . "application/src/api.php?op=11&order=ASC&cantidad=".$cantidad."&td=" . TD_SERVER);
break;



case "11": // destacados del index // grandes en multiplos de 4
include_once '../../system/index/ProductosDestacados.php';
	$ind = new Index(); 
	$ind->ProductosDestacados(URL_SERVER . "application/src/api.php?op=11&cantidad=12&td=" . TD_SERVER);
break;



// case "12": // categorias
// include_once '../../system/cuentas/Cuentas.php';
// 	$cuenta = new Cuentas(); 
// 	$cuenta->DelAbono($_POST["hash"], $_POST["cuenta"]);
// break;


 
case "12": // promociones (Quitarle la cantidad para que muestre todas las promociones)
include_once '../../system/categorias/Inicio.php';
	$cat = new Categorias(); //&order=DESC
	$cantidad = $_POST["cantidad"];
	$cat->ProductosCategoria(URL_SERVER . "application/src/api.php?op=12&order=DESC&cantidad=".$cantidad."&td=" . TD_SERVER . "&categoria=" . $_SESSION["categoria"]);

break;



case "13": // promociones (Quitarle la cantidad para que muestre todas las promociones)
include_once '../../system/categorias/Inicio.php';
	$cat = new Categorias(); //&order=DESC
	$cat->ProductosPromociones(URL_SERVER . "application/src/api.php?op=13&order=DESC&cantidad=&td=" . TD_SERVER . "&categoria=" . $_SESSION["categoria"]);

break;




case "14": // producto detalles
include_once '../../system/index/InicioModal.php';
	$ind = new IndexModal(); 
	$cantidad = $_POST["cantidad"];
	$ind->ModalProductos(URL_SERVER . "application/src/api.php?op=14&cod=".$_POST["cod"]."&td=" . TD_SERVER);
break;



case "15": // modal recomendados
include_once '../../system/index/ModalRecomendados.php';
	$ind = new ModalRec(); 
	$ind->ProductosRecomendados(URL_SERVER . "application/src/api.php?op=11&cantidad=12&td=" . TD_SERVER);
break;




case "16": // modal recomendados Pequeno
include_once '../../system/index/ModalRecomendadosP.php';
	$ind = new ModalRec(); 
	$cantidad = $_POST["cantidad"];
	$ind->ProductosRecomendados(URL_SERVER . "application/src/api.php?op=11&order=ASC&cantidad=".$cantidad."&td=" . TD_SERVER);
break;



case "20": //agraga productos al carrito
include_once '../../system/config/Inicio.php';
	$card = new Inicio();

$data = array();
$data["cod"] = $_POST["cod"]; 
$data["cantidad"] = $_POST["cantidad"];
$data["usuario"] = $_SESSION["usuario"];
$data["orden"] = $_SESSION["orden"];

	$additem = $card->AddItem(URL_SERVER . "application/src/api.php?op=20&td=" . TD_SERVER, $data);
	$datos = json_decode($additem, true);

	$_SESSION["usuario"] = $datos["usuario"];
	$_SESSION["orden"] = $datos["orden"];
break;



case "21": //datalles del producto agregado (Modal)
include_once '../../system/config/Inicio.php';
	$ind = new Inicio();
	$ind->DataReturnModal(URL_SERVER . "application/src/api.php?op=14&cod=".$_POST["cod"]."&td=" . TD_SERVER, $_POST["cantidad"]);
break; 



case "22": //obtener el total del carrito
include_once '../../system/config/Inicio.php';
	$card = new Inicio();

	$data["usuario"] = $_SESSION["usuario"];
	$data["orden"] = $_SESSION["orden"];

	$ototal = $card->ObtenerTotal(URL_SERVER . "application/src/api.php?op=22&td=" . TD_SERVER, $data);
	$datos = json_decode($ototal, true);

if($datos["total"] != NULL){
	$total = $datos["total"];
	// $total = $total + $_SESSION["delivery"];
} else {
	$total = "0.00";
}

echo Helpers::Dinero($total);
break;



case "23": //contenido del carrito
include_once '../../system/config/Inicio.php';
	$card = new Inicio();
	$card->ContenidoCarrito(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);
break;



case "24": //borrar item del carrito
include_once '../../system/config/Inicio.php';
	$card = new Inicio();
	$card->BorrarItem(URL_SERVER . "application/src/api.php?op=24&td=" . TD_SERVER . "&iden=" . $_POST["iden"]);
break;



case "25": //contenido de cart
include_once '../../system/checkout/Inicio.php';
	$card = new CheckOut();
	$card->ContenidoCarrito(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);
break;



case "26": // mandar pedido (terminar)
include_once '../../system/checkout/Inicio.php';
include_once '../../system/config/Inicio.php';

include_once '../phpMailer/Email.php';
include_once '../phpMailer/Exception.php';
include_once '../phpMailer/PHPMailer.php';
include_once '../phpMailer/SMTP.php';

	$adddely = new Inicio();

$data = array();
$data["cod"] = 9999999; 

if($_SESSION["entienda"] == "on"){
	$data["precio"] = 0;
} else { // si esta activo en tienda
	$data["precio"] = $_SESSION["delivery"];
}
	
$data["cantidad"] = 1;
$data["usuario"] = $_SESSION["usuario"];
$data["orden"] = $_SESSION["orden"];


	$additem = $adddely->AddDelivery(URL_SERVER . "application/src/api.php?op=21&td=" . TD_SERVER, $data);
	$datos = json_decode($additem, true);



	$card = new CheckOut();
	$card->MandarPedido(URL_SERVER . "application/src/api.php?op=26&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);
	
unset($_SESSION["entienda"]);

if(isset($_SESSION["invitado"])){
  session_destroy();
}
break;




case "27": //footer del modal
include_once '../../system/config/Inicio.php';
	$card = new Inicio();
	$card->FooterModal(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);
break;




case "28": //obtener el ultimo pedido (no es llamado de ningun lugar de momento)
include_once '../../system/config/Inicio.php';
	$card = new Inicio();
	$card->ObtenerOrdenNo(URL_SERVER . "application/src/api.php?op=28&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"]);
break;



case "29": //contenido de cart
include_once '../../system/checkout/Inicio.php';
	$card = new CheckOut();
	$cant = $card->CantidadProductos(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);
	if($cant != 0){
		echo $cant;
	}
break;



case "30": //cambiar el estado de ver en tienda
if($_POST["edo"] == 0){
	unset($_SESSION["entienda"]);
} else {
	$_SESSION["entienda"] = "on";
	// echo '<div class="text-center text-uppercase"><a href="https://www.google.com/maps/d/edit?mid=1MgdX1iArlCXkCc6VfQ31rZVjURMjKvNb&usp=sharing" target="_blank">Ver el mapa de nuestra ubicación</a></div>';
	echo '<img src="assets/img/mapa2.png" class="img-fluid" alt="Mapa de nuestra ubicación">';
}
break;



case "32": // recuperar Pass
include_once '../phpMailer/Email.php';
include_once '../phpMailer/Exception.php';
include_once '../phpMailer/PHPMailer.php';
include_once '../phpMailer/SMTP.php';

if($_POST["email"] != NULL){
    $a = $db->query("SELECT email FROM login_userdata WHERE email = '".$_POST["email"]."'");
    
if($a->num_rows > 0){
		if(Email::EnviarEmail($_POST["email"], "Estimado Cliente", 5, 5) == TRUE){
			Alerts::Mensajex("Se ha enviado un enlace de recuperación a su email. Por favor revise su email", "success");
		} else {
			Alerts::Mensajex("Ocurrio un error al intentar enviar el email, por fevor intente mas tarde", "danger");
		}

} else {
Alerts::Mensajex("El Email ingresado no existe en nuestros registros, verifique su email", "danger");
}
  $a->close();
} {
	Alerts::Mensajex("Ingrese un email", "danger");
}
break;





case "100": //agregar contenido a perfil
include_once '../../system/user/Inicio.php';
	$perfil = new Perfil();
	$perfil->AddPerfil($_POST);
break;



case "101": //cambia el municipio
	$a = $db->query("SELECT id, municipio FROM cobertura_municipio WHERE departamento = '".$_POST["id"]."'");
      echo '<option selected disabled>* Seleccione</option>';
      foreach ($a as $b) {  

       echo '<option value="'. $b["id"] .'">'. $b["municipio"] .'</option>'; 
          
      } $a->close(); 
break;




case "105": //mayoria de edad

$_SESSION["mayordeedad"] = TRUE;
Alerts::Alerta("info","Accedido!","Ya puedes ver nuestros productos");
setcookie("mayordeedad", TRUE, time() + 60*60*24*365); 
break;




} // termina switch














/////////
$db->close();
?>