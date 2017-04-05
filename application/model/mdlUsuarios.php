<?php

class mdlUsuarios
{

  private $Documento;
  private $tipoDocumento;
  private $Nombre;
  private $Apellido;
  private $Email;
  private $Constrasena;
  private $telefonoFijo;
  private $telefonoMovil;
  private $Direccion;
  private $Estado;
  private $Rol;

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
    $sql="CALL con_usuario_todo()";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insertarUsuario()
  {
    $sql="CALL reg_usuario(?,?,?,?,?,?,?,?,?,?)";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1,$this->Documento);
    $stm->bindParam(2,$this->tipoDocumento);
    $stm->bindParam(3,$this->Nombre);
    $stm->bindParam(4,$this->Apellido);
    $stm->bindParam(5,$this->Email);
    $stm->bindParam(6,$this->Constrasena);
    $stm->bindParam(7,$this->telefonoFijo);
    $stm->bindParam(8,$this->telefonoMovil);
    $stm->bindParam(9,$this->Direccion);
    $stm->bindParam(10,$this->Rol);
    return $stm->execute();
  }

  public function tipoDocumento()
  {
    $sql="SELECT id_TipoDocumento,nom_TipoDocumento FROM tb_tipodocumento";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function conRol()
  {
    $sql="SELECT id_rol,nom_rol FROM tb_rol";
    $stm=$this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function modificar()
  {
    $query="CALL mod_usuario(?,?,?,?,?,?,?,?,?,?)";
    $stm=$this->db->prepare($query);
    $stm->bindParam(1,$this->Documento);
    $stm->bindParam(2,$this->tipoDocumento);
    $stm->bindParam(3,$this->Nombre);
    $stm->bindParam(4,$this->Apellido);
    $stm->bindParam(5,$this->Email);
    $stm->bindParam(6,$this->Constrasena);
    $stm->bindParam(7,$this->telefonoFijo);
    $stm->bindParam(8,$this->telefonoMovil);
    $stm->bindParam(9,$this->Direccion);
    $stm->bindParam(10,$this->Rol);
    return $stm->execute();
  }

  public function modificarEstado()
  {
    $query="CALL mod_estado_usuario(?,?)";
    $stm=$this->db->prepare($query);
    $stm->bindParam(1,$this->Documento);
    $stm->bindParam(2,$this->Estado);
    return $stm->execute();
  }

  public function consultarUno()
  {
    $query="SELECT * FROM tb_usuario WHERE documento = ?";
    $stm=$this->db->prepare($query);
    $stm->bindParam(1,$this->Documento);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

}

 ?>
