<header>
<!--Navbar -->
<div class="container-fluid">

<nav class="mb-1 navbar navbar-dark navbar-expand-sm bg-naranja info-color z-depth-0">

    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarNav" aria-controls="navbarSupportedContent-4"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent-4">
        <a class="navbar-brand bg-amarillo rounded-pill p-1 letra-gotham-bold" href="<?php echo BASE_URL ?>">&nbsp Descarga nuestro
            cat&aacutelogo &nbsp</a>
    </div>

    <ul class="navbar-nav navbar-expand">

<?php 
if($_SESSION["user"]){
    ?>
        <li class="nav-item">
            <span class="text ml-2 p-2 d-none d-md-block d-lg-block">
                <a class="nav-link letra-gotham-bold" id="muser">
                    <i class="far fa-user fa-lg"></i> <?php echo $_SESSION["nombre"] ?> </a>
            </span>
            <span class="d-block d-sm-block d-md-none d-lg-none">
                <a class="nav-link"  id="muser"><i
                        class="fa fa-user"></i></a></span>
        </li>
    <?
} else {
    ?>
        <li class="nav-item">
            <span class="text ml-2 p-2 d-none d-md-block d-lg-block">
                <a class="nav-link letra-gotham-bold" id="mlogin">
                    <i class="far fa-user fa-lg"></i> Mi Cuenta </a>
            </span>
            <span class="d-block d-sm-block d-md-none d-lg-none">
                <a class="nav-link" id="mlogin"><i
                        class="fa fa-user"></i></a></span>
        </li>
    <?
}

 ?>

        <li class="nav-item">
            <span class="text ml-2 p-2 d-none d-md-block d-lg-block">
                <a class="nav-link letra-gotham-bold" id="mcarrito" 
                aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart fa-lg" aria-hidden="true"></i>
                    Mi Carrito <span class="badge bg-vino letra-gotham-bold" id="totalcarrito">$0.0</span></a>
            </span>
            <span class="d-block d-sm-block d-md-none d-lg-none">
                <a class="nav-link  letra-gotham-bold" id="mcarrito"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                        class="badge bg-vino ml-2 letra-gotham-bold"></span>
                </a>
            </span>
            
        </li>
    </ul>
</nav>


</div>
<!--/.Navbar -->





        <!-- Barra de Logo -->
<section>
<div class="container-fluid">
 
    <nav class="navbar navbar-expand-lg navbar-light bg-white m-1 z-depth-0">

        <a class="navbar-brand" href="<?php echo BASE_URL ?>">
            <img src="<?php echo BASE_URL ?>assets/Logo/Logo_Mesa de trabajo 2.png" class="img-fluid" alt="Responsive image">
        </a>


        <button class="navbar-toggler d-none d-sm-block d-md-block d-lg-none" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">


                <li class="nav-item d-block d-sm-none">
                    <a class="nav-link letra-gotham-black bg-amarillo rounded-pill text-center"
                        href="<?php echo BASE_URL ?>">
                        <h4 class="h4-responsive">&nbsp Descarga nuestro
    cat&aacutelogo &nbsp</h4>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link letra-gotham-black outline-vino h-75 mr-3 rounded-pill text-center"
                        href="<?php echo BASE_URL ?>">
                        <h4 class="h4-responsive">Inicio</h4>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link letra-gotham-black outline-vino  mr-3
                     rounded-pill h-75 text-center" data-toggle="popover-click" data-placement="auto">
                        <h4 class="h4-responsive">Categor&iacuteas</h4>
                    </a>
                    <div id="popover_content_list" style="display: none">

                        <a href="<?php echo BASE_URL ?>categoria/bebidas"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 h-100 w-100">
                            Bebidas
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/carnes"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Carnes
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/frutas"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Frutas
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/abarrotes"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Abarrotes
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/mariscos"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Mariscos
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/vegetales"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Vegetales
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/granos"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Granos
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/lacteos"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Lacteos
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/limpieza"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Limpieza
                        </a> <br>
                        <a href="<?php echo BASE_URL ?>categoria/snacks"
                            class="letra-gotham-light grey-text outline-naranja pr-5 pl-3 mt-2 mr-5 w-100">
                            Snacks
                        </a> <br>


                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link letra-gotham-black outline-vino  rounded-pill h-75 mr-3 text-center"
                        href="<?php echo BASE_URL ?>promociones">
                        <h4 class="h4-responsive">Promociones</h4>
                    </a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link letra-gotham-black outline-vino  rounded-pill h-75 mr-3 text-center"
                        href="<?php echo BASE_URL ?>cobertura">
                        <h4 class="h4-responsive">Cobertura</h4>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link letra-gotham-black outline-vino  rounded-pill h-75 mr-3 text-center"
                        href="<?php echo BASE_URL ?>contacto">
                        <h4 class="h4-responsive">Contacto</h4>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</div>
</section>
        <!-- Fin Barra Logo -->


</header>