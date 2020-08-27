   <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">Productos</p>
                  <h4 class="font-weight-bold dark-grey-text">
                    <?php 
                    echo $check->TotalProductosUsuario(URL_SERVER . "application/src/api.php?op=32&user=".$_SESSION["user"]."&td=" . TD_SERVER);
                     ?>

                  </h4>
                </div>
              </div>

              <!-- Card content -->
   

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">Pedidos</p>
                  <h4 class="font-weight-bold dark-grey-text">

                  <?php 
                    echo $check->TotalPedidosUsuario(URL_SERVER . "application/src/api.php?op=33&user=".$_SESSION["user"]."&td=" . TD_SERVER);
                     ?>
                       
                     </h4>
                </div>
              </div>

              <!-- Card content -->


            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>


<?php 
    $datos =  $check->OrdenesCliente(URL_SERVER . "application/src/api.php?op=31&user=".$_SESSION["user"]."&td=" . TD_SERVER);


echo '<!--Accordion wrapper-->
<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">';




for ($i=0; $i < count($datos["ordenes"]); $i++) { 

echo '<!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header" role="tab" id="heading'.$datos["ordenes"][$i]["orden"].'">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapse'.$datos["ordenes"][$i]["orden"].'"
        aria-expanded="false" aria-controls="collapseTwo1">
        <h5 class="mb-0">

          <div class="row">
            <div class="text-left mr-5">Orden: '.$datos["ordenes"][$i]["orden"].'  -  Fecha: '.$datos["ordenes"][$i]["fecha"].'  |  '.$datos["ordenes"][$i]["hora"].'</div>
          <div class="text-right mr-5">'.Helpers::EdoEcommerce($datos["ordenes"][$i]["edo"]).'</div>
          
          </div>
          


           <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapse'.$datos["ordenes"][$i]["orden"].'" class="collapse" role="tabpanel" aria-labelledby="heading'.$datos["ordenes"][$i]["orden"].'"
      data-parent="#accordionEx1">
      <div class="card-body">';


echo '<table class="table table-sm">
  <thead class="blue white-text">
    <tr>
      <th scope="col">Cantidad</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>';
    $total = 0;
      for ($x=0; $x < count($datos["ordenes"][$i]["producto"]); $x++) { 

          echo '<tr>
            <th scope="row">'.$datos["ordenes"][$i]["producto"][$x]["cant"].'</th>
            <td class="text-left">'.$datos["ordenes"][$i]["producto"][$x]["producto"].'</td>
            <td>'.Helpers::Dinero($datos["ordenes"][$i]["producto"][$x]["total"]).'</td>
          </tr>';

          $total = $total + $datos["ordenes"][$i]["producto"][$x]["total"];
      }

          echo '<tr>
            <th scope="row"></th>
            <td class="text-right">Total</td>
            <td><strong>'.Helpers::Dinero($total).'</strong></td>
          </tr>';

echo '</tbody>
</table>';

  echo '</div>
    </div>

  </div>
  <!-- Accordion card -->';



}





echo '</div>
<!-- Accordion wrapper -->';








// echo '<table class="table table-sm">
//   <thead class="blue white-text">
//     <tr>
//       <th scope="col">Orden</th>
//       <th scope="col">Fecha y Hora</th>
//       <th scope="col">Estado</th>
//     </tr>
//   </thead>
//   <tbody>';

// for ($i=0; $i < count($datos["ordenes"]); $i++) { 

//     echo '<tr class="green white-text">
//       <th scope="row">'.$datos["ordenes"][$i]["orden"].'</th>
//       <th>'.$datos["ordenes"][$i]["fecha"].'  |  '.$datos["ordenes"][$i]["hora"].'</th>
//       <th>'.$datos["ordenes"][$i]["edo"].'</th>
//     </tr>';

//       for ($x=0; $x < count($datos["ordenes"][$i]["producto"]); $x++) { 

//           echo '<tr>
//             <th scope="row">'.$datos["ordenes"][$i]["producto"][$x]["cant"].'</th>
//             <td class="text-left">'.$datos["ordenes"][$i]["producto"][$x]["producto"].'</td>
//             <td>'.Helpers::Dinero($datos["ordenes"][$i]["producto"][$x]["total"]).'</td>
//           </tr>';

//       }

// }



// echo '</tbody>
// </table>';
?>