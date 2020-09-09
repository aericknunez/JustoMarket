<?php 
class Perfil{

	public function __construct(){

	}


  public function AddPerfil($datos){
    $db = new dbConn();

        $a = $db->query("SELECT user FROM login_direcciones WHERE user = '". $_SESSION["user"] ."'");
	    $reg = $a->num_rows;    
    	$a->close();

    	if($reg > 0){
    		$this->UpDatos($datos);
    	} else {
    		 $this->AddDatos($datos);
    	}

  }


  public function CompruebaForm($datos){
        if($datos["recibe_direccion"] == NULL or
          $datos["recibe_departamento"] == NULL or
          $datos["recibe_municipio"] == NULL){
          return FALSE;
        } else {
         return TRUE;
        }
  }


  public function AddDatos($datos){
    $db = new dbConn();
      if($this->CompruebaForm($datos) == TRUE){ // comprueba si todos los datos requeridos estan llenos

                $data["user"] = $_SESSION["user"];
                $data["usr_direccion"] = $datos["usr_direccion"];
                $data["usr_pais"] = $datos["usr_pais"];
                $data["usr_departamento"] = $datos["usr_departamento"];
                $data["usr_municipio"] = $datos["usr_municipio"];
                $data["usr_telefono"] = $datos["usr_telefono"];
                $data["f_nacimiento"] = $datos["f_nacimiento_submit"];
                $data["recibe_pais"] = $datos["recibe_pais"];
                $data["recibe_departamento"] = $datos["recibe_departamento"];
                $data["recibe_municipio"] = $datos["recibe_municipio"];
                $data["recibe_direccion"] = $datos["recibe_direccion"];
                $data["recibe_nombre"] = $datos["recibe_nombre"];
                $data["recibe_telefono"] = $datos["recibe_telefono"];
                $data["puntoreferencia"] = $datos["puntoreferencia"];
                if ($db->insert("login_direcciones", $data)) {

                    Alerts::Alerta("success","Realizado!","Registro realizado correctamente!");  

/// CREO A LA DELIVERY
if ($r = $db->select("costo", "cobertura_municipio", "WHERE id = '".$datos["recibe_municipio"]."'")) {     
    $_SESSION["delivery"] = $r["costo"];
}   unset($r);

                }

        } else {
          Alerts::Alerta("error","Error!","Faltan Datos!");
        }

      sleep(1);
      /// si vengo del carrito o del check out, mandarlo a checkuot
        if($_SESSION["redirect_checkout"] == TRUE){
                echo '<script>
                        window.location.href="'.BASE_URL.'?checkout"
                      </script>';
        } else {
                echo '<script>
                        window.location.href="'.BASE_URL.'?perfil"
                      </script>';
        }

  }



  public function UpDatos($datos){ // lo que viede del formulario principal
    $db = new dbConn();
      if($this->CompruebaForm($datos) == TRUE){ // comprueba si todos los datos requeridos estan llenos

                $data["user"] = $_SESSION["user"];
                $data["usr_direccion"] = $datos["usr_direccion"];
                $data["usr_pais"] = $datos["usr_pais"];
                $data["usr_departamento"] = $datos["usr_departamento"];
                $data["usr_municipio"] = $datos["usr_municipio"];
                $data["usr_telefono"] = $datos["usr_telefono"];
                $data["f_nacimiento"] = $datos["f_nacimiento_submit"];
                $data["recibe_pais"] = $datos["recibe_pais"];
                $data["recibe_departamento"] = $datos["recibe_departamento"];
                $data["recibe_municipio"] = $datos["recibe_municipio"];
                $data["recibe_direccion"] = $datos["recibe_direccion"];
                $data["recibe_nombre"] = $datos["recibe_nombre"];
                $data["recibe_telefono"] = $datos["recibe_telefono"];
                $data["puntoreferencia"] = $datos["puntoreferencia"];
              if ($db->update("login_direcciones", $data, "WHERE user = '".$_SESSION["user"]."'")) {
                  Alerts::Alerta("success","Realizado!","Cambio realizado exitsamente!");
/// CREO A LA DELIVERY
if ($r = $db->select("costo", "cobertura_municipio", "WHERE id = '".$datos["recibe_municipio"]."'")) {     
$_SESSION["delivery"] = $r["costo"];
}   unset($r);

              } else {
              	Alerts::Alerta("error","Error!","Algo Ocurrió!");
              }          

      } else {
        Alerts::Alerta("error","Error!","Faltan Datos!");
      }

      sleep(1);
      
      /// si vengo del carrito o del check out, mandarlo a checkuot
        if($_SESSION["redirect_checkout"] == TRUE){
                echo '<script>
                        window.location.href="'.BASE_URL.'?checkout"
                      </script>';
        }  else {
                echo '<script>
                        window.location.href="'.BASE_URL.'?perfil"
                      </script>';
        }
  }




public function AddDatosUsuarioInvitado($data){
    $db = new dbConn();

                $usuario = $_SESSION["userInvitado"];
                $datos = array();
                $datos["nombre"] = $data["nombre"] . " " . $data["apellido"];
                $datos["nombres"] = $data["nombre"];
                $datos["apellidos"] = $data["apellido"];
                $datos["tipo"] = $data["tipo"];
                $datos["user"] = $usuario;
                $datos["email"] = $data["email"];
                $datos["tkn"] = 1;
                $datos["avatar"] = "1.png";
                $datos["td"] = TD_SERVER;
                if ($db->insert("login_userdata", $datos)) {
                return TRUE;
              }
}






