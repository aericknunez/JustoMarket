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

    if(count($datos["productos"]) != 0){
        echo '<section>
        <div class="container">';
            echo '<div class="row justify-content-center">';

             for ($i = 0; $i < count($datos["productos"]); $i++){


                $this->ProductoView($datos, $i, $i+4, count($datos["productos"]));

                $i = $i+3;
             }
            	// $this->ProductoView($datos, 0, 4, NULL);
            	// $this->ProductoView($datos, 4, 8, NULL);
            	// $this->ProductoView($datos, 8, 12, NULL);

            echo '</div>';

        echo '<div id="btnvermas" class="justify-content-center text-center"><a id="vermas" class="btn btn-default bg-vino white-text btn-sm btn-rounded waves-effect">Ver Mas <i class="fas fa-magic ml-1"></i></a></div>
        <div id="loader"></div>';

        echo '</div>
        	</section>';
    } else {
        // echo "Ya no hay nada que mostrar";
    }    
}





public function ProductoView($datos, $inicio, $fin, $total){


	//bucle para recorrer los elementos del array
	 for ($i = $inicio; $i < $fin; $i++){

$rand = rand(1,99);

if($i < $total){
echo '<div class="col-6 border-bottom mt-2">';

  echo '<a class="waves-effect waves-light" id="xproducto" cod="'.$datos["productos"][$i]["cod"].'">';

    if($datos["productos"][$i]["promocion"] == "on"){
        echo '<span class="badge badge-pill mensaje-promo">PROMOCIÓN!!</span>';
    }
    
    if($datos["productos"][$i]["cantidad"] == 0){
        echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';
    }
        // echo '<span class="badge badge-pill mensaje-agotado">AGOTADO</span>';


  echo '<img src="'. Helpers::Img(URL_SERVER .'assets/img/productos/'. TD_SERVER .'/tmb/tmb_'.$datos["productos"][$i]["imagenes"][0]) .'"
            class="img-fluid imgproductos">
        </a>

 <div class="card-body">
    <div class="row" style="height: 100px;">
        <div class="col text-center h-100">
            <div class="ProductosP font-weight-bold text-uppercase"
                style="font-family: Gotham-Light;">'.$datos["productos"][$i]["descripcion"].'</div>
        </div>
    </div>

    <div class="row text-center">

        <div class="col-12 nopadding">';

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
<div class="col-12 nopadding">
<div class="row no-gutters text-center">
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
</div>';

echo '</div>';
}// numero
	 }


}




















} // clase


?>