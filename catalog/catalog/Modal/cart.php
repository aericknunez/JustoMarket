<div class="container">
    <div class="modal fade rounded" id="modalCart" tabindex="-1" role="dialog"
        aria-labelledby="modalCart" aria-hidden="true">
        <div class="modal-dialog modal-md modal-side modal-top-right" role="document">
            <div class="modal-content modal-border-rounded-cart">
                <!--Header-->
                <div class="modal-header border-0">
                    <h4 class="modal-title w-100 text-center" id="myModalLabel">Mi Carrito</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <div id="contenido-carrito"></div>

                </div>
                <!--Footer Modal-->
                <div class="modal-footer d-block text-center">
                    <a href="<?php echo BASE_URL ?>?cart" class="btn btn-primary bg-naranja letra-gotham-black">Ver
                        Carrito</a>

                    <a type="button" class="btn btn-outline-warning letra-gotham-black"
                        data-dismiss="modal">Procesar Pago</a>
                </div>
            </div>
        </div>
    </div>
</div>
