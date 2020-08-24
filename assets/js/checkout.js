$(document).ready(function(){


/// borrar un item desde el cart
    $("body").on("click","#mandarpedido",function(){ 
  
            var dataString = 'op=26';
            $.ajax({
            type: "POST",
            url: "https://justomarket.com/application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#mensaje").html('<div class="row justify-content-center" ><img src="https://justomarket.com/assets/img/loa.gif" alt=""></div>');
            },
            success: function(data) {             
                $("#mensaje").html(data);
            }
        });

    });














});