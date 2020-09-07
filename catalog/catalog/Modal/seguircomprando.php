
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

                    <div class="carousel-item active no-gutters">
                        <div class="col-6 col-md-3">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light" href="<?php echo BASE_URL ?>categoria/bebidas">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/drink.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Bebidas</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2  z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/carnes">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/meat.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Justo Grill - Carnes y Pollo</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/frutas">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/viburnum-fruit.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Frutas y Vegetales</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/abarrotes">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/flour.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Abarrotes</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/mariscos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/seafood.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Mariscos</h6>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/vinos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/drink.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Justo Bar -<br> Vinos y Licores</h6>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/granos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/beans.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Granos</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3 ">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/lacteos">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/milk.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Lacteos</h6>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item no-gutters p-1">
                        <div class="col-6 col-md-3">
                            <div class="card mb-2 z-depth-0">
                                <a class="waves-effect waves-light " href="<?php echo BASE_URL ?>categoria/snacks">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>assets/Iconos/snacks.svg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h6 class="msjCategoriaG font-weight-bold text-center">Snacks</h6>

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