<div class="container">
<!-- Barra Buscar -->
<section>

    <nav class="navbar navbar-light d-flex flex-column-reverse flex-lg-row flex-md-row  z-depth-0 p-5">

        <h1 class="letra-gotham-black vino">Categorías</h1>
        <form class="form-inline my-1" name="form-buscar" id="form-buscar" method="post" action="<?php echo BASE_URL ?>search" >
            <div class="input-group form-lg form-2 pl-0">
                <input class="form-control my-0 py-3 z-depth-1 buscar-left" type="text" placeholder="Buscar"aria-label="Buscar" id="search" name="search">
                <div class="input-group-append">
                    <span class="input-group-text bg-naranja buscar-right" id="basic-text1">
                        <button id="btn-buscar" name="btn-buscar" type="button" class="vino bg-naranja nopadding border-0">
                            <i class="fas fa-search fa-flip-horizontal text-white" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>

    </nav>

</section>
<!-- Fin Barra Buscar -->
</div>