function val_reg_usu() {
  var id = document.getElementById('1').value;
  var tipo_doc = document.getElementById('2').selectedIndex;
  var nom = document.getElementById('3').value;
  var apell = document.getElementById('4').value;
  var tel_f = document.getElementById('5').value;
  var contra = document.getElementById('6').value;
  var contra2 = document.getElementById('7').value;
  var email = document.getElementById('8').value;
  var tel_m = document.getElementById('9').value;
  var direc = document.getElementById('10').value;
  var rol = document.getElementById('11').selectedIndex;


  if (id == null || id.length == 0 || /^\s+$/.test(id)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (id.length > 11) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (tipo_doc == null || tipo_doc == 0) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (nom == null || nom.length == 0 || /^\s+$/.test(nom)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (apell == null || apell.length == 0 || /^\s+$/.test(apell)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (contra == null || contra.length == 0 || /^\s+$/.test(contra)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (contra2 == null || contra2.length == 0 || /^\s+$/.test(contra2)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (contra != contra2) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (email == null || email.length == 0 || /^\s+$/.test(email)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (direc == null || direc.length == 0 || /^\s+$/.test(direc)) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else if (rol == null || rol == 0) {
      swal("Campo vacio", "El campo de nombre de producto esta vacio", "error");
      return false;
  } else {
     swal("OK!", "Correcto!", "success")
     return true;
   }
}
