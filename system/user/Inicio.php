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
















} // class
?>