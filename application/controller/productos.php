<?php

class Productos extends Controller
{

  private $mdlProductos;

  function __construct()
  {
    $this->mdlProductos=$this->loadModel("mdlProductos");
  }

  public function index()
  {
    $datos = $this->mdlProductos->listar();
    include APP."view/_templates/header.php";
    include APP."view/productos/index.php";
    include APP."view/_templates/footer.php";
  }

  public function add()
  {
    include APP."view/_templates/header.php";
    include APP."view/productos/add.php";
    include APP."view/_templates/footer.php";
  }
  
  public function modificarEstado()
  {
    $this->mdlProductos->__SET("idProducto", $_POST["id"]);
    $this->mdlProductos->__SET("Estado", $_POST["estado"]);
    $very=$this->mdlProductos->modificarEstado();
    if ($very) {
      echo json_encode(["v"=>1]);
    }else {
      echo json_encode(["v"=>0]);
    }

  }

}


 ?>
