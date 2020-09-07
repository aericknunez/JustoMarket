$(document).ready(function(){

if(location.hostname == "localhost"){
    var Url = "http://localhost/justomarket/";
} else {
    var Url = "https://justomarket.com/";
}



    $('.datepicker').pickadate({
      selectYears: 60,
      weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
      weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
      monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
      'Noviembre', 'Diciembre'],
      monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
      'Nov', 'Dic'],
      showMonthsShort: true,
      formatSubmit: 'dd-mm-yyyy',
      close: 'Cancelar',
      clear: 'Limpiar',
      today: 'Hoy',
      max: true
    });
    

    $("body").on("click","#conf_direccion",function(){ /// para el los botones de opciones

        if($(this).attr('checked')){ // es por que estaba activo
            $('#conf_direccion').removeAttr("checked","checked");


             $('#usr_direccion').attr("value", "");
             $('#usr_pais').attr("value", "");
             $('#usr_departamento').attr("value", "");
             $('#usr_municipio').attr("value", "");

              $('#direccionresidencia').show();

        } else {
            $('#conf_direccion').attr("checked","checked");

            $('#direccionresidencia').hide();

             
            var direccion = $('#recibe_direccion').val();
            var pais = $('#recibe_pais').val();
            var departamento = $('#recibe_departamento').val();
            var municipio = $('#recibe_municipio').val();


            $('#usr_direccion').attr("value", direccion); 
            $('#usr_pais').attr("value", pais);
            $('#usr_departamento').attr("value", departamento);
            $('#usr_municipio').attr("value", municipio);
        }
        
    });

 


    $('#btn-perfil').click(function(e){ /// agregar un producto 
    e.preventDefault();
    $.ajax({
            url: Url+"application/src/routes.php?op=100",
            method: "POST",
            data: $("#form-perfil").serialize(),
            beforeSend: function () {
                $('#btn-perfil').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
               // $("#contenido").html('<div class="row justify-content-center" ><img src="assets/img/loa.gif" alt=""></div>');
            },
            success: function(data){
                $('#btn-perfil').html('Guardar').removeClass('disabled');       
                $("#form-perfil").trigger("reset");
                $("#msj").html(data); 
            }
        })
    });
    



$("#form-perfil").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});













});