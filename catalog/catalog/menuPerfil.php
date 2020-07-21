<header>
<!--Navbar -->
<div class="container-fluid">

<nav class="mb-1 navbar navbar-dark navbar-expand-sm bg-naranja z-depth-0">

    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarNav" aria-controls="navbarSupportedContent-4"
        aria-expanded="false" aria-label="Toggle navigation">
        <a href="<?php echo BASE_URL ?>"><span >
            <i class="fas fa-home" style="color:#fff; font-size:20px;"></i>
        </span></a>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent-4">
        <a href="<?php echo BASE_URL ?>">
         <i class="fas fa-home" style="color:#fff; font-size:20px;"><span class="letra-gotham-bold">
          &nbsp Inicio &nbsp
         </span> </i> </a>
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


</header>