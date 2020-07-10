<!-- Modal: modalCart -->
<div class="container">
    <div class="modal fade rounded" id="modalCart" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
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

                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <td class="letra-gotham-light grey-text">Product 1
                                </td>
                                <td class="letra-gotham-bold grey-text">100$</td>
                            </tr>
                            <tr>
                                <td class="letra-gotham-light grey-text">Product 2
                                </td>
                                <td class="letra-gotham-bold grey-text">100$</td>
                            </tr>
                            <tr>
                                <td class="letra-gotham-light grey-text">Product 3
                                </td>
                                <td class="letra-gotham-bold grey-text">100$</td>
                            </tr>
                            <tr>
                                <td class="letra-gotham-light grey-text">Product 4
                                </td>
                                <td class="letra-gotham-bold grey-text">100$</td>
                            </tr>
                            <tr class="total">
                                <td>
                                    <h6 class=" mt-2 letra-gotham-bold grey-text">
                                        <strong>SubTotal</strong>
                                        <br>
                                        <br>
                                        <strong>Delivery</strong>
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="mt-2 letra-gotham-bold grey-text">
                                        <strong id="subtotal">$20</strong>
                                        <br>
                                        <br>
                                        <strong id="delivery">$6.0</strong>
                                    </h6>
                                </td>
                            </tr>

                            <tr class="total">
                            <tr>
                                <td>
                                    <h4 class="mt-1 letra-gotham-bold grey-text">
                                        <strong>Total</strong>
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="mt-1 letra-gotham-bold grey-text" id="Total">
                                        <strong>$60</strong>
                                    </h4>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!--Footer Modal-->
                <div class="modal-footer d-block text-center">
                    <button class="btn btn-primary bg-naranja letra-gotham-black">Ver
                        Carrito</button>

                    <button type="button" class="btn btn-outline-warning letra-gotham-black"
                        data-dismiss="modal">Procesar Pago</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal: modalCart -->