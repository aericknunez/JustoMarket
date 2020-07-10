<?php 
class Detalles{

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





public function VerDetalles($url){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 

	echo '<!--Section: Content-->
    <section class="text-center">

        <div class="row">';

echo '<div class="col-lg-6">';

echo '<!--Carousel Wrapper-->
<div id="carousel-thumb-modal" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
  <!--Slides-->';



echo '<div class="carousel-inner" role="listbox">';
	for ($i = 0; $i < count($datos["imagenes"]); $i++){
		if($i == 0){
		echo '<div class="carousel-item active">';	
		} else {
		echo '<div class="carousel-item">';
		}
		echo '<img class="d-block w-100" src="'.BASE_URL .'assets/img/productos/'.$datos["imagenes"][$i].'"
	         alt="Third slide">';
		echo '</div>';

        // echo ' <span class="badge badge-pill mensaje-agotado">AGOTADO</span>';

	}
echo '</div>';


  echo '<!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-thumb-modal" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-thumb-modal" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->';
echo '<ol class="carousel-indicators">';

	for ($i = 0; $i < count($datos["imagenes"]); $i++){
		if($i == 0){ $c = 'class="active"';	 } else { $c = ''; }

		echo '<li data-target="#carousel-thumb-modal" data-slide-to="'.$i.'" '.$c.'>
		      <img src="'.BASE_URL .'assets/img/productos/'.$datos["imagenes"][$i].'" width="100">
		    </li>';
	}


echo '</ol>
</div>
<!--/.Carousel Wrapper-->';
echo ' </div>';



echo '<div class="col-lg-6 text-center text-md-left p-1">

            <h2 class="h2-responsive text-center text-md-left product-name 
              font-weight-bold grey-text mb-1 ml-xl-0 ml-4 letra-gotham-bold">
                '.$datos["producto"] .'</h2>
            <h3 class="h3-responsive text-center text-md-left mb-2 ml-xl-0 ml-4 
          letra-gotham-light">
                <span class="grey-text">'.$datos["unidadmedida"] .'</span>
            </h3>

            <div class="font-weight-normal">

                <p class="ml-xl-0 ml-0 letra-gotham-light">'.$datos["informacion"] .'</p>

                <h2 class="h2-responsive letra-gotham-black vino ml-xl-0 ml-0">
                '. Helpers::Dinero($datos["precios"]) .'
                </h2>
                <h5 class="h5-responsive letra-gotham-light ml-xl-0 ml-0">
                Antes '. Helpers::Dinero($datos["precios"]) .'
                </h5>

                <div class="row no-gutters align-items-center">
                    <div class="col-3 text-right nopadding">
                        <a id="accion-producto" iden="'.$datos["codigo"].'" accion="1" lugar="3"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                    </div>
                    <div class="col-6 text-center nopadding">
                        <input id="3cantidad'.$datos["codigo"].'" class="h4-responsive 
z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                    </div>
                    <div class="col-3 text-left nopadding">
                        <a id="accion-producto" iden="'.$datos["codigo"].'" accion="2" lugar="3"><i class="fa fa-plus-circle fa-lg naranja p-1 border-0"></i></a>
                    </div>
                </div>
                <div class="row no-gutters text-center">
                    <div class="col">
                        <button type="button"
                            class="btn btn-sm btn-warning btn-rounded bg-naranja h-75">
                            <h6 class="h5-responsive letra-gotham-light mt-0 pt-0">
                                Añadir a <br>Carrito <i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i></h6>
                        </button>
                    </div>
                </div>

            </div>


    </div>
</div>';

echo ' </section>';






}









} // clase
?>