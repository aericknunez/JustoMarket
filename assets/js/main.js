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







/// llamar modal ver
  $("body").on("click","#xproducto",function(){ 
    
    $('#ModalProductos').modal('show');
    
    // var factura = $(this).attr('factura');
    // var credito = $(this).attr('credito');
    // var tx = $(this).attr('tx');
    // var op = $(this).attr('op');
    // var dataString = 'op='+op+'&credito='+credito+'&factura='+factura+'&tx='+tx;

    // $.ajax({
    //         type: "POST",
    //         url: "application/src/routes.php",
    //         data: dataString,
    //         beforeSend: function () {
    //            $("#vista").html('<div class="row justify-content-center" ><img src="assets/img/loa.gif" alt=""></div>');
    //         },
    //         success: function(data) {            
    //             $("#vista").html(data); // lo que regresa de la busquea     
    //         }
    //     });
    // $("#cerrarmodal").before('<a href="?modal=abonos&cre='+credito+'&factura='+factura+'&tx='+tx+'" id="btn-ra" class="btn btn-secondary btn-rounded">Realizar Abonos</a>');
    
  });
    


});