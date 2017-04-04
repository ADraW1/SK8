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

  public function insertarProducto()
  {
    $sql="CALL reg_producto(?,?,?,?,?,?,?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Nombre);
    $stm->bindParam(2,$this->Stock);
    $stm->bindParam(3,$this->Precio);
    $stm->bindParam(4,$this->Estado);
    $stm->bindParam(5,$this->Cantidad);
    $stm->bindParam(6,$this->Imagen);
    $stm->bindParam(7,$this->Categoria);
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
