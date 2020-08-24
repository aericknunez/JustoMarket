<?php 
class Api{

	public function __construct(){

	}



public function DatosUsuario($usuario, $secret){
    $db = new dbConn();
    $encrypt = new Encrypt();

$data = array();

if($encrypt->Decrypt($secret, md5(TD_SERVER))){

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

} else {
 $data["mensaje"] = "No tienes permiso para estar aqui";
}

    $data = json_encode($data);
    return $data;



}









} // clase
?>