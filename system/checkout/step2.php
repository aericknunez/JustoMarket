
<div class="redondeado2  wow fadeIn">


  <p class="bg-naranja p-3 text-white h5 bordeado3"> Seleccione el método de pago</p>

              <div class="d-block my-3">

                <div class="custom-control custom-radio">
                  <input id="pcredito" name="pago" value="tarjeta" type="radio" class="custom-control-input"  unchecked>
                  <label class="custom-control-label" for="pcredito">Tarjeta de Crédito</label>
                </div>

                <div class="custom-control custom-radio">
                  <input id="pentrega" name="pago" value="entrega" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="pentrega">Pago en Efectivo</label>
                </div>
              </div>

            <div id="msj-entrega">
              <div class="row justify-content-center">
                <div class="col-10 col-md-8 text-center"><p class="bg-verde p-3 text-white bordeado3">Paga en el momento que te entregan tu pedido</p></div>
              </div>
            </div>
              <div id="msj-credito">
              <div class="row justify-content-center">
                <div class="col-10 col-md-8 text-center"><p class="bg-verde p-3 text-white bordeado3">Paga con tu tarjeta de crédito o débito cuando Justo llegue a tu domicilio </p></div>
              </div>
            </div>


              <hr class="mb-4 border border-dark">
        <?php 

        if($tiempo != NULL){

          $rest = substr($tiempo, 0, 1);
          $date = date("H");

          $hora =  $rest + $date;
         if($hora <= "17" and $hora >= "8"){
            $msj = "Su orden llegará en un máximo de $tiempo **";
         } else {
            $msj = "Su orden llegará a tu domicilio en las primeras horas de la mañana **";
         }

        Alerts::Mensajex($msj,"info"); 
        echo '<small>** Puedes ver las condiciones de entrega referentes a tu municipio en el apartado de <a href="'.BASE_URL.'cobertura" target="_blank">COBERTURA</a></small>'; 
        }
        ?>
<hr class="mb-4 border">

        <p class="mt-4">También puede pasar por nuestra tienda por su orden, estará lista para usted 
<div class="switch">
<label>
No
<input type="checkbox" id="entienda" <?php if($_SESSION["entienda"] == "on") echo "checked"; ?> name="entienda">
<span class="lever"></span> 
Si 
  || Recoger en tienda
</label>
</div>
        </p>
 <div id="verentienda">
   <?php 
if($_SESSION["entienda"] == "on"){
  // echo '<div class="text-center text-uppercase"><a href="https://www.google.com/maps/d/edit?mid=1MgdX1iArlCXkCc6VfQ31rZVjURMjKvNb&usp=sharing" target="_blank">Ver el mapa de nuestra ubicación</a></div>';
 echo '<img src="assets/img/mapa2.png" class="img-fluid" alt="Mapa de nuestra ubicación">';
} ?>
 </div>    
          
              <hr class="mb-4">
        
</div>

<div class="text-right mt-3">
  <a href="?checkout" class="btn btn-default btn-sm btn-rounded"><i class="fas fa-angle-left mr-1"></i> Anterior </a>
  <a href="?checkout&step=3" class="btn btn-default btn-rounded">Siguiente <i class="fas fa-angle-right ml-1"></i></a>
</div>