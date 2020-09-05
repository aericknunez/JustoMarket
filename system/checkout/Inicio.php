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

		echo '<div class="container">

      <section class="section my-5 pb-5">

        <!-- Shopping Cart table -->
        <div class="table-responsive">

          <table class="table product-table">

            <!-- Table head -->
            <thead>
              <tr>
                <th></th>

                <th class="font-weight-bold">
                  <strong>Producto</strong>
                </th>

                <th class="font-weight-bold">
                  <strong>Precio</strong>
                </th>

                <th class="font-weight-bold">
                  <strong>Cantidad</strong>
                </th>

                <th class="font-weight-bold">
                  <strong>Monto</strong>
                </th>

                <th></th>

              </tr>
            </thead>
            <!-- /.Table head -->

            <!-- Table body -->
            <tbody>';

	$total = 0;
	 for ($i = 0; $i < count($datos["productos"]); $i++){

$rand = rand(1,99);

echo '<tr>
                <th scope="row">
                  <img src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["productos"][$i]["imagen"] .'" alt="" class="img-fluid z-depth-0">
                </th>
                
                <td>
                  <h5 class="mt-3">
                    <strong>'.$datos["productos"][$i]["producto"].'</strong>
                  </h5>';
                  
                  if($datos["productos"][$i]["promocion"] =="on"){
                    echo '<p class="text-muted green-text">Producto en Promoción!</p>';
                  }
                  
                echo '</td>

                <td>'.Helpers::Dinero($datos["productos"][$i]["pv"]).'</td>
                
                <td class="text-center text-md-left">
                  <span class="qty"><input 
                  id="'.$rand.'cantidad'.$datos["productos"][$i]["cod"].'"
                  class="w-1 text-center" 
                  style="border: 0;
                          width: 20px;
                          outline: none;" 
                  value="'.$datos["productos"][$i]["cant"].'"></input></span>

                  <div class="btn-group radio-group ml-2" data-toggle="buttons">
                    <label class="btn btn-sm bg-vino white-text btn-rounded">
                    <a id="accion-pcard" iden="'.$datos["productos"][$i]["cod"].'" accion="1" lugar="'.$rand.'" pv="'.$datos["productos"][$i]["pv"].'">&mdash;</a>
                    </label>
                    <label class="btn btn-sm bg-vino white-text btn-rounded">
                    <a id="accion-pcard" iden="'.$datos["productos"][$i]["cod"].'" accion="2" lugar="'.$rand.'" pv="'.$datos["productos"][$i]["pv"].'">+</a>
                    </label>
                  </div>
                </td>

                <td class="font-weight-bold">
                  <strong><div id="'.$rand.'monto'.$datos["productos"][$i]["cod"].'">'.Helpers::Dinero($datos["productos"][$i]["total"]).'</div></strong>
                </td>

                <td>
                  <a class="btn btn-sm bg-vino white-text" data-toggle="tooltip" data-placement="top" title="Remove item" id="delete-i" iden="'.$datos["productos"][$i]["id"].'">X
                  </a>
                </td>

              </tr>';



		$total = $total + $datos["productos"][$i]["total"];
	}
    // $tot = $total + $_SESSION["delivery"];



echo '<tr>
                <td></td>

                <td>
                  <h4 class="mt-2">
                    <strong>Total</strong>
                  </h4>
                </td>

                <td class="text-center">
                  <h4 class="mt-2">
                    <strong><div id="carttotal">'. Helpers::Dinero($total) .'</div></strong>
                  </h4>
                </td>

                <td colspan="2" class="text-right">';

                 if($_SESSION["user"]){

                  if($cant_minima < $total){
                    echo '<a href="?checkout" class="btn bg-vino white-text btn-rounded">Completar la compra
                        <i class="fas fa-angle-right right"></i>
                      </a>';
                  } 

                } else {
                  echo '<a id="mlogin" class="btn bg-vino white-text btn-rounded">Iniciar para Continuar
                        <i class="fas fa-angle-right right"></i>
                      </a>';
                }

                echo '</td>

              </tr>
              <!-- Fourth row -->

            </tbody>
            <!-- /.Table body -->

          </table>

        </div>
        <!-- Shopping Cart table -->

      </section>

    </div>';

    if($cant_minima > $total){
      echo '<div class="bg-naranja pt-3 pb-3 white-text text-center">La cantidad minima de su compra debe ser ' . Helpers::Dinero($cant_minima) . ' y de momento solo tiene en el carrito ' . Helpers::Dinero($total) . ' continúe comprando para poder procesar su pedido </div>';

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



	}















  public function Pedido($url){
  $jsondata = $this->ObtenerData($url);

  $datos = json_decode($jsondata, true); 

if(count($datos["productos"])){

echo '<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Su Pedido</span>
            <span class="badge bg-vino badge-pill">'.count($datos["productos"]).'</span>
          </h4>
          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">';

   $total = 0;
   for ($i = 0; $i < count($datos["productos"]); $i++){

      echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">'.$datos["productos"][$i]["producto"].'</h6>
                <small class="text-muted">Cantidad: '.$datos["productos"][$i]["cant"].'</small>
              </div>
              <span class="text-muted">'.Helpers::Dinero($datos["productos"][$i]["total"]).'</span>
            </li>';

      $total = $total + $datos["productos"][$i]["total"];      
   }

if($_SESSION["delivery"] != NULL){
     echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">DELIVERY</h6>
              </div>
              <span class="text-muted">'.Helpers::Dinero($_SESSION["delivery"]).'</span>
            </li>';
}


     echo '<li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>'. Helpers::Dinero($total + $_SESSION["delivery"]) .'</strong>
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
    Alerts::Alerta("success","Realizado!","Pedido realizado corectamente");
    Email::EnviarEmail($_SESSION["email"], $_SESSION["nombre"], 2);
    sleep(2);
    echo '<script>
            window.location.href="?"; 
          </script>';
  } else {
    Alerts::Alerta("error","Error!","No se realizo su pedido, vuelva a intentarlo");
  }

 
}


















} // clase
?>
