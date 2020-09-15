


<div class="container">
        <!-- Categorias -->
        <section class="d-none d-md-block d-lg-block">
            <div class="container-fluid">

            <div id="carouselCategorias" class="carousel carousel-multi-item v-2 d-flex flex-column-reverse mr-4 ml-4"
                data-ride="carousel">

                <!--Controls-->


                <a class="carousel-control-prev" href="#carouselCategorias" role="button" data-slide="prev">
                    <img src="<?php echo BASE_URL ?>assets/Iconos/next.svg" class="img-fluid h-25 mt-5" alt="Responsive image" id="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next " href="#carouselCategorias" role="button" data-slide="next">
                    <img src="<?php echo BASE_URL ?>assets/Iconos/next.svg" class="img-fluid h-25 mt-5 " alt="Responsive image">
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->


                <div class="carousel-inner v-2 " role="listbox">



<?php 

for ($i=0; $i < count($_SESSION["categorias_menu"]); $i++) { 
    
    if($i == 0) { $active = " active"; } else { $active = ""; }  

echo '<div class="carousel-item'.$active.' no-gutters">
    <div class="col-6 col-md-4 col-lg-2 pl-2  ">
        <div class="card mb-2 z-depth-0">
            <a class="waves-effect waves-light" href="'. BASE_URL.'categoria/'.$_SESSION["categorias_menu"][$i]["pronombre"].'">
                <img class="card-img-top" src="'. URL_SERVER .'assets/img/imgcategorias/'. TD_SERVER .'/'.$_SESSION["categorias_menu"][$i]["img"] .'" alt="Card image cap"></a>
            <div class="card-body">
                <h6 class="msjCategoriaG font-weight-bold text-center">'.$_SESSION["categorias_menu"][$i]["subcategoria"].'</h6>

            </div>
        </div>
    </div>
</div>';


}
 ?>




                </div>

            </div>

        </div>  
</section>
        <!-- Fin Categorias -->








  <!-- Categorias -->
<section class="d-block d-sm-block d-md-none d-lg-none">
<div class="container-fluid">


<?php 
$num = 0;
$numx = count($_SESSION["categorias_menu"]);
$numy = 0;
for ($i=0; $i < count($_SESSION["categorias_menu"]); $i++) { 
  
if($num == 0){
    echo '<div class="row">';
}

echo '<div class="col-4">
    <div class="card mb-2 z-depth-0">
        <a class="waves-effect waves-light" href="'. BASE_URL.'categoria/'.$_SESSION["categorias_menu"][$i]["pronombre"].'">
            <img class="card-img-top" src="'. URL_SERVER .'assets/img/imgcategorias/'. TD_SERVER .'/'.$_SESSION["categorias_menu"][$i]["img"] .'" alt="Card image cap"></a>
        <div class="card-body">
            <div class="msjCategoria font-weight-bold text-center text-justify">'.$_SESSION["categorias_menu"][$i]["subcategoria"].'</div>

        </div>
    </div>
</div> ';

if($num == 2 or $numx == $numy){
    echo '</div> ';
}


if($num == 2){
    $num = 0;
} else {
    $num ++;
}

$numy ++;

}
 ?>






</div>
</section>
        <!-- Fin Categorias -->

</div>