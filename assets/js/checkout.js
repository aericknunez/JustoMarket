$(document).ready(function(){

// var Url = "http://localhost/justomarket/";
var Url = "https://justomarket.com/";


/// borrar un item desde el cart
    $("body").on("click","#mandarpedido",function(){ 
  
            var dataString = 'op=26';
            $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $('#mandarpedido').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>ENVIANDO PEDIDO...').addClass('disabled'); 
               $("#mensaje").html('<div class="row justify-content-center" ><img src="'+Url+'assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) { 
                $('#mandarpedido').html('TERMINAR MI PEDIDO').removeClass('disabled');              
                $("#mensaje").html(data);
            }
        });

    });




    $("body").on("click","#continuarcomprando",function(){ 
        $('#ModalSeguirComprando').modal('show');
    });





/// para activar o desactivoar en tienda
    $("body").on("click","#entienda",function(){ /// para el los botones de opciones

        if($(this).attr('checked')){ // es por que estaba activo
            $('#entienda').removeAttr("checked","checked"); // inactivo
            var dir = 'op=30&edo=0';
        } else {
            $('#entienda').attr("checked","checked"); // activo
            var dir = 'op=30&edo=1';
        }
        
        QueryGo(dir);
    });


function QueryGo(dir){

        var dataString = dir;

        $.ajax({
            type: "POST",
            url: Url+"application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#verentienda").html('<div class="row justify-content-md-center" ><img src="'+Url+'assets/img/LoaderIcon.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#verentienda").html(data); // lo que regresa de la busquea 
            }

    });      
}



});