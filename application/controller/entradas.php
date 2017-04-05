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
    include APP."view/_templates/header.php";
    include APP."view/entradas/index.php";
    include APP."view/_templates/footer.php";
  }
}


 ?>
