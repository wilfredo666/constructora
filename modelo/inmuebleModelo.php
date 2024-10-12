<?php
require_once "conexion.php";
class ModeloInmueble
{


  static public function mdlInformacionInmueble() //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from item");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegInmueble($data) //ok
  {

    $cod_item = $data["cod_item"];
    $desc_item = $data["desc_item"];
    $clasificacion = $data["clasificacion"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO item (cod_item, desc_item, clasificacion) 
        VALUES ('$cod_item', '$desc_item', '$clasificacion')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoInmueble($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from item where id_item=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditInmueble($data) //ok
  {
    $id_item = $data["id_item"];
    $cod_item = $data["cod_item"];
    $desc_item = $data["desc_item"];
    $clasificacion = $data["clasificacion"];
    $estado_item = $data["estado_item"];

    $stmt = Conexion::conectar()->prepare("UPDATE item SET cod_item='$cod_item',desc_item='$desc_item',clasificacion='$clasificacion',estado_item='$estado_item' WHERE id_item=$id_item");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliInmueble($id) //ok
  {
    $Inmueble = Conexion::conectar()->prepare("select * from item where id_item=$id and estado_item=1");
    $Inmueble->execute();
    if ($Inmueble->fetch() > 0) {
      return "error";
    } else {
      $stmt = Conexion::conectar()->prepare("delete from item where id_item=$id");
      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlbuscInmueble($id)
  {

    $stmt = Conexion::conectar()->prepare("select * from item where id_item=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
}
