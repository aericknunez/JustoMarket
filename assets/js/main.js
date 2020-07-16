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



/// agregar producto al carrito

    $("body").on("click","#additem", function(){ 
        
        var iden = $(this).attr('btniden');
        var lugar = $(this).attr('lugar');
        var cod = $(this).attr('cod'); 
        var modact = $(this).attr('modact'); // 1 activo 0 inactivo
        // 1 = restar .  2 = sumar 
     
        AddItemCod(iden, cod, lugar, modact);
    });


    function AddItemCod(iden, cod, lugar, modact){

    var cantidad = parseInt($('#' + lugar + 'cantidad' + cod).val());
    var dataString = 'op=20&cod=' + cod + '&cantidad=' + cantidad;
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
              if(modact == 1){
                $("a[btniden='"+ lugar +''+ cod +"']").html('<h6 class="h5-responsive letra-gotham-light mt-0 pt-0">Espere... <i class="spinner-border spinner-border-sm" aria-hidden="true"></i></h6>').addClass('disabled');
              } else {
                $("a[btniden='"+ cod +"']").html('<i class="spinner-border spinner-border-sm" aria-hidden="true"></i>').addClass('disabled');
              }
            },
            success: function(data) { 
             if(modact == 1){
              $("a[btniden='"+ lugar +''+ cod +"']").html('<h6 class="h5-responsive letra-gotham-light mt-0 pt-0">Añadir a <br>Carrito <i class="fa fa-shopping-cart" aria-hidden="true"></i></h6>').removeClass('disabled');           
             } else {
              $("a[btniden='"+ cod +"']").html('<i class="fa fa-shopping-cart" aria-hidden="true"></i>').removeClass('disabled');           
             }        
                RegresoCard(cod, cantidad);
            }
        });
    }


function RegresoCard(cod, cantidad){
  $('#ModalCardSuccess').modal('show');
    
    var dataString = 'op=21&cod=' + cod + '&cantidad=' + cantidad;
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#resultadomodal").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
               $("#resultadomodal").html(data); // muestra el resultado en el modal
               LoadTotal(); // carga total del carrito  
            }
        });  
}



function LoadTotal(){

    var dataString = 'op=22';
    $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#totalcarrito").html('<div class="row justify-content-center" > ... </div>');
            },
            success: function(data) {            
                $("#totalcarrito").html(data); // lo que regresa de la busquea     
            }
        });
}

LoadTotal();


/// Mostrar modal de carrito
    $("body").on("click","#mcarrito",function(){ 
        $('#modalCart').modal('show');

        ContenidoCarritoModal();

    });


function ContenidoCarritoModal(){
            var dataString = 'op=23';
            $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-carrito").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenido-carrito").html(data); // lo que regresa de la busquea     
            }
        });
}



    $("body").on("click","#delete-item",function(){ 
  
            var iden = $(this).attr('iden');
            var dataString = 'op=24&iden=' + iden;
            $.ajax({
            type: "POST",
            url: "http://localhost/justomarket/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-carrito").html('<div class="row justify-content-center" ><img src="http://localhost/justomarket/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                ContenidoCarritoModal();    
            }
        });

    });



// termina carrito







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










});