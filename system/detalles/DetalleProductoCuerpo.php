
<!-- DetalleProducto -->
<section>
<div class="container py-5 z-depth-0">

  <!--Section: Content-->
  <section class="text-center">

    <!-- Section heading -->
    <div class="row">
      <div class="col-md-6 col-lg-6">

 
<!--Carousel Wrapper-->
<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
  <!--Slides-->
   <span class="badge badge-pill mensaje-agotado">AGOTADO</span>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo BASE_URL ?>assets/img/productos/tomates.jpg"
        alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo BASE_URL ?>assets/img/productos/cebollas.jpg"
        alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo BASE_URL ?>assets/img/productos/chiles.jpg"
        alt="Third slide">
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-thumb" data-slide-to="0" class="active">
      <img src="<?php echo BASE_URL ?>assets/img/productos/tomates.jpg" width="100">
    </li>
    <li data-target="#carousel-thumb" data-slide-to="1">
      <img src="<?php echo BASE_URL ?>assets/img/productos/cebollas.jpg" width="100">
    </li>
    <li data-target="#carousel-thumb" data-slide-to="2">
      <img src="<?php echo BASE_URL ?>assets/img/productos/chiles.jpg" width="100">
    </li>
  </ol>
</div>
<!--/.Carousel Wrapper-->


      </div>

      <div class="col-md-6 col-lg-6 text-center text-md-left p-1">

          <h2 class="h2-responsive text-center text-md-left product-name 
            font-weight-bold grey-text mb-1 ml-xl-0 ml-4 letra-gotham-bold">
              Tomates</h2>
          <h3 class="h3-responsive text-center text-md-left mb-2 ml-xl-0 ml-4 
        letra-gotham-light">
              <span class="grey-text">Libra</span>
          </h3>

          <div class="font-weight-normal">

              <p class="ml-xl-0 ml-0 letra-gotham-light">Lorem ipsum dolor sit amet,
                  consectetur adipisicing
                  elit. Sapiente nesciunt atque nemo neque ut officiis nostrum
                  incidunt
                  maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis
                  mollitia necessitatibus. Lorem ipsum dolor sit amet,
                  consectetur adipisicing
                  elit. Sapiente nesciunt atque nemo neque ut officiis nostrum
                  incidunt
                  maiores, magni optio et sunt suscipit iusto nisi totam quis, nobis
                  mollitia necessitatibus.</p>

              <h2 class="h2-responsive letra-gotham-black vino ml-xl-0 ml-0">$0.25
              </h2>
              <h5 class="h5-responsive letra-gotham-light ml-xl-0 ml-0">antes $0.30
              </h5>

              <div class="row no-gutters align-items-center">
                <div class="col-3 text-right nopadding">
                    <a id="accion-producto" iden="13100" accion="1"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
                </div>
                <div class="col-6 text-center nopadding">
                    <input id="cantidad13100" class="h4-responsive 
z-depth-1 rounded-pill mt-0 w-75 text-center border-0" value="1"></input>
                </div>
                <div class="col-3 text-left nopadding">
                    <a id="accion-producto" iden="13100" accion="2"><i class="fa fa-minus-circle fa-lg naranja p-1 border-0"></i></a>
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
  </div>

  </section>


<?php
include_once 'system/index/ProductosDestacados.php';
 ?>


</div>
</section>
<!--Section: Content-->