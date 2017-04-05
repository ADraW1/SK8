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
    $sub=$this->mdlProductos->conSubCate();
    include APP."view/_templates/header.php";
    include APP."view/productos/index.php";
    include APP."view/_templates/footer.php";
  }

  public function insertarProducto()
  {
    if(isset($_POST["addProducto"])) {
      $this->mdlProductos->__SET("Nombre", $_POST["nombre"]);
      $this->mdlProductos->__SET("Precio", $_POST["precio"]);
      $this->mdlProductos->__SET("Imagen", $_POST["imagen"]);
      $this->mdlProductos->__SET("Categoria2", $_POST["categoria"]);
      $this->mdlProductos->__SET("Marca", $_POST["marca"]);
      $this->mdlProductos->__SET("Talla", $_POST["talla"]);
      $ctm=$this->mdlProductos->val_cat_mar_tal();
      foreach ($ctm as $key) {
        $this->mdlProductos->__SET("CatMarTal", $key['id']);
      }
      $very=$this->mdlProductos->insertarProducto();

      header('location: ' . URL . 'productos');
      // where to go after song has been added
    }
  }

  public function conCat()
  {
    $this->mdlProductos->__SET("subCategoria", $_POST["id_sub"]);
    $cat=$this->mdlProductos->conCat();

    $html='<option>Seleccione...</option>';
    foreach ($cat as $key ) {
      $html.=  "<option value=".$key['id_Categoria'].">".$key['nom_categoria']."</option>";
    }
    echo $html;
  }

  public function conTalla()
  {
    $this->mdlProductos->__SET("Categoria", $_POST["id_Categoria"]);
    $cat=$this->mdlProductos->conTalla();

    foreach ($cat as $key ) {
      echo "<option value=".$key['id_talla'].">".$key['nom_talla']."</option>";
    }
  }

  public function conMarca()
  {
    $this->mdlProductos->__SET("Categoria", $_POST["id_Categoria"]);
    $cat=$this->mdlProductos->conMarca();

    foreach ($cat as $key ) {
      echo "<option value=".$key['id_marca'].">".$key['nom_marca']."</option>";
    }
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
