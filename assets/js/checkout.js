$(document).ready(function(){

if(location.hostname == "localhost"){
    var Url = "http://localhost/justomarket/";
} else {
    var Url = "https://justomarket.com/";
}


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
                // $('#ModalGracias').modal('show');            
                if(data === "realizado"){
                    $('#ModalGracias').modal('show');
                    $("#mensaje").hide();
                } else {
                    $("#mensaje").html(data);
                }
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







/// recuperar password
    $('#btn-recovery').click(function(e){ /// agregar un producto 
    e.preventDefault();
    $.ajax({
            url: Url+"application/src/routes.php?op=32",
            method: "POST",
            data: $("#form-recovery").serialize(),
            beforeSend: function () {
                $('#btn-recovery').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-recovery').html('RECUPERAR').removeClass('disabled');         
                $("#form-recovery").trigger("reset");
                $("#msj").html(data);   
            }
        })
    });
    



$("#form-recovery").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});




    $('#btn-cambio').click(function(e){ /// agregar un producto 
    e.preventDefault();
    $.ajax({
            url: Url+"system/user/redirect.php?op=15",
            method: "POST",
            data: $("#form-cambio").serialize(),
            beforeSend: function () {
                $('#btn-cambio').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-cambio').html('RECUPERAR').removeClass('disabled');         
                $("#form-cambio").trigger("reset");
                $("#msj").html(data);   
            }
        })
    });
    



$("#form-cambio").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});






});