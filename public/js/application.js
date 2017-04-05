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
      location.href=uri+"usuarios";
    }else {
      alert("no");
    }
  }).fail(function() {

});
}

function cambiarEstadoProducto(cod,est) {
  $.ajax({
    dataType:'json',
    type:'post',
    url:uri+"productos/modificarEstado",
    data:{id:cod,estado:est}
  }).done(function(respuesta){
    if (respuesta.v==1) {
      location.href=uri+"productos";
    }else {
      alert("no");
    }
  }).fail(function() {

});
}
