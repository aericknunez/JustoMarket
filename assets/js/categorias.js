$(document).ready(function(){


    var Url = "https://justomarket.com/";



var Cinicio = 0;
var Cfin = 12;


function ProductosCategorias(){ /// solo en detalle y en index

    var cantidad = Cinicio+','+Cfin;

    var dataString = 'op=12&cantidad='+cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#productos-categorias").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/spinner.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#productos-categorias").html(data); // lo que regresa de la busquea  
                Cinicio = Cinicio + 12;   
            }
        });
}

  ProductosCategorias();





/// cargar mas productos destacados
  $("body").on("click","#Cvermas",function(){ 
    
    var cantidad = Cinicio+','+Cfin;

    var dataString = 'op=12&cantidad='+cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
              $("#cbtnvermas").remove();
              $("#cloader").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/spinner.gif" alt=""></div>');
            },
            success: function(data) {           
              $("#cloader").remove(); 
              $("#productos-categorias").append(data); // lo que regresa de la busquea   
              Cinicio = Cinicio + 12;
            }
        });

  });





function Promociones(){ // solo para promociones

    var dataString = 'op=13';
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#todas-promociones").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/spinner.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#todas-promociones").html(data); // lo que regresa de la busquea     
            }
        });
}

Promociones();






});