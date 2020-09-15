<?php 
class CheckOut{

	public function __construct(){

	}

/// para contar los productos que hay en la orden
  public function CantidadProductos($url){
  $jsondata = $this->ObtenerData($url);
  $datos = json_decode($jsondata, true); 
   return count($datos["productos"]);
}


//// para pedidos de usuarioa

  public function OrdenesCliente($url){
  $jsondata = $this->ObtenerData($url);
  $datos = json_decode($jsondata, true); 
   return $datos;
}


  public function TotalProductosUsuario($url){
  $jsondata = $this->ObtenerData($url);
  $datos = json_decode($jsondata, true); 
   return $datos["total"];
}


  public function TotalPedidosUsuario($url){
  $jsondata = $this->ObtenerData($url);
  $datos = json_decode($jsondata, true); 
   return $datos["total"];
}
/// termina pedidos de usuario


/// aqui va la parte de manejo de los productos del carrito
public function ObtenerData($url){

    $response = array();

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}





	public function ContenidoCarrito($url){
     $db = new dbConn();

if ($r = $db->select("recibe_municipio", "login_direcciones", "WHERE user = '".$_SESSION["user"]."'")) { 
$recibe_municipio = $r["recibe_municipio"];
}   unset($r);  

if ($r = $db->select("cant_minima", "cobertura_municipio", "WHERE id = '".$recibe_municipio."'")) {     
$cant_minima = $r["cant_minima"];
}   unset($r);  


	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 


if(count($datos["productos"])){

		echo '<div class="container">';

	$total = 0;
	 for ($i = 0; $i < count($datos["productos"]); $i++){

$rand = rand(1,99);

echo '<div class="row border-top border-light pt-4">
<div class="col-md-3"><img src="'. Helpers::Img(URL_SERVER .'assets/img/productos/'. TD_SERVER .'/tmb/tmb_'.$datos["productos"][$i]["imagen"]) .'" alt="" class="img-fluid z-depth-0"></div>
    
    <div class="col-md-9">
     <h3 class="h3-responsive"><strong>'.$datos["productos"][$i]["producto"].'</strong></h3>';
     if($datos["productos"][$i]["promocion"] =="on"){
      echo '<p class="text-muted green-text">Producto en Promoción!</p>';
    }

 echo '<div class="row pt-4 text-center">
        <div class="col-md-4">
                  <small>Cantidad</small><br>

                  <span class="qty mr-3 h5"><input 
                  id="'.$rand.'cantidad'.$datos["productos"][$i]["cod"].'"
                  class="w-5 text-center" 
                  style="border: 0;
                          width: 45px;
                          outline: none;" 
                  value="'.$datos["productos"][$i]["cant"].'"></input></span>

                  <div class="btn-group radio-group ml-2" data-toggle="buttons">
                    <label class="btn btn-sm bg-vino white-text btn-rounded" 
                    id="accion-pcard" iden="'.$datos["productos"][$i]["cod"].'" accion="1" lugar="'.$rand.'" pv="'.$datos["productos"][$i]["pv"].'">
                    &mdash;
                    </label>
                    <label class="btn btn-sm bg-vino white-text btn-rounded"
                    id="accion-pcard" iden="'.$datos["productos"][$i]["cod"].'" accion="2" lugar="'.$rand.'" pv="'.$datos["productos"][$i]["pv"].'">
                    +
                    </label>
                  </div>

        </div>
        
        <div class="col-5 col-md-4"><small>Precio</small><br>'.Helpers::Dinero($datos["productos"][$i]["pv"]).'</div>
        
        <div class="col-5 col-md-3"><small>Total</small><br><strong><div id="'.$rand.'monto'.$datos["productos"][$i]["cod"].'">'.Helpers::Dinero($datos["productos"][$i]["total"]).'</div></strong></div>
        
        <div class="col-2 col-md-1"><small>Eliminar</small><br>
        <a class="btn-sm btn-secondary bg-vino text-white" id="delete-i" iden="'.$datos["productos"][$i]["id"].'"><i class="fas fa-trash"></i></a>

        </div>

      </div>
    </div>


  </div>';

		$total = $total + $datos["productos"][$i]["total"];
	}
    // $tot = $total + $_SESSION["delivery"];

echo '<div class="row">
        <div class="col-6 col-md-2 text-right">
                  <h4 class="mt-2">
                    <strong>Total: </strong>
                  </h4></div>
        <div class="col-6 col-md-2">
                  <h4 class="mt-2">
                    <strong><div id="carttotal">'. Helpers::Dinero($total) .'</div></strong>
                  </h4></div>
        <div class="col-12 col-md-8 text-center">';

          if($_SESSION["user"]){

            if($cant_minima < $total){
            echo '<a href="?checkout" class="btn bg-vino white-text btn-rounded">Completar la compra
                  <i class="fas fa-angle-right right"></i></a>';
            } 

          } else {
            echo '<a id="mlogin" class="btn bg-vino white-text btn-rounded mb-4">Iniciar sesión para Continuar
<i class="fas fa-angle-right right"></i></a>
<a id="minvitado" class="btn bg-naranja white-text btn-rounded ml-4 mb-4">Comprar como invitado
<i class="fas fa-angle-right right"></i></a>';
          }

      echo '</div>';



    if($cant_minima > $total){
      echo '<div class="bg-naranja pt-3 pb-3 white-text text-center mt-4 bordeado3 ml-2 mr-2 pr-2 pl-2">¡Hola! En tu municipio el pedido mínimo para poder despacharte es de ' . Helpers::Dinero($cant_minima) . ' te invitamos a que puedas aumentar el monto';

    echo '<div class="text-center"><a id="continuarcomprando" class="btn bg-vino white-text btn-rounded">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
    }





} else {
echo '<div class="bg-vino pt-3 pb-3 white-text text-center mb-5">No existen productos agregados en su carrito de compras. Puede seguir explorando nuestro catálogo y elegir los productos que mas desee </div>';

  echo '<div class="col-12 text-center">
      <img src="'. BASE_URL .'assets/img/carritovacio.png"
                class="img-fluid">
    </div>';

 echo '<div class="text-center"><a id="continuarcomprando" class="btn btn-primary bg-naranja btn-md ">continuar comprando <i class="fas fa-cart-arrow-down"></i></a></div>';
}



echo '</div>';

	}















