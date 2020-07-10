<?php 
class Inicio{

	public function __construct(){

	}




	public function CrearVariables(){
		$db = new dbConn();


	}


	public function RegisterInOut($edo){
		$db = new dbConn();
		    $datos = array();
		    $datos["user"] = $_SESSION['user'];
		    $datos["nombre"] = $_SESSION['nombre'];
		    $datos["accion"] = $edo;
		    $datos["ip"] = Helpers::GetIp();
		    $datos["navegador"] = $_SERVER["HTTP_USER_AGENT"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
		    $datos["hora"] = date("H:i:s");
		    $datos["td"] = $_SESSION["td"];
		    $db->insert("login_inout", $datos); 		
	}












} // clase
?>