<?php

class mdlEntradas
{

  private $idEntrada;
  private $Cantidad;
  private $Fecha;
  private $Producto;
  private $Proveedor;

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
}


 ?>
