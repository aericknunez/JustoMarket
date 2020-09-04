<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

?>
<div id="contenidocart"></div>
<?
// baner de footer
    require_once 'catalog/catalog/BannerInferior.php';


?>



<!-- modal para seguir comprando en el checkout -->
<div class="modal fade" id="ModalSeguirComprando" tabindex="-1" role="dialog" aria-labelledby="ModalSeguirComprando"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-border-rounded p-2">
            <!--Header-->
            <div class="modal-header p-1 border-0 text-center">
              <h2 class="mt-4 pl-5">¿QUE MÁS DESEAS AGREGAR?</h2>
            </div>
            <!--Body-->
            <div class="modal-body p-4">
                <div class="container z-depth-0 text-center">



          <!-- Categorias -->
        <section>
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

                    <div class="carousel-item active no-gutters">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/bebidas">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/drink.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Bebidas</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2  z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/carnes">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/meat.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Carnes</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/frutas">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/viburnum-fruit.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Frutas</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/abarrotes">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/flour.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Abarrotes</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/mariscos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/seafood.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Mariscos</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1 ">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/vegetales">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/vegetable.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Vegetales</h5>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/vinos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/drink.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Vinos</h5>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/granos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/beans.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Granos</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/lacteos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/milk.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Lacteos</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/limpieza">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/soap.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Limpieza</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-4">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light p-4" href="<?php echo BASE_URL ?>categoria/snacks">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/snacks.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="h5-responsive card-title font-weight-bold text-center">Snacks</h5>

                                </div>
                            </div>
                        </div>
                    </div>




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