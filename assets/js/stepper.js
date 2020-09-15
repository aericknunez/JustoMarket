$(document).ready(function(){

function LoadInicio(){
      $("#msj-credito").hide();
      $("#msj-entrega").show();
}

LoadInicio();


    $("#pcredito").click(function () {
      $("#pcredito ").attr('checked', true);
      $("#msj-credito").show();
      $("#msj-entrega").hide();
    });
 
    $("#pentrega").click(function () {   
      $("#pentrega ").attr('checked', true);
      $("#msj-credito").hide();
      $("#msj-entrega").show();
    });









});