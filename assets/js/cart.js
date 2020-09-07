$(document).ready(function(){


if(location.hostname == "localhost"){
    var Url = "http://localhost/justomarket/";
} else {
    var Url = "https://justomarket.com/";
}



/// borrar un item desde el cart
    $("body").on("click","#delete-i",function(){ 
  
            var iden = $(this).attr('iden');
            var dataString = 'op=24&iden=' + iden;
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenidocart").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {             
                ContenidoCart();
                LoadTotal();
                  
            }
        });

    });



function ContenidoCart(){
            var dataString = 'op=25';
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenidocart").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenidocart").html(data); // lo que regresa de la busquea     
            }
        });
}

ContenidoCart();


// termina carrito

/// agraga mas productos
   function ModificarPCard(iden, action, lugar, pv){ 

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
       ChangeValor(iden, valor, pv, lugar);
    }




    $("body").on("click","#accion-pcard", function(){ 
        
        var iden = $(this).attr('iden');
        var accion = $(this).attr('accion'); 
        var lugar = $(this).attr('lugar'); 
        var pv = $(this).attr('pv'); 
        // 1 = restar .  2 = sumar 
     
        ModificarPCard(iden, accion, lugar, pv);
    });



    function ChangeValor(cod, cantidad, pv, rand){

    var monto = cantidad * pv;
    monto = +monto.toFixed(2);

    var dataString = 'op=20&cod=' + cod + '&cantidad=' + cantidad;
    $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
                $('#' + rand + 'monto' + cod).html('<i class="fas fa-spinner fa-pulse"></i>');
                $("#carttotal").html('<i class="fas fa-spinner fa-pulse"></i>');
            },
            success: function(data) { 
                $('#' + rand + 'monto' + cod).html("$" + monto);
                $("#carttotal").load(Url+'application/src/routes.php?op=22');
                $("#totalcarrito").load(Url+'application/src/routes.php?op=22');
            }
        });
    }




    $("body").on("click","#continuarcomprando",function(){ 
        $('#ModalSeguirComprando').modal('show');
    });








});