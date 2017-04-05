<?php

class Entradas extends Controller
{

  private $mdlEntradas;

  function __construct()
  {
    $this->mdlEntradas=$this->loadModel("mdlEntradas");
  }

  public function index()
  {
    $datos = $this->mdlEntradas->listar();
    $pro =$this->mdlEntradas->conProducto();
    $prove=$this->mdlEntradas->conProveedor();
    include APP."view/_templates/header.php";
    include APP."view/entradas/index.php";
    include APP."view/_templates/footer.php";
  }

  public function insertarEntrada()
  {
    if(isset($_POST["addEntrada"])) {
      $this->mdlEntradas->__SET("Producto", $_POST["producto"]);
      $this->mdlEntradas->__SET("Cantidad", $_POST["cantidad"]);
      $this->mdlEntradas->__SET("Proveedor", $_POST["proveedor"]);
      $very=$this->mdlEntradas->insertarEntrada();
      header('location: ' . URL . 'entradas');
    }
  }
}


 ?>
