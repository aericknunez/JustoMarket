<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<div class="container">



      <div class="container bg-verde text-center p-4 bordeado2 mb-4">
        <h1 class="letra-gotham-black white-text w-100">ZONAS DE COBERTURA</h1>
      </div>

<div class="alert alert-danger" role="alert">
  <strong>Importante:</strong> La dirección de envío debe estar en el rango establecido por la empresa. Revise el listado de ciudades cubiertas <a id="vercobertura">Aqui</a>
</div>

<!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px" >
  <iframe src="https://www.google.com/maps/d/embed?mid=1Fuj189S0eINiEGotbtceG7y2MEPZCZk5" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>

<!--Google Maps-->
<br>

</div>





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