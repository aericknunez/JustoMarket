<?php 
class CheckOut{

	public function __construct(){

	}


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
                  <img src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["productos"][$i]["imagen"].'" alt="" class="img-fluid z-depth-0">
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

                <td colspan="2" class="text-right">
                  <button type="button" class="btn bg-vino white-text btn-rounded">Completar la compra
                    <i class="fas fa-angle-right right"></i>
                  </button>
                </td>

              </tr>
              <!-- Fourth row -->

            </tbody>
            <!-- /.Table body -->

          </table>

        </div>
        <!-- Shopping Cart table -->

      </section>

    </div>';



} else {
	echo '<div class="col-12 text-center">
			<img src="'. BASE_URL .'assets/img/carritovacio.png"
		            class="img-fluid">
		</div>';
}



	}












} // clase
?>
