<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();
include_once '../includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();

include_once '../common/Encrypt.php';
include_once '../common/Alerts.php';
include_once '../common/Fechas.php';
include_once '../../system/config/Inicio.php';


if($_SESSION['username'] == NULL){
header("location: logout.php");
exit();
}

if ($seslog->login_check() == TRUE) {

$user=$_SESSION['username'];
$_SESSION["ver_avatar"] = NULL;

	function UserInicio($user){
        $db = new dbConn();
            if ($r = $db->select("*", "login_userdata", "WHERE user = '$user' limit 1")) { 
            $_SESSION['nombre'] = $r["nombre"];
            $_SESSION['tipo_cuenta'] = $r["tipo"];
            $_SESSION['tkn'] = $r["tkn"];
            $_SESSION['avatar'] = $r["avatar"];
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $r["email"];
            $_SESSION['td'] = $r["td"];
            $_SESSION['nombres'] = $r["nombres"];
            $_SESSION['apellidos'] = $r["apellidos"];
            $_SESSION['secret_key'] = md5($r["td"]);
            } unset($r);


        $inicia = new Inicio();
        $inicia->CrearVariables(); // reemplaza las variables de usuario
        $inicia->RegisterInOut(1); // registra la entrada


        /// obtengo la ultima orden si cloncluir del servidor
        $jsondata = $inicia->ObtenerOrdenNo(URL_SERVER . "application/src/api.php?op=28&td=" . TD_SERVER . "&usr=" . $_SESSION["user"]);   

        $datos = json_decode($jsondata, true);
        if($datos["orden"] != NULL){
            $_SESSION["orden"] = $datos["orden"];
            $_SESSION["usuario"] = $_SESSION['user'];
        }
        

        /// si no tengo llenos los datos, manadar a llenarlos
            if ($r = $db->select("*", "login_direcciones", "WHERE user = '".$_SESSION["user"]."'")) { 
            $usr_direccion = $r["usr_direccion"];
            $usr_municipio = $r["usr_municipio"];
            $recibe_municipio = $r["recibe_municipio"];
            }   unset($r);  


/// CREO A LA DELIVERY
    if ($r = $db->select("costo", "cobertura_municipio", "WHERE id = '".$recibe_municipio."'")) {     
        $_SESSION["delivery"] = $r["costo"];
    }   unset($r);



         if($usr_direccion == NULL || $usr_municipio == NULL){
            header("location: ".BASE_URL."?perfil&op=2&msj=1");
         }   

        /// si vengo del carrito o del check out, mandarlo a checkuot
        else if($_SESSION["redirect_checkout"] == TRUE){
            header("location: ".BASE_URL."?checkout");
        }

        /// sino mandarlo a la url anterior  
        else {
            header("location: " . $_SESSION["last_url"]);
        }


    }



UserInicio($user);



} else {
   header("location: logout.php");
    exit(); 
}
?>