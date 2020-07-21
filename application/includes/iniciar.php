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
            $_SESSION['td'] = $r["td"];
            $_SESSION['nombres'] = $r["nombres"];
            $_SESSION['apellidos'] = $r["apellidos"];
            $_SESSION['secret_key'] = md5($r["td"]);
            } unset($r);

            if ($r = $db->select("email", "login_members", "WHERE user = '".$_SESSION["user"]."'")) {    
                $_SESSION['email'] = $r["email"];
            }   unset($r);  


        $inicia = new Inicio();
        $inicia->CrearVariables(); // reemplaza las variables de usuario
        $inicia->RegisterInOut(1); // registra la entrada

        header("location: " . $_SESSION["last_url"]);

    }



UserInicio($user);

} else {
   header("location: logout.php");
    exit(); 
}
?>