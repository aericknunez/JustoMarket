<?php 
class Api{

	public function __construct(){

	}


public function DatosUsuario($usuario){
    $db = new dbConn();

$data = array();

        $a = $db->query("SELECT email, nombre, nombres, apellidos FROM login_userdata WHERE user = '$usuario'");
        foreach ($a as $b) {
            $data["user"] = $b;  
        } $a->close();

        $a = $db->query("SELECT * FROM login_direcciones WHERE user = '$usuario'");
        foreach ($a as $b) {
            $data["direccion"] = $b;
        } $a->close();

  
    if ($r = $db->select("municipio, costo, tiempo", "cobertura_municipio", "WHERE id = '".$data["direccion"]["recibe_municipio"]."'")) {     
        $data["direccion"]["recibe_municipio"] = $r["municipio"];
        $data["costo"] = $r["costo"];
        $data["tiempo"] = $r["tiempo"];
    }   unset($r);

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$data["direccion"]["recibe_departamento"]."'")) {     
        $data["direccion"]["recibe_departamento"] = $r["departamento"];
    }   unset($r);



  
    if ($r = $db->select("municipio", "cobertura_municipio", "WHERE id = '".$data["direccion"]["usr_municipio"]."'")) {     
        $data["direccion"]["usr_municipio"] = $r["municipio"];
    }   unset($r);

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$data["direccion"]["usr_departamento"]."'")) {     
        $data["direccion"]["usr_departamento"] = $r["departamento"];
    }   unset($r);





 $data["mensaje"] = "Datos adquiridos"; 


    $data = json_encode($data);
    return $data;
}















public function ListarUsuarios(){
    $db = new dbConn();
    $encrypt = new Encrypt();

$data = array();


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
         $data[$i]["punto_referencia"]= $r["puntoreferencia"];
         $data[$i]["m_longitud"]= $r["m_longitud"];
         $data[$i]["m_latitud"]= $r["m_latitud"];

    if ($r = $db->select("municipio", "cobertura_municipio", "WHERE id = '".$data[$i]["recibe_municipio"]."'")) {     
        $data[$i]["recibe_municipio"] = $r["municipio"];
    }   unset($r);

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$data[$i]["recibe_departamento"]."'")) {     
        $data[$i]["recibe_departamento"] = $r["departamento"];
    }   unset($r);


    if ($r = $db->select("municipio", "cobertura_municipio", "WHERE id = '".$data[$i]["usr_municipio"]."'")) {     
        $data[$i]["usr_municipio"] = $r["municipio"];
    }   unset($r);

    if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$data[$i]["usr_departamento"]."'")) {     
        $data[$i]["usr_departamento"] = $r["departamento"];
    }   unset($r);



    } unset($r);






$i++;
    } $a->close();


    $data = json_encode($data);
    return $data;
}









} // clase
?>