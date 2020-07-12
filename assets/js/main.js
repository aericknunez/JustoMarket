$(document).ready(function(){


// solo para el carrusel de las categorias
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});





// popovers initialization - on click
$('[data-toggle="popover-click"]').popover({
  html: true,
  trigger: 'click',
  placement: 'bottom',
  content: function () { return $('#popover_content_list').html(); }
});





/// modifica la cantidad de productos de cada form (iden = id del form, action =  (mas o menos))
  
   function Mcantidad(iden, action, lugar){ 

      var valuex = parseInt($('#' + lugar + 'cantidad' + iden).val());

      if(action == "1"){
        if(valuex != 1){
          var valor = parseInt(valuex) - 1;
        } else {
          var valor = 1;
        }
      } else {
        var valor = parseInt(valuex) + 1;
      }

       $('#' + lugar + 'cantidad' + iden).attr("value", valor);
       // $('#' + lugar + 'cantidad' + iden).val(valor)
    }




    $("body").on("click","#accion-producto", function(){ 
        
        var iden = $(this).attr('iden');
        var accion = $(this).attr('accion'); 
        var lugar = $(this).attr('lugar'); 
        // 1 = restar .  2 = sumar 
     
        Mcantidad(iden, accion, lugar);
    });







    // $("body").on("click","#showform",function(){ 
    //     $('#formulario').toggle();
    // });







/// llamar modal producto
  $("body").on("click","#xproducto",function(){ 
    
    $('#ModalProductos').modal('show');
    
    var cod = $(this).attr('cod');
    var dataString = 'op=14&cod=' + cod;
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#detalle-producto").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#detalle-producto").html(data); // lo que regresa de la busquea     
            }
        });

    ModalRecomendados();

  });


function ModalRecomendados(){

    var dataString = 'op=15';
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#detalle-reomendados").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#detalle-reomendados").html(data); // lo que regresa de la busquea     
            }
        });
}




    



function ProductosDestacados(){

    var dataString = 'op=11';
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#productos-destacados").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#productos-destacados").html(data); // lo que regresa de la busquea     
            }
        });
}

ProductosDestacados();





function Promociones(){

    var dataString = 'op=13';
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#todas-promociones").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#todas-promociones").html(data); // lo que regresa de la busquea     
            }
        });
}

Promociones();














});