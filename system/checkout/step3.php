<div class="redondeado2  wow fadeIn">

  <div class="row">
    <div class="col-md-6">
<?php 

$check->Pedido(URL_SERVER . "application/src/api.php?op=23&td=" . TD_SERVER . "&usr=" . $_SESSION["usuario"] . "&orden=" . $_SESSION["orden"]);

?>

   <div id="mensaje"></div>
   <a id="mandarpedido" class="btn btn-primary bg-vino btn-lg btn-block">completar pedido</a>   
      
    </div>
    
    <div class="col-md-6 d-none d-md-block d-lg-block">
      <div class="text-center">
        <p class="bg-verde p-3 text-white bordeado3">Casi hemos terminado. Sólo debe completar su pedido</p>
      <img src="assets/img/gracias.png" class="img-fluid" alt="">
    </div>
    </div>
      

  </div>

      
</div>

<div class="text-right mt-3">
  <a href="?checkout&step=2" class="btn btn-default btn-sm btn-rounded"><i class="fas fa-angle-left mr-1"></i> Anterior </a>
</div>