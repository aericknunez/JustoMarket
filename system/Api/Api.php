<?php 
class Api{

	public function __construct(){

	}



public function DatosUsuario($usuario, $secret){
    $db = new dbConn();
    $encrypt = new Encrypt();

$data = array();

        $a = $db->query("SELECT nombre, nombres, apellidos FROM login_userdata WHERE user = '$usuario'");
        foreach ($a as $b) {
            $data["user"] = $b;  
        } $a->close();


        $a = $db->query("SELECT email FROM login_members WHERE username = '$usuario'");
        foreach ($a as $b) {
            $data["email"] = $b;  
        } $a->close();


        $a = $db->query("SELECT * FROM login_direcciones WHERE user = '$usuario'");
        foreach ($a as $b) {
            $data["direccion"] = $b;
        } $a->close();

 $data["mensaje"] = "Datos adquiridos"; 


    $data = json_encode($data);
    return $data;
}















public function ListarUsuarios($secret){
    $db = new dbConn();
    $encrypt = new Encrypt();

$data = array();

if($encrypt->Decrypt($secret, md5(TD_SERVER))){

 $i = 0; 
    $a = $db->query("SELECT nombre, nombres, apellidos, user FROM login_userdata");
    foreach ($a as $b) {

        $data[$i] = $b;
 

    if ($r = $db->select("email", "login_members", "WHERE username = '".$b["user"]."'")) { 
         $data[$i]["email"]= $r["email"];
    } unset($r);


    if ($r = $db->select("*", "login_direcciones", "WHERE user = '".$b["user"]."'")) { 
         $data[$i]["usr_direccion"]= $r["usr_direccion"];
         $data[$i]["usr_pais"]= $r["usr_pais"];
         $data[$i]["usr_departamento"]= $r["usr_departamento"];
         $data[$i]["usr_municipio"]= $r["usr_municipio"];
         $data[$i]["usr_telefono"]= $r["usr_telefono"];
         $data[$i]["f_nacimiento"]= $r["f_nacimiento"];
         $data[$i]["recibe_pais"]= $r["recibe_pais"];
         $data[$i]["recibe_departamento"]= $r["recibe_departamento"];
         $data[$i]["recibe_municipio"]= $r["recibe_municipio"];
         $data[$i]["recibe_direccion"]= $r["recibe_direccion"];
         $data[$i]["recibe_nombre"]= $r["recibe_nombre"];
         $data[$i]["recibe_telefono"]= $r["recibe_telefono"];
         $data[$i]["punto_referencia"]= $r["punto_referencia"];
         $data[$i]["m_longitud"]= $r["m_longitud"];
         $data[$i]["m_latitud"]= $r["m_latitud"];
    } unset($r);


$i++;
    } $a->close();

} else {
 $data["mensaje"] = "No tienes permiso para estar aqui";
}
    $data = json_encode($data);
    return $data;
}









} // clase
?>