<?php
require_once "conexion.php";
class ModeloAdquisicion
{

  static public function mdlInfoAdquisiciones() //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from adquisicion 
    JOIN proveedor ON proveedor.id_proveedor=adquisicion.id_proveedor");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegAdquisicion($data) //ok
  {
    $idProveedor = $data["idProveedor"];
    $fechaAdquisicion = $data["fechaAdquisicion"];
    $fechaEntrega = $data["fechaEntrega"];
    $descAdquisicion = $data["descAdquisicion"];

    $stmt = Conexion::conectar()->prepare("insert into adquisicion(id_proveedor, fecha_adq, detalle_adq, fecha_entrega)values($idProveedor, '$fechaAdquisicion', '$descAdquisicion', '$fechaEntrega')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoAdquisicion($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM adquisicion
    JOIN proveedor ON proveedor.id_proveedor=adquisicion.id_proveedor
    where id_adquisicion=$id");
    
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditAdquisicion($data) //ok
  {
    $idAdquisicion = $data["idAdquisicion"];
    $idProveedor = $data["idProveedor"];
    $fechaAdquisicion = $data["fechaAdquisicion"];
    $fechaEntrega = $data["fechaEntrega"];
    $descAdquisicion = $data["descAdquisicion"];

    $stmt = Conexion::conectar()->prepare("update adquisicion set id_proveedor=$idProveedor, fecha_adq='$fechaAdquisicion', detalle_adq='$descAdquisicion', fecha_entrega='$fechaEntrega' where id_adquisicion=$idAdquisicion");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliAdquisicion($id) //ok
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from adquisicion where id_adquisicion=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }
}
