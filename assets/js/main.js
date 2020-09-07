$(document).ready(function(){

if(location.hostname == "localhost"){
    var Url = "http://localhost/justomarket/";
} else {
    var Url = "https://justomarket.com/";
}



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
            url: Url+"application/src/routes.php",
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

                RegresoCard();
                // RegresoCard(cod, cantidad);
            }
        });
    }

function RegresoCard(){
          toastr.success("Su producto ha sido agregado a su pedido", "Producto Agregado", {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": false,
              "positionClass": "md-toast-bottom-right", 
              "preventDuplicates": true,
              "onclick": null,
              "showDuration": 100,
              "hideDuration": 100,
              "timeOut": 2000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            });
          
          LoadTotal(); // carga total del carrito  
          LoadCantidadItems(); // cantidad de items
}


// function RegresoCard(cod, cantidad){
//   $('#ModalCardSuccess').modal('show');
    
//     var dataString = 'op=21&cod=' + cod + '&cantidad=' + cantidad;
//     $.ajax({
//             type: "POST",
//             url: Url+"application/src/routes.php",
//             data: dataString,
//             beforeSend: function () {
//                $("#resultadomodal").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
//             },
//             success: function(data) {            
//                $("#resultadomodal").html(data); // muestra el resultado en el modal
//                LoadTotal(); // carga total del carrito  
//             }
//         });  
// }



function LoadTotal(){

    var dataString = 'op=22';
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            // beforeSend: function () {
            //    $("#totalcarrito").html('<div class="row justify-content-center" > ... </div>');
            // },
            success: function(data) {            
                $("#totalcarrito").html(data); // lo que regresa de la busquea     
            }
        });
}

LoadTotal();



function LoadCantidadItems(){

    var dataString = 'op=29';
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            // beforeSend: function () {
            //    $("#NoItems").html('<div class="row justify-content-center" > ... </div>');
            // },
            success: function(data) {            
                $("#NoItems").html(data); // lo que regresa de la busquea     
            }
        });
}

LoadCantidadItems();



/// Mostrar modal de carrito
    $("body").on("click","#mcarrito",function(){ 
        $('#modalCart').modal('show');

        ContenidoCarritoModal();
        ContenidoFooter();

    });


function ContenidoCarritoModal(){
            var dataString = 'op=23';
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-carrito").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenido-carrito").html(data); // lo que regresa de la busquea     
            }
        });
}

function ContenidoFooter(){
            var dataString = 'op=27';
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#footermodal").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#footermodal").html(data); // lo que regresa de la busquea     
            }
        });
}




/// borrar un item desde el modal
    $("body").on("click","#delete-item",function(){ 
  
            var iden = $(this).attr('iden');
            var dataString = 'op=24&iden=' + iden;
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-carrito").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                ContenidoCarritoModal();  
                LoadTotal();  
                ContenidoFooter();
                LoadCantidadItems(); // cantidad de items
            }
        });

    });




/// borrar un item desde el cart
    $("body").on("click","#delete-i",function(){ 
  
            var iden = $(this).attr('iden');
            var dataString = 'op=24&iden=' + iden;
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-carrito").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                ContenidoCarritoModal();  
                LoadTotal();  
            }
        });

    });

// termina carrito







    // $("body").on("click","#showform",function(){ 
    //     $('#formulario').toggle();
    // });



var inicio = 0;
var fin = 8;
var Minicio = 0;
var Mfin = 4;

/// llamar modal producto
  $("body").on("click","#xproducto",function(){ 

    $('#ModalProductos').modal('show');
    
    var cod = $(this).attr('cod');
    var dataString = 'op=14&cod=' + cod;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#detalle-producto").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#detalle-producto").html(data); // lo que regresa de la busquea     
            }
        });

    if(screen.width < 720){ 
        ModalRecomendados(16); 
    } else { 
        ModalRecomendados(15); 
    }

  });




function ModalRecomendados(op){

  if(op == 15){
     var dataString = 'op='+op;
  } else {
    var dataString = 'op=16&cantidad=0,4';
  }
    var Minicio = 0;
    var Mfin = 4;
   
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
                $("#detalle-reomendados").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
              },
            success: function(data) {    
                $("#detalle-reomendados").html(data); // lo que regresa de la busquea         
            }
        });
}



function ModalRecomendadosPlus(){
    
    Minicio = Minicio + 4;
    var cantidad = Minicio+','+Mfin;

    var dataString = 'op=16&cantidad='+cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
                $("#Mbtnvermas").remove();
                $("#Mloader").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/spinner.gif" alt=""></div>');           
              },
            success: function(data) { 
                // $("#detalle-reomendados").empty();  
                $("#Mloader").remove(); 
                $("#detalle-reomendados").html(data); // lo que regresa de la busquea      
               
            }
        });
}

/// cargar mas productos destacados
  $("body").on("click","#Mvermas",function(){ 
    
    var cantidad = Minicio+','+Mfin;
    ModalRecomendadosPlus();
  });















  

function ProductosDestacados(){ /// solo en detalle y en index

    var dataString = 'op=11';
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#productos-destacados").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#productos-destacados").html(data); // lo que regresa de la busquea     
            }
        });
}
if(screen.width >= 720){
  ProductosDestacados();
}



function DestacadosPeque(){ /// solo en detalle y en index
  
    var cantidad = inicio+','+fin;


    var dataString = 'op=10&cantidad='+cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#productos-destacados").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#productos-destacados").html(data); // lo que regresa de la busquea    
              inicio = inicio + 8;
            }
        });
}
if(screen.width < 720){
  DestacadosPeque();
}

/// cargar mas productos destacados
  $("body").on("click","#vermas",function(){ 
    
    var cantidad = inicio+','+fin;

    var dataString = 'op=10&cantidad='+cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
              $("#btnvermas").remove();
              $("#loader").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/spinner.gif" alt=""></div>');
            },
            success: function(data) {           
              $("#loader").remove(); 
              $("#productos-destacados").append(data); // lo que regresa de la busquea   
              inicio = inicio + 8;
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
               $("#todas-promociones").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#todas-promociones").html(data); // lo que regresa de la busquea     
            }
        });
}

Promociones();












/// mayoria de edad
  $("body").on("click","#mayoriadeedad",function(){ 
    
    var recuerdame = $("#recuerdame").val();
    var dataString = 'op=105&recuerdame='+recuerdame;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#msjedad").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#msjedad").html(data); // lo que regresa de la busquea     
            }
        });

    $('#ModalVinos').modal('hide');

  });







    $("body").on("click","#vercobertura",function(){ 
        $('#ModalCobertura').modal('show');
    });





////////////// busqueda de productos
  // $('#btn-buscar').click(function(e){ /// agregar un producto 
  // e.preventDefault();
  // $.ajax({
  //     url: Url+"application/src/routes.php?op=50",
  //     method: "POST",
  //     data: $("#form-buscar").serialize(),
  //     beforeSend: function () {
  //       $('#btn-buscar').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
  //         },
  //     success: function(data){
  //       $('#btn-buscar').html('Ingresar').removeClass('disabled');       
  //       $("#form-buscar").trigger("reset");
  //       $("#busquedas").html(data); 
  //     }
  //   })
  // });












});