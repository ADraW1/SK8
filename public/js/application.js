$(function() {

});

function cambiarEstado(cod,est) {
  $.ajax({
    dataType:'json',
    type:'post',
    url:uri+"usuarios/modificarEstado",
    data:{id:cod,estado:est}
  }).done(function(respuesta){
    if (respuesta.v==1) {
      alert("si");
      location.href=uri+"usuarios/index";
    }else {
      alert("no");
    }
  }).fail(function() {

  })

}
