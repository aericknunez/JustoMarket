$(document).ready(function(){

function LoadInicio(){
  $("#step-1").css("display", "block");
  $("#step-2").css("display", "none");
  $("#step-3").css("display", "none");

      $("#msj-credito").hide();
      $("#msj-entrega").show();
}

LoadInicio();



$("body").on("click","#btn-1",function(){ 
  $("#step-1").css("display", "block");
  $("#step-2").css("display", "none");
  $("#step-3").css("display", "none");

  // $("#step-1").show();
  // $("#step-2").hide();
  // $("#step-3").hide();
});

$("body").on("click","#btn-2",function(){ 
  $("#step-2").css("display", "block");
  $("#step-1").css("display", "none");
  $("#step-3").css("display", "none");
});

$("body").on("click","#btn-3",function(){ 
  $("#step-3").css("display", "block");
  $("#step-1").css("display", "none");
  $("#step-2").css("display", "none");
});






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