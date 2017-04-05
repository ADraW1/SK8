function val_reg_prod() {

   var nom = document.getElementById('2').value;
   var precio = document.getElementById('3').value;
   var marca = document.getElementById('11').selectedIndex;
   var cat = document.getElementById('9').selectedIndex;
   var talla = document.getElementById('10').selectedIndex;
   var imagen = document.getElementById('4').value;
   var imagen = (imagen.replace("C:\\fakepath\\", ""));

   if (nom == null || nom.length == 0 || /^\s+$/.test(nom)) {
       swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
       return false;
   } else if (precio == null || precio.length == 0 || /^\s+$/.test(precio)) {
       swal("Campo vacio", "El campo de precio esta vacio", "error");
       return false;
   } else if (cat == null || cat== 0) {
        swal("Campo vacio", "El campo de categoria esta vacio", "error");
       return false;
   } else if (talla == null || talla == 0) {
        swal("Campo vacio", "El campo de talla esta vacio", "error");
       return false;
   } else if (marca== null || marca == 0) {
        swal("Campo vacio", "El campo de marca esta vacio", "error");
       return false;
   }else {
     swal("OK!", "Correcto!", "success")
     return true;
   }
}
