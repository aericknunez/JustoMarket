<?php 
class Index{

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




public function ProductosDestacados($url){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 


echo '<section>
<div class="container">

<nav class="navbar navbar-default bg-white z-depth-0">
  <div class="container ">
      <a class="navbar-brand ">
          <h1 class="font-weight-bold vino">Destacados</h1>
      </a>
  </div>
</nav>

<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
<a class="carousel-control-prev prueba-next"
href="#carousel-with-lb" role="button" data-slide="prev">
<img src="'. BASE_URL .'assets/Iconos/next.svg" class="img-fluid h-25 mt-5"
    alt="Responsive image" id="prev">
<span class="sr-only">Previous</span>
</a>

<a class="carousel-control-next " href="#carousel-with-lb"
role="button" data-slide="next">
<img src="'. BASE_URL .'assets/Iconos/next.svg" class="img-fluid h-25 mt-5"
    alt="Responsive image">
<span class="sr-only">Next</span>
</a>


  <div class="carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>';

	$this->ProductoView($datos, 0, 4, "active");
	$this->ProductoView($datos, 4, 8, NULL);
	$this->ProductoView($datos, 8, 12, NULL);


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
echo '<figure class="col-md-3 d-md-inline-block border-right border-left">';	
} else {
echo '<figure class="col-md-3 d-md-inline-block d-none d-sm-block border-right border-left">';
}

  echo '<a class="waves-effect waves-light" id="xproducto" cod="'.$datos["productos"][$i]["codigo"].'">';

        // echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';
    
  echo '<img src="'. BASE_URL .'assets/img/productos/'.$datos["productos"][$i]["imagenes"][0].'"
            class="img-fluid">
        </a>

                    <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="h3-responsive"
                            style="font-family: Gotham-Light;">'.$datos["productos"][$i]["producto"].'</h3>
                    </div>
                </div>

                <div class="row align-items-center ">

                    <div class="col-6 col-md-6 col-lg-6 nopadding">

                        <h4 class="h4-responsive letra-gotham-black vino">
                            '.Helpers::Dinero($datos["productos"][$i]["precios"]).'</h4>

                        <h6 class="letra-gotham-light grey-text">Antes '.Helpers::Dinero($datos["productos"][$i]["precios"]).'
                        </h6>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 nopadding">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 text-center nopadding">
                                <a id="accion-producto" iden="'.$datos["productos"][$i]["codigo"].'" accion="1" lugar="'.$rand.'"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                            </div>
                            <div class="col-6 text-center nopadding">
                                <input id="'.$rand.'cantidad'.$datos["productos"][$i]["codigo"].'" class="h4-responsive 
  z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                            </div>
                            <div class="col-3 text-center nopadding">
                                <a id="accion-producto" iden="'.$datos["productos"][$i]["codigo"].'" accion="2" lugar="'.$rand.'"><i class="fa fa-plus-circle fa-lg naranja p-1 border-0"></i></a>
                            </div>
                        </div>
                        <div class="row no-gutters text-center">
                            <div class="col">
                                <button type="button"
                                    class="btn btn-sm btn-warning btn-rounded bg-naranja"><i
                                        class="fa fa-shopping-cart"
                                        aria-hidden="true"></i></button>
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