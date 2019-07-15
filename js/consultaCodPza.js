$(function() {
  $("input[type='text']").blur(function() {
    let str = $(this).val();
    var celda = "#" + $(this).attr("name");
    if (str == "") {
      $(celda).html("");
      return;
    } else {
      $.get("../pages/consultaCodPza.php",{cod_pza: str}, function(data, success) {
        if(data != "") {
          $(celda).html(data);
        } else {
          $(celda).html("PIEZA INEXISTENTE");
        }
      });
    }
  })
});