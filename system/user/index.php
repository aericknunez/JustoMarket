<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';

if ($seslog->login_check() == TRUE) {

include_once 'system/checkout/Inicio.php';
$check = new CheckOut();


?>
<!-- <div id="contenidocart"></div> -->

<div class="container mt-2">
	
	  <!-- Main layout -->
  <main>
    <div class="container-fluid">

      <!-- Section: Team v.1 -->
      <section class="section team-section">

        <!-- Grid row -->
        <div class="row text-center">




          <!-- Grid column -->
          <div class="col-md-4">
            <!-- Card -->
            <div class="card profile-card">
             <!-- Avatar -->
              <div class="avatar mb-2">
                <img src="<?php echo BASE_URL . "/assets/img/avatar/" . $_SESSION["avatar"] ?>" class="rounded-circle z-depth-1-half" alt="First sample avatar image">
              </div>

              <div class="card-body pt-0 mt-0">

                <!-- Name -->
                <h3 class="mb-3 font-weight-bold"><strong><?php echo $_SESSION["nombre"] ?></strong></h3>
                <h6 class="font-weight-bold cyan-text mb-4">
                 <?php // if($_SESSION["tipo"] == 1){ echo "Usario"; } else { echo "Mayorista"; } ?>

                </h6>
              </div>

            </div>
            <!-- Card -->

            <ul class="list-group z-depth-1 mt-4 mb-4">
              <li class="list-group-item d-flex justify-content-between align-items-center bg-vino active">
                SELECCIONE UNA OPCI&OacuteN
                <i class="fas fa-arrow-right"></i>
              </li>

              <a href="?perfil"><li class="list-group-item d-flex justify-content-between align-items-center vino">
                <strong>Cuenta</strong>
                <i class="fas fa-cogs"></i>
              </li></a>

              <a href="?perfil&op=1"><li class="list-group-item d-flex justify-content-between align-items-center vino">
                <strong>Mis Pedidos</strong>
                <i class="far fa-gem"></i>
              </li></a>

              <a href="?perfil&op=2"><li class="list-group-item d-flex justify-content-between align-items-center vino">
                <strong>Modificar Mis Datos</strong>
                <i class="fas fa-edit"></i>
              </li></a>
            </ul>
          </div>
          <!-- Grid column -->


          <!-- Grid column -->
          <div class="col-md-8 mb-4" id="seleccioPerfil">

              <!-- AQUI SE INCLUYE LA OPCION SELECCIONADA -->

              <?php 
              if($_REQUEST["op"] == 1){
                include_once 'system/user/perfil/pedidos.php';
              } elseif($_REQUEST["op"] == 2){
                  include_once 'system/user/perfil/direccionForm.php';
              } else {
                include_once 'system/user/perfil/perfil.php';
              }

               ?>
                 
              <!-- TERMINA OPCION SELECCIONADA -->

          </div>
          <!-- Grid column -->


        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Team v.1 -->

    </div>
  </main>
  <!-- Main layout -->

</div>


<?php 

} else {

?>


<div class="container" style="min-height: 700px;">

  <main>
    
    <div class="row d-flex justify-content-center">
      <div class="col-12 text-center" >
        <img src="assets/img/error.png" alt=""> <br>
         <h4>No tienes permisos para estar aqui.</h4>
        <a id="mlogin" class="btn bg-vino white-text"> Ingresar</a>
      </div>
    </div>

  </main>

</div>

<?
} ?>




<!-- modal para seguir comprando en el checkout -->
<div class="modal fade" id="ModalCobertura" tabindex="-1" role="dialog" aria-labelledby="ModalCobertura"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bordeado2 p-2">
            <!--Header-->
            <div class="modal-header p-1 border-0 text-center">
              <h2 class="mt-4 pl-5">NUESTRA COBERTURA</h2>
            </div>
            <!--Body-->
            <div class="modal-body p-4">
                <div class="container z-depth-0 text-center">
<?php 

    $a = $db->query("SELECT * FROM cobertura_municipio");
    if($a->num_rows > 0){
      echo '<table class="table table-hover table-sm">
            <thead class="vino font-weight-bold">
              <tr>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Tiempo de Entrega</th>
              </tr>
            </thead>
            <tbody>';

    foreach ($a as $b) {
          
  if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$b["departamento"]."'")) { 
    $departamento = $r["departamento"];
}  unset($r);  

        echo '<tr>
              <td>'.$departamento.'</td>
              <td>'.$b["municipio"].'</td>
              <td>'.$b["tiempo"].'</td>
            </tr>';
    } 
    $a->close();

    echo '</tbody>
        </table>';

  }

     ?>

                </div>
            </div>
        </div>
    </div>
</div>