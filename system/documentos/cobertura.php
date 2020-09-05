<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<div class="container">



      <div class="container bg-verde text-center p-4 bordeado2 mb-4">
        <h1 class="letra-gotham-black white-text w-100">ZONAS DE COBERTURA</h1>
      </div>

<h3 class="text-uppercase text-center vino font-weight-bold">¡Llegamos a todo el Departamento de Sonsonate!</h3>
<p class="text-center vino">Consulta nuestros tiempos máximos de entrega en cada municipio.</p>
<p class="text-center vino mb-4 font-weight-bold"><strong>¡PROXIMAMENTE EN SANTA ANA Y LA LIBERTAD!</strong></p>
<?php 

    $a = $db->query("SELECT * FROM cobertura_municipio");
    if($a->num_rows > 0){
      echo '<table class="table table-hover table-sm">
            <thead class="vino font-weight-bold">
              <tr>
                <th>Pedidos a domicilio Sonsonate</th>
                <th>Tiempo máximo de entrega</th>
                <th>Costo de envío</th>
                <th>Monto mínimo de compra</th>
              </tr>
            </thead>
            <tbody>';

    foreach ($a as $b) {
          
//   if ($r = $db->select("departamento", "cobertura_departamento", "WHERE id = '".$b["departamento"]."'")) { 
//     $departamento = $r["departamento"];
// }  unset($r);  

        echo '<tr>
              <td>'.$b["municipio"].'</td>
              <td>'.$b["tiempo"].'</td>
              <td>'.Helpers::Dinero($b["costo"]).'</td>
              <td>'.Helpers::Dinero($b["cant_minima"]).'</td>
            </tr>';
    } 
    $a->close();

    echo '</tbody>
        </table>';

  }

     ?>

<p><small class="vino mb-4">* Tiempos máximos de entrega de 4 y 6 horas, aplica para pedidos realizados antes de las 12 MD.</small></p>

<!-- <div class="alert alert-danger" role="alert">
  <strong>Importante:</strong> La dirección de envío debe estar en el rango establecido por la empresa. Revise el listado de ciudades cubiertas <a id="vercobertura">Aqui</a>
</div> -->

<!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px" >
  <iframe src="https://www.google.com/maps/d/embed?mid=1Fuj189S0eINiEGotbtceG7y2MEPZCZk5" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>

<!--Google Maps-->
<br>

</div>