  public function Pedido($url){
  $jsondata = $this->ObtenerData($url);

  $datos = json_decode($jsondata, true); 

if(count($datos["productos"])){

echo '<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">SU PEDIDO</span>
            <span class="badge bg-vino badge-pill">'.count($datos["productos"]).'</span>
          </h4>
          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">';

   $total = 0;
   for ($i = 0; $i < count($datos["productos"]); $i++){

      echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">'.$datos["productos"][$i]["producto"].'</h6>
                <small class="text-muted">'.$datos["productos"][$i]["cant"].' x '.Helpers::Dinero($datos["productos"][$i]["pv"]).'</small>
              </div>
              <span class="text-muted">'.Helpers::Dinero($datos["productos"][$i]["total"]).'</span>
            </li>';

      $total = $total + $datos["productos"][$i]["total"];      
   }

     echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="font-weight-bold">SUBTOTAL</h6>
              </div>
              <span class="font-weight-bold">'.Helpers::Dinero($total).'</span>
            </li>';

if($_SESSION["delivery"] != NULL and $_SESSION["entienda"] != "on"){
     echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">COSTO DE ENVÍO</h6>
              </div>
              <span class="text-muted">'.Helpers::Dinero($_SESSION["delivery"]).'</span>
            </li>';
}

if($_SESSION["entienda"] != "on"){
  $del = $_SESSION["delivery"];
} else {
  $del = 0;
}

     echo '<li class="list-group-item d-flex justify-content-between font-weight-bold">
              <span>Total (USD)</span>
              <strong>'. Helpers::Dinero($total + $del) .'</strong>
            </li>
          </ul>
          <!-- Cart -->';



  }

// print_r($datos["productos"]);

}





public function MandarPedido($url){

    $ch = curl_init($url);
     
    curl_setopt ($ch, CURLOPT_POST, 1);
    //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
    //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //recogemos la respuesta
    $respuesta = curl_exec($ch);
    $error = curl_error($ch);
    curl_close ($ch);

    $res = json_decode($respuesta, true);

  if($res["mensaje"] == "Realizado"){

    unset($_SESSION["orden"]);
    // Alerts::Alerta("success","Realizado!","Pedido realizado corectamente");
    Email::EnviarEmail($_SESSION["email"], $_SESSION["nombre"], 2);
    echo "realizado";
  } else {
    Alerts::Alerta("error","Error!","No se realizo su pedido, vuelva a intentarlo");
  }

 
}


















} // clase
?>
