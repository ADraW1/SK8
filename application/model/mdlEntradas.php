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
    $sql="SELECT e.id_entradas, e.cantidad, e.fecha_entrada, p.nom_proveedor, pr.nombre FROM tb_entrada e JOIN tb_proovedor p ON e.fk_proveedor = p.id_Proovedor JOIN tb_producto pr ON e.fk_producto = pr.id_Producto";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conProducto()
  {
    $sql="SELECT id_Producto,nombre FROM tb_producto";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conProveedor()
  {
    $sql="SELECT id_Proovedor,nom_proveedor FROM tb_proovedor";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insertarEntrada()
  {
    $sql="CALL reg_entrada(?,?,?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Cantidad);
    $stm->bindParam(2,$this->Producto);
    $stm->bindParam(3,$this->Proveedor);
    return $stm->execute();
  }
}

 ?>
