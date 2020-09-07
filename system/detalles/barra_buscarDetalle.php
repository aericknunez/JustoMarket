    <!-- Baner texto -->
    <section>
      <div class="container bg-verde text-center p-4">
        <h1 class="letra-gotham-black white-text w-100">VERDURAS</h1>
      </div>
    </section>
    <!-- Baner Texto -->

    <!-- Barra Buscar -->
    <section>

      <nav class="navbar navbar-light   z-depth-0 pt-3">
        <div>
<!--           <a class="grey-text letra-gotham-light" href="<?php echo BASE_URL ?>">Inicio </a>           
          <a class="grey-text letra-gotham-light" >- CategoriaSeleccionada -</a>
          <a class="grey-text letra-gotham-light" >Cebolla</a> -->
        </div>
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