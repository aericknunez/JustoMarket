<?php 
class Inicio{

	public function __construct(){

	}




	public function CrearVariables(){
		$db = new dbConn();

		$url = URL_SERVER . "application/src/api.php?op=30&td=" . TD_SERVER;
		
		$data["user"] = $_SESSION["user"];
		$data["usuario"] = $_SESSION["usuario"];

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

		$datos = json_decode($respuesta, true);

		if($_SESSION["orden"] == NULL){
			 $_SESSION["orden"] = $datos["orden"];
		}

		$_SESSION["usuario"] = $_SESSION["user"];

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

    $response = array();

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}




	public function AddItem($url, $data){
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

		return $respuesta;
	}



	public function AddDelivery($url, $data){
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

		return $respuesta;
	}



	public function ObtenerTotal($url, $data){
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

		return $respuesta;
	}




public function ObtenerOrdenNo($url){

    $response = array();

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}




	public function DataReturnModal($url, $cantidad){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 



	$total = $datos["precio"] * $cantidad;
		echo '<div class="row">

		<div class="col-12 col-md-4">
			<img src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["imagenes"][0] .'"
		            class="img-fluid">
		</div>
		<div class="col-12 col-md-8">
		<h4 class="h4-responsive">'.$datos["descripcion"].'</h4>
		<hr>
		
		<table class="table table-sm">
		  <thead>
		    <tr>
		      <th scope="col">Cantidad</th>
		      <th scope="col">Precio</th>
		      <th scope="col">Total</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">'.$cantidad.'</th>
		      <td>'. Helpers::Dinero($datos["precio"]) .'</td>
		      <td><strong>'. Helpers::Dinero($total) .'</strong></td>
		    </tr>
		  </tbody>
		</table>

		</div>
			
		</div>';
	
	}




	public function ContenidoCarrito($url){


	$jsondata = $this->ObtenerData($url);


	$datos = json_decode($jsondata, true); 

if(count($datos["productos"])){

		echo '<table class="table table-hover table-sm">
                <tbody>';

	$total = 0;
	 for ($i = 0; $i < count($datos["productos"]); $i++){

	echo '<tr>
		<td class="letra-gotham-light grey-text">'.$datos["productos"][$i]["cant"].'</td>
        <td class="letra-gotham-light grey-text">'.$datos["productos"][$i]["producto"].'</td>
        <td class="letra-gotham-bold grey-text">'.Helpers::Dinero($datos["productos"][$i]["total"]).'</td>
        <td class="letra-gotham-bold red-text"><a id="delete-item" iden="'.$datos["productos"][$i]["id"].'"><i class="fas fa-trash"></i></a></td>
    	</tr>';

		$total = $total + $datos["productos"][$i]["total"];
	}
    
       
        echo '<tr class="total">
            <td colspan="2">
                <h6 class=" mt-2 letra-gotham-bold grey-text">
                    SubTotal
                    <br>';
                    if($_SESSION["delivery"] != NULL){
                      echo '<br>
                    Delivery';
                    }
                    
         echo '</h6>
            </td>
            <td>
                <h6 class="mt-2 letra-gotham-bold grey-text">
                    '. Helpers::Dinero($total) .'
                    <br>';

                    if($_SESSION["delivery"] != NULL){
                    echo '<br>
                    '. Helpers::Dinero($_SESSION["delivery"]);
                	}
            echo '</h6>
            </td>
        </tr>

        <tr class="total">
        <tr>
            <td colspan="2">
                <h6 class="mt-1 letra-gotham-bold black-text">
                    Total
                </h6>
            </td>
            <td>
                <h6 class="mt-1 letra-gotham-bold black-text" id="Total">
                '. Helpers::Dinero($_SESSION["delivery"] + $total) .'                            
                </h6>
            </td>
        </tr>
        </tr>';
echo '</tbody>
</table>';

if($_SESSION["delivery"] == NULL){
echo '<p class="text-center bg-naranja white-text pt-1 pb-1 rounded">Inicie sesión para conocer el cargo de delivery</p>';
}


} else {
	echo '<div class="col-12 text-center">
			<img src="'. BASE_URL .'assets/img/carritovacio.png"
		            class="img-fluid">
		</div>';
}



	}



public function FooterModal($url){

	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 

	if(count($datos["productos"]) > 0){
	    echo '<a href="'. BASE_URL.'?cart" class="btn btn-primary bg-naranja letra-gotham-black">Ver
	            Carrito</a>
	        <a href="'. BASE_URL.'?checkout" class="btn btn-outline-warning letra-gotham-black">Procesar Orden</a>';	   
	} else {
		echo '<a data-dismiss="modal" class="btn btn-outline-warning letra-gotham-black">Agregar Productos</a>';
	}


}






public function BorrarItem($url){

/// hago la consulta para eliminar el producto
	
		$data["usuario"] = $_SESSION["usuario"];
		$data["orden"] = $_SESSION["orden"];

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


}











} // clase
?>
