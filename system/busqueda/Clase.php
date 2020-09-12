<?php 
class Busqueda{

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




public function Buscar($url){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 

if(count($datos["productos"] > 0)){
  
  echo '<section>
    <div class="row no-gutters d-flex justify-content-center mb-3">';



   $this->ProductoView($datos, 0, count($datos["productos"]), NULL);


  echo '</div>
  	</section>';
} else {
  Alerts::Mensajex("No se encontraron registros", "info");
}

}





public function ProductoView($datos, $inicio, $fin, $active = NULL){


	//bucle para recorrer los elementos del array
	 for ($i = $inicio; $i < $fin; $i++){

$rand = rand(1,99);

  echo '<div class="col-6 col-sm-6 col-md-4 col-lg-3 border-right border-left mt-4">
      <div class="card mb-1 z-depth-0">';
    
    if($datos["productos"][$i]["promocion"] == "on"){
        echo '<span class="badge badge-pill mensaje-promo">PROMOCIÓN!!</span>';
    }
        // echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';
 
  echo '<a class="waves-effect waves-light" href="'.BASE_URL.'detalle/'.$datos["productos"][$i]["cod"].'/'.Helpers::FormatearTexto($datos["productos"][$i]["descripcion"]).'">
          <img class="card-img-top p-3 imgproductos img-fluid" src="'.Helpers::Img(URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["productos"][$i]["imagenes"][0]) .'"
            alt="Card image cap"></a>
        <div class="card-body">
          <div class="row">
            <div class="col text-center" style="height: 100px;">
              <h5 class="h5-responsive" style="font-family: Gotham-Light;">'.$datos["productos"][$i]["descripcion"].'</h5>
            </div>
          </div>

          <div class="row align-items-center ">

            <div class="col-6 col-md-6 col-lg-6 nopadding">';

if($datos["productos"][$i]["promo"] != NULL){

echo '<h4 class="h4-responsive letra-gotham-black vino">'.Helpers::Dinero($datos["productos"][$i]["promo"]).'</h4>
<h6 class="letra-gotham-light grey-text">Antes '.Helpers::Dinero($datos["productos"][$i]["precio"]).'</h6>';
} else {
  echo '<h4 class="h4-responsive letra-gotham-black vino">'.Helpers::Dinero($datos["productos"][$i]["precio"]).'</h4>';
}
              
            

            echo '</div>
            <div class="col-6 col-md-6 col-lg-6 nopadding">
              <div class="row no-gutters align-items-center">
                <div class="col-3 text-center nopadding">
                  <a id="accion-producto" iden="'.$datos["productos"][$i]["cod"].'" accion="1" lugar="'.$rand.'"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                </div>
                <div class="col-6 text-center nopadding">
                  <input id="'.$rand.'cantidad'.$datos["productos"][$i]["cod"].'" class="h4-responsive 
z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                </div>
                <div class="col-3 text-center nopadding">
                  <a id="accion-producto" iden="'.$datos["productos"][$i]["cod"].'" accion="2" lugar="'.$rand.'"><i class="fa fa-plus-circle fa-lg naranja p-1 border-0"></i></a>
                </div>
              </div>
              <div class="row no-gutters text-center">
                <div class="col">
                  <a id="additem" btniden="'.$datos["productos"][$i]["cod"].'" cod="'.$datos["productos"][$i]["cod"].'" lugar="'.$rand.'" modact="0"
                                class="btn btn-sm btn-warning btn-rounded bg-naranja btn-additem">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>';


	 }


}






























} // clase
?>