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




/// aqui va la parte de manejo de los productos del carrito
public function ObtenerData($url){
	$db = new dbConn();

    $response = array();

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}


	public function AddItem($url, $cod){
		$db = new dbConn();

		$ch = curl_init($url);
		 
		curl_setopt ($ch, CURLOPT_POST, 1);
		 
		//le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
		curl_setopt ($ch, CURLOPT_POSTFIELDS, "parametro1=valor1&parametro2=valor2");
		 
		//le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		 
		//recogemos la respuesta
		$respuesta = curl_exec($ch);
		$error = curl_error($ch);
		curl_close ($ch);

		return $respuesta;

	}







} // clase
?>