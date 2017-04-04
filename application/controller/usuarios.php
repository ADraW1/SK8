<?php

class Usuarios extends Controller
{
  private $mdlUsuarios;

  function __construct()
  {
    $this->mdlUsuarios =$this->loadModel("mdlUsuarios");
  }

  public function index()
  {
    $datos = $this->mdlUsuarios->listar();
    $tdoc = $this->mdlUsuarios->tipoDocumento();
    $rol=$this->mdlUsuarios->conRol();
    include APP."view/_templates/header.php";
    include APP."view/usuarios/index.php";
    include APP."view/_templates/footer.php";
  }

  public function insertarUsuario()
    {
        if (isset($_POST["addUsuario"])) {
          $this->mdlUsuarios->__SET("Documento", $_POST["documento"]);
          $this->mdlUsuarios->__SET("tipoDocumento", $_POST["tipoDoc"]);
          $this->mdlUsuarios->__SET("Nombre", $_POST["nombre"]);
          $this->mdlUsuarios->__SET("Apellido", $_POST["apellido"]);
          $this->mdlUsuarios->__SET("Email", $_POST["email"]);
          $this->mdlUsuarios->__SET("Constrasena", $_POST["contrasena"]);
          $this->mdlUsuarios->__SET("telefonoFijo", $_POST["telfijo"]);
          $this->mdlUsuarios->__SET("telefonoMovil", $_POST["telmovil"]);
          $this->mdlUsuarios->__SET("Direccion", $_POST["direccion"]);
          $this->mdlUsuarios->__SET("Rol", $_POST["rol"]);
          $very=$this->mdlUsuarios->insertarUsuario();
          // where to go after song has been added
          header('location: ' . URL . 'usuarios/index');
        }

    }

  public function edit($id)
  {
    $this->mdlUsuarios->__SET("Documento",$id);
    $datos=$this->mdlUsuarios->consultarUno();
    include APP."view/_templates/header.php";
    include APP."view/usuarios/edit.php";
    include APP."view/_templates/footer.php";
  }

  public function modificar()
  {
    $this->mdlUsuarios->__SET("Documento", $_POST["documento"]);
    $this->mdlUsuarios->__SET("tipoDocumento", $_POST["tipoDoc"]);
    $this->mdlUsuarios->__SET("Nombre", $_POST["nombre"]);
    $this->mdlUsuarios->__SET("Apellido", $_POST["apellido"]);
    $this->mdlUsuarios->__SET("Email", $_POST["email"]);
    $this->mdlUsuarios->__SET("Constrasena", $_POST["contrasena"]);
    $this->mdlUsuarios->__SET("telefonoFijo", $_POST["telfijo"]);
    $this->mdlUsuarios->__SET("telefonoMovil", $_POST["telmovil"]);
    $this->mdlUsuarios->__SET("Direccion", $_POST["direc"]);
    $this->mdlUsuarios->__SET("Rol", $_POST["rol"]);
    $very=$this->mdlUsuarios->modificar();
    header("location:".URL."usuarios/index");
  }

  public function modificarEstado()
  {
    $this->mdlUsuarios->__SET("Documento", $_POST["id"]);
    $this->mdlUsuarios->__SET("Estado", $_POST["estado"]);
    $very=$this->mdlUsuarios->modificarEstado();
    if ($very) {
      echo json_encode(["v"=>1]);
    }else {
      echo json_encode(["v"=>0]);
    }
  }

}

?>
