<?php 
class GetCategorias{

	public function __construct(){

	}



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


/// obtiene las categorias
public function GetCategorias($url){
	$jsondata = $this->ObtenerData($url);
	$datos = json_decode($jsondata, true); 
    return $datos;
}



















} // clase


?>