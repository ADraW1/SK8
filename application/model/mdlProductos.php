<?php

class mdlProductos
{
  private $idProducto;
  private $Nombre;
  private $Stock;
  private $Precio;
  private $Estado;
  private $Cantidad;
  private $Imagen;
  private $Categoria;
  private $Categoria2;
  private $subCategoria;
  private $CatMarTal;
  private $Talla;
  private $Marca;
  private $db;

  public function __SET($attr,$val)
  {
    $this->$attr=$val;
  }

  public function __GET($attr)
  {
    return $this->$attr;
  }

  function __construct($db)
  {
      try {
          $this->db = $db;
      } catch (PDOException $e) {
          exit('Database connection could not be established.');
      }
  }

  public function listar()
  {
    $sql="CALL con_producto_todo()";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conSubCate()
  {
    $sql="SELECT id_sub,nombre FROM tb_sub_cate";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conCat()
  {
    $sql="CALL con_cat(?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->subCategoria);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conTalla()
  {
    $sql="CALL con_talla(?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Categoria);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conMarca()
  {
    $sql="CALL con_marca(?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Categoria);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function val_cat_mar_tal()
  {
    $sql="CALL val_cat_mar_tal(?,?,?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Categoria2);
    $stm->bindParam(2,$this->Talla);
    $stm->bindParam(3,$this->Marca);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insertarProducto()
  {
    $sql="CALL reg_producto(?,?,?,?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Nombre);
    $stm->bindParam(2,$this->Precio);
    $stm->bindParam(3,$this->Imagen);
    $stm->bindParam(4,$this->CatMarTal);
    return $stm->execute();
  }

  public function modificarEstado()
  {
    $query="CALL mod_estado_producto(?,?)";
    $stm=$this->db->prepare($query);
    $stm->bindParam(1,$this->idProducto);
    $stm->bindParam(2,$this->Estado);
    return $stm->execute();
  }

}

 ?>