  public function AddDatosInvitado($datos){
    $db = new dbConn();
     
      if($this->CompruebaForm($datos) == TRUE){ // comprueba si todos los datos requeridos estan llenos

                $data["user"] = $_SESSION["userInvitado"];
                $data["recibe_pais"] = "El Salvador";
                $data["usr_departamento"] = $datos["recibe_departamento"];
                $data["usr_municipio"] = $datos["recibe_municipio"];
                $data["usr_direccion"] = $datos["recibe_direccion"];
                $data["recibe_departamento"] = $datos["recibe_departamento"];
                $data["recibe_municipio"] = $datos["recibe_municipio"];
                $data["recibe_direccion"] = $datos["recibe_direccion"];
                $data["recibe_nombre"] = $datos["nombrerecibe"];
                $data["recibe_telefono"] = $datos["telefono"];
                $data["usr_telefono"] = $datos["celular"];
                $data["puntoreferencia"] = $datos["puntodereferencia"];
                if ($db->insert("login_direcciones", $data)) {

            Alerts::Alerta("success","Realizado!","Registro realizado correctamente!");  

            $user=$_SESSION["userInvitado"];

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

            if ($r = $db->select("email", "login_members", "WHERE username = '$user'")) {    
                $_SESSION['email'] = $r["email"];
            }   unset($r);  

         $_SESSION['invitado'] = " (Invitado)";
             
        $inicia = new Inicio();
        $jsondata = $inicia->ObtenerOrdenNo(URL_SERVER . "application/src/api.php?op=28&td=" . TD_SERVER . "&usr=" . $_SESSION["user"]);   

        $datos = json_decode($jsondata, true);
        if($datos["orden"] != NULL){
            $_SESSION["orden"] = $datos["orden"];
            $_SESSION["usuario"] = $_SESSION['user'];
        }

        /// CREO A LA DELIVERY
        if ($r = $db->select("costo", "cobertura_municipio", "WHERE id = '".$datos["recibe_municipio"]."'")) {     
            $_SESSION["delivery"] = $r["costo"];
        }   unset($r);

      } // si registr los primeros datos

  } else { // comprueba form
    Alerts::Alerta("error","Error!","Faltan Datos!");
  }

 
      /// si vengo del carrito o del check out, mandarlo a checkuot
            

       echo '<script>
            window.location.href="'.BASE_URL.'?checkout"
          </script>';


  }







  public function AddDatosCliente($datos){
    $db = new dbConn();
      if($this->CompruebaForm($datos) == TRUE){ // comprueba si todos los datos requeridos estan llenos

                $data["user"] = $_SESSION["userInvitado"];
                $data["recibe_pais"] = "El Salvador";
                $data["usr_departamento"] = $datos["recibe_departamento"];
                $data["usr_municipio"] = $datos["recibe_municipio"];
                $data["usr_direccion"] = $datos["recibe_direccion"];
                $data["recibe_departamento"] = $datos["recibe_departamento"];
                $data["recibe_municipio"] = $datos["recibe_municipio"];
                $data["recibe_direccion"] = $datos["recibe_direccion"];
                $data["recibe_nombre"] = $datos["nombrerecibe"];
                $data["recibe_telefono"] = $datos["telefono"];
                $data["usr_telefono"] = $datos["celular"];
                $data["puntoreferencia"] = $datos["puntodereferencia"];
                if ($db->insert("login_direcciones", $data)) {

                   return TRUE;

                }

        } else {
          Alerts::Alerta("error","Error!","Faltan Datos!");
        }


  }













  public function CambiarDatos($datos){ // lo que viede del formulario principal
    $db = new dbConn();

if($datos["cdepartamento"] != NULL and $datos["cmunicipio"] != NULL){
      $data["recibe_departamento"] = $datos["cdepartamento"];
      $data["recibe_municipio"] = $datos["cmunicipio"];

      if($datos["cdireccion"] != NULL){ $data["recibe_direccion"] = $datos["cdireccion"]; }
      if($datos["cnombre"] != NULL){ $data["recibe_nombre"] = $datos["cnombre"]; }
      if($datos["ctelefono"] != NULL){ $data["recibe_telefono"] = $datos["ctelefono"]; }
      if($datos["creferencia"] != NULL){ $data["puntoreferencia"] = $datos["creferencia"]; }

    if ($db->update("login_direcciones", $data, "WHERE user = '".$_SESSION["user"]."'")) {
        Alerts::Alerta("success","Realizado!","Cambio realizado exitsamente!");
/// CREO A LA DELIVERY
if ($r = $db->select("costo", "cobertura_municipio", "WHERE id = '".$datos["cmunicipio"]."'")) {     
$_SESSION["delivery"] = $r["costo"];
}   unset($r);

sleep(1);

/// si vengo del carrito o del check out, mandarlo a checkuot
echo '<script>
  window.location.href="'.BASE_URL.'?checkout"
</script>';

    } else {
      sleep(1);
      Alerts::Alerta("error","Error!","Algo Ocurrió!");
    }   


} else {
  sleep(1);
   Alerts::Alerta("error","Error!","Faltan Datos!");
}


  }










} // class
?>