$(document).ready(function(){


/// borrar un item desde el cart
    $("body").on("click","#mandarpedido",function(){ 
  
            var dataString = 'op=26';
            $.ajax({
            type: "POST",
            url: "https://justomarket.com/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $('#mandarpedido').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>ENVIANDO PEDIDO...').addClass('disabled'); 
               $("#mensaje").html('<div class="row justify-content-center" ><img src="https://justomarket.com/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) { 
                $('#mandarpedido').html('TERMINAR MI PEDIDO').removeClass('disabled');              
                $("#mensaje").html(data);
            }
        });

    });














});