<?php 
class ModalRec{

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





//// recomendados

public function ProductosRecomendados($url){
	$jsondata = $this->ObtenerData($url);

	$datos = json_decode($jsondata, true); 


echo '<section>
<div class="container">


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
          <img src="'. Helpers::Img(URL_SERVER .'assets/img/productos/'. TD_SERVER .'/tmb/tmb_'.$datos["productos"][$i]["imagenes"][0]) .'"
            class="img-fluid imgproductos">
        </a>';

    if($datos["productos"][$i]["promocion"] == "on"){
        echo '<span class="badge badge-pill mensaje-promo">PROMOCIÓN!!</span>';
    }
    
        //echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';
       
        echo '<div class="card-body">
                <div class="row" style="height: 100px;">
                    <div class="col text-center h-100">
                        <div class="ProductosG font-weight-bold text-uppercase"
                            style="font-family: Gotham-Light;">'.$datos["productos"][$i]["descripcion"].'</div>
                    </div>
                </div>

                <div class="row align-items-center ">

                    <div class="col-6 col-md-6 col-lg-6 nopadding">';

        if($datos["productos"][$i]["promo"] != NULL){
    echo '<h4 class="h4-responsive letra-gotham-black vino">
                '.Helpers::Dinero($datos["productos"][$i]["promo"]).'</h4>

    <h6 class="letra-gotham-light grey-text">Antes '.Helpers::Dinero($datos["productos"][$i]["precio"]).'
            </h6>';
        } else {
    echo '<h4 class="h4-responsive letra-gotham-black vino">
                '.Helpers::Dinero($datos["productos"][$i]["precio"]).'</h4>';
        }
 

                  echo '</div>
                    <div class="col-6 col-md-6 col-lg-6 nopadding">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 text-center nopadding">
                                <a id="accion-producto" iden="'.$datos["productos"][$i]["cod"].'" accion="1" lugar="'.$rand.'" cantidad="'.$datos["productos"][$i]["cantidad"].'" ilimitado="'.$datos["productos"][$i]["ilimitado"].'"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                            </div>
                            <div class="col-6 text-center nopadding">
                                <input id="'.$rand.'cantidad'.$datos["productos"][$i]["cod"].'" class="h4-responsive 
  z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                            </div>
                            <div class="col-3 text-center nopadding">
                                <a id="accion-producto" iden="'.$datos["productos"][$i]["cod"].'" accion="2" lugar="'.$rand.'" cantidad="'.$datos["productos"][$i]["cantidad"].'" ilimitado="'.$datos["productos"][$i]["ilimitado"].'"><i class="fa fa-plus-circle fa-lg naranja p-1 border-0"></i></a>
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
      </figure>';


	 }

echo '    </div>
    <!--/.First slide-->';


}



















} // clase


?>