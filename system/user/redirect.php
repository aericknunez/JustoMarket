<?php
include_once '../../application/common/Helpers.php'; // [Para todo]
include_once '../../application/includes/variables_db.php';
include_once '../../application/common/Mysqli.php';
$db = new dbConn();
include_once '../../application/includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();



include_once '../../application/common/Alerts.php';
include_once '../../application/common/Fechas.php';
include_once '../../application/common/Encrypt.php';



// if($_REQUEST["op"] != "1" or $_REQUEST["op"] != "11"){ // verifica inicio de session

// 		// filtros para cuando no hay session abierta
// 		if ($seslog->login_check() != TRUE) {
// 		echo '<script>
// 			window.location.href="application/includes/logout.php"
// 		</script>';
// 		} 

// 		if($_SESSION["user"] == NULL and $_SESSION["td"] == NULL){
// 		echo '<script>
// 			window.location.href="application/includes/logout.php"
// 		</script>';
// 		exit();
// 		}


// }

/// para invitado

if($_REQUEST["op"] == "11"){ // redirecciona despues de registrar a llenar datos

// compruebo formulario vacio
if(($_POST["nombre"] != NULL &&
   $_POST["apellido"] != NULL &&
   $_POST["email"] != NULL &&
   $_POST["recibe_direccion"] != NULL &&
   $_POST["telefono"] != NULL &&
   $_POST["celular"] != NULL &&
   $_POST["puntodereferencia"] != NULL &&
   $_POST["nombrerecibe"] != NULL) &&
  (is_numeric($_POST["recibe_departamentoi"]) ||
   is_numeric($_POST["recibe_municipioi"]))){

	include_once '../../application/phpMailer/Email.php';
	require '../../application/phpMailer/Exception.php';
	require '../../application/phpMailer/PHPMailer.php';
	require '../../application/phpMailer/SMTP.php'; 

    include_once '../../application/includes/DataLogin.php';

include_once '../config/Inicio.php';

$_POST["password"] = $_POST["fpassword"];
$_POST["confirmpwd"] = $_POST["fconfirmpwd"];
$_POST["recibe_departamento"] = $_POST["recibe_departamentoi"];
$_POST["recibe_municipio"] = $_POST["recibe_municipioi"];



if($_POST["password"] != NULL){

$_POST["tipo"] = 2;

	if($seslog->Register($_POST) == TRUE){

		include_once 'Inicio.php';
		$perfiles = new Perfil();
			if($_SESSION["userInvitado"] == NULL){
				$_SESSION["userInvitado"] = $seslog->NewUser();
			}

		if($perfiles->AddDatosCliente($_POST) == TRUE){

			    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			    $password = $seslog->ValidaPass($_POST['password']); // The hashed password.
			    
			    if ($seslog->LogOn($email, $password) == true) {
			    	 Alerts::Alerta("success","Realizado!","Registro realizado correctamente!");
			        // Login success 
			         echo '<script>
			            window.location.href="'. BASE_URL .'application/includes/iniciar.php"
			        </script>';
			        exit();
			    }

		}

	}


} else {

		include_once 'Inicio.php';
		$perfiles = new Perfil();
		$_SESSION["userInvitado"] = $seslog->NewUser();

	if($perfiles->AddDatosUsuarioInvitado($_POST) == TRUE){
		$perfiles->AddDatosInvitado($_POST);
	}
}

/// aqui terminaria la comprobacion de vacios
	} else {
		Alerts::Alerta("error","Error!", "Debellenar todos los datos");
	}
	
} // termina el op






if($_REQUEST["op"]=="1"){ // redirecciona despues de registrar a llenar datos
include_once '../../application/phpMailer/Email.php';
require '../../application/phpMailer/Exception.php';
require '../../application/phpMailer/PHPMailer.php';
require '../../application/phpMailer/SMTP.php';
$_POST["recibe_departamento"] = $_POST["recibe_departamentor"];
$_POST["recibe_municipio"] = $_POST["recibe_municipior"];


	include_once '../../application/includes/DataLogin.php';
	if($seslog->Register($_POST) == TRUE){

		include_once 'Inicio.php';
		$perfiles = new Perfil();
			if($_SESSION["userInvitado"] == NULL){
				$_SESSION["userInvitado"] = $seslog->NewUser();
			}

		if($perfiles->AddDatosCliente($_POST) == TRUE){

			    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			    $password = $seslog->ValidaPass($_POST['password']); // The hashed password.
			    
			    if ($seslog->LogOn($email, $password) == true) {
			    	 Alerts::Alerta("success","Realizado!","Registro realizado correctamente!");
			        // Login success 
			         echo '<script>
			            window.location.href="'. BASE_URL .'application/includes/iniciar.php"
			        </script>';
			        exit();
			    }

		}

	}


}




if($_REQUEST["op"]=="2"){ // terminar actualizar
	if($_POST["nombre"] != NULL && $_POST["tipo"] != NULL){
	include_once 'Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->ActualizarUsuario(Helpers::Mayusculas($_POST["nombre"]),$_POST["tipo"],$_POST["user"]);	
	} else {
	Alerts::Alerta("error","Error!","Faltan Datos!");	
	}
}




if($_REQUEST["op"]=="3"){ // cambiar avatar
include_once 'Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->CambiarAvatar($_REQUEST["iden"],$_REQUEST["user"]);
}


if($_REQUEST["op"]=="4"){ // redirecciona despues de registrar a llenar datos
echo '<script>
    window.location.href="../../?modal=register_success&user=' . $_REQUEST["user"] . '";
</script>';
}

/// usuarios
if($_REQUEST["op"]=="5"){
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->CompararPass($passw1, $passw2); 
}


if($_REQUEST["op"]=="6"){ /// para el modal del avatar
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$usuarios->AvatarSelect($_REQUEST["username"]);
}


if($_REQUEST["op"]=="7"){
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$usuarios->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}





if($_REQUEST["op"]=="8"){
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$usuarios->VerUsuarios($_SESSION["ver_avatar"]);
}


if($_REQUEST["op"]=="9"){
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$usuarios->ModalPass($_REQUEST["username"]);
}



if($_REQUEST["op"]=="10"){
include_once 'Usuarios.php';
$usuarios = new Usuarios;
$usuarios->ModalUpdate($_REQUEST["username"]);
}



if($_REQUEST["op"]=="15"){ /// cambio de pass
include_once 'Usuarios.php'; 
$usuarios = new Usuarios;

    if ($r = $db->select("user", "login_userdata", "WHERE email = '".$_POST["email"]."'")) { 
        $_SESSION["username"] = $r["user"];
    } unset($r);  



$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->Cambio($passw1, $passw2); 
}



if($_REQUEST["op"]=="18"){
include_once 'Inicio.php';
$change = new Perfil();
$change->CambiarDatos($_POST);
}



?>