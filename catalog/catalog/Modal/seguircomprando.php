
<!-- modal para seguir comprando en el checkout -->
<div class="modal fade" id="ModalSeguirComprando" tabindex="-1" role="dialog" aria-labelledby="ModalSeguirComprando"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bordeado2 p-2">
            <!--Header-->
            <div class="modal-header p-1 border-0 text-center">
              <h2 class="mt-4 pl-5">¿QUE MÁS DESEAS AGREGAR?</h2>
            </div>
            <!--Body-->
            <div class="modal-body p-4">
                <div class="container z-depth-0 text-center">



          <!-- Categorias -->
      <section >
            <div class="container-fluid">

            <div id="carouselCategorias" class="carousel carousel-multi-item v-2 d-flex flex-column-reverse mr-4 ml-4"
                data-ride="carousel">

                <!--Controls-->


                <a class="carousel-control-prev mr-5" href="#carouselCategorias" role="button" data-slide="prev">
                    <img src="<?php echo BASE_URL ?>assets/Iconos/next.svg" class="img-fluid h-25 mt-5 mr-5" alt="Responsive image" id="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next ml-5" href="#carouselCategorias" role="button" data-slide="next">
                    <img src="<?php echo BASE_URL ?>assets/Iconos/next.svg" class="img-fluid h-25 mt-5 ml-5" alt="Responsive image">
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
                <h6 class="msjCategoria font-weight-bold text-center">'.$_SESSION["categorias_menu"][$i]["subcategoria"].'</h6>

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





                </div>
            </div>
        </div>
    </div>
</div>