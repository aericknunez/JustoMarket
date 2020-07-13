<?php 
class IndexModal{

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








public function ModalProductos($url){
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
		echo '<img class="d-block w-100" src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["imagenes"][$i].'"
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
		      <img src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["imagenes"][$i].'" width="100">
		    </li>';
	}


echo '</ol>
</div>
<!--/.Carousel Wrapper-->';
echo ' </div>';



echo '<div class="col-lg-6 text-center text-md-left p-1">

                        <h2 class="h2-responsive text-center text-md-left product-name 
                          font-weight-bold grey-text mb-1 ml-xl-0 ml-4 letra-gotham-bold">
                            '.$datos["descripcion"] .'</h2>
                        <h3 class="h3-responsive text-center text-md-left mb-2 ml-xl-0 ml-4 
                      letra-gotham-light">
                            <span class="grey-text">'.$datos["medida"] .'</span>
                        </h3>

                        <div class="font-weight-normal">

                            <p class="ml-xl-0 ml-0 letra-gotham-light">'.$datos["informacion"] .'</p>

                            <h2 class="h2-responsive letra-gotham-black vino ml-xl-0 ml-0">
                            '. Helpers::Dinero($datos["precio"]) .'
                            </h2>
                            <h5 class="h5-responsive letra-gotham-light ml-xl-0 ml-0">
                            Antes '. Helpers::Dinero($datos["precio"]) .'
                            </h5>

                            <div class="row no-gutters align-items-center">
                                <div class="col-3 text-right nopadding">
                                    <a id="accion-producto" iden="'.$datos["cod"].'" accion="1" lugar="2"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                                </div>
                                <div class="col-6 text-center nopadding">
                                    <input id="2cantidad'.$datos["cod"].'" class="h4-responsive 
z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                                </div>
                                <div class="col-3 text-left nopadding">
                                    <a id="accion-producto" iden="'.$datos["cod"].'" accion="2" lugar="2"><i class="fa fa-plus-circle fa-lg naranja p-1 border-0"></i></a>
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






//// recomendados

public function ProductosRecomendados($url){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 


echo '<section>
<div class="container">

<nav class="navbar navbar-default bg-white z-depth-0">
  <div class="container ">
      <a class="navbar-brand ">
          <h2 class="h2-responsive font-weight-bold vino">Productos Sugeridos</h2>
      </a>
  </div>
</nav>

<!--Carousel Wrapper-->
<div id="carousel-moda" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
<a class="carousel-control-prev prueba-next"
href="#carousel-moda" role="button" data-slide="prev">
<img src="'. BASE_URL .'assets/Iconos/next.svg" class="img-fluid h-25 mt-5"
    alt="Responsive image" id="prev">
<span class="sr-only">Previous</span>
</a>

<a class="carousel-control-next " href="#carousel-moda"
role="button" data-slide="next">
<img src="'. BASE_URL .'assets/Iconos/next.svg" class="img-fluid h-25 mt-5"
    alt="Responsive image">
<span class="sr-only">Next</span>
</a>


  <div class="carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>';

	$this->ProductoView($datos, 0, 3, "active");
	$this->ProductoView($datos, 3, 6, NULL);
	$this->ProductoView($datos, 6, 9, NULL);
    $this->ProductoView($datos, 9, 12, NULL);


echo '</div>
	<!--/.Carousel Wrapper-->



	</div>
	</section>';
}





public function ProductoView($datos, $inicio, $fin, $active = NULL){

echo '<!--First slide-->
    <div class="carousel-item text-center '.$active.'">';


	//bucle para recorrer los elementos del array
	 for ($i = $inicio; $i < $fin; $i++){

$rand = rand(1,99);

if($i == $inicio){
echo '<figure class="col-md-4 d-md-inline-block border-right border-left">';	
} else {
echo '<figure class="col-md-4 d-md-inline-block d-none d-sm-block border-right border-left">';
}


  echo '<a class="waves-effect waves-light" id="xproducto" cod="'.$datos["productos"][$i]["cod"].'">
          <img src="'. URL_SERVER .'assets/img/productos/'. TD_SERVER .'/'.$datos["productos"][$i]["imagenes"][0].'"
            class="img-fluid">
        </a>';

        //echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';
       
        echo '<div class="card-body">
                <div class="row" style="height: 150px;">
                    <div class="col text-center h-100">
                        <h4 class="h4-responsive"
                            style="font-family: Gotham-Light;">'.$datos["productos"][$i]["descripcion"].'</h4>
                    </div>
                </div>

                <div class="row align-items-center ">

                    <div class="col-6 col-md-6 col-lg-6 nopadding">

                        <h4 class="h4-responsive letra-gotham-black vino">
                            '.Helpers::Dinero($datos["productos"][$i]["precio"]).'</h4>

                        <h6 class="letra-gotham-light grey-text">Antes '.Helpers::Dinero($datos["productos"][$i]["precio"]).'
                        </h6>
                    </div>
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
                                <a id="additem" btniden="'.$datos["productos"][$i]["cod"].'" cod="'.$datos["productos"][$i]["cod"].'" lugar="'.$rand.'"
                                class="btn btn-sm btn-warning btn-rounded bg-naranja">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
      </figure>';


	 }

echo '    </div>
    <!--/.First slide-->';



	 	
// 	echo $datos["productos"][$i]["codigo"] . " Id: " . $i;

// 		foreach ($datos['productos'][$i]['imagenes'] as $imagen) {
// 	  echo ' -- ' .$imagen;
// 	}
// echo "<br>";
}



















} // clase


?>