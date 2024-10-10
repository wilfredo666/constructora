<?php
require_once "conexion.php";
class ModeloHerramienta
{

  static public function mdlInfoHerramientas() //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from herramienta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHerramienta($data) //ok
  {
    $codHerramienta = $data["codHerramienta"];
    $cod_clasificador = $data["cod_clasificador"];
    $valorHerramienta = $data["valorHerramienta"];
    $costoHerramienta = $data["costoHerramienta"];
    $descHerramienta = $data["descHerramienta"];
    $ImgHerramienta = $data["ImgHerramienta"];

    $stmt = Conexion::conectar()->prepare("insert into herramienta(cod_herramienta, desc_herramienta, valor_herramienta, costo_herramienta, img_herramienta, cod_clasificacion_her)values('$codHerramienta', '$descHerramienta', '$valorHerramienta', '$costoHerramienta', '$ImgHerramienta', '$cod_clasificador')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoHerramienta($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM herramienta where id_herramienta=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHerramienta($data) //ok
  {
    $idHerramienta = $data["idHerramienta"];
    $codHerramienta = $data["codHerramienta"];
    $cod_clasificador = $data["cod_clasificador"];
    $valorHerramienta = $data["valorHerramienta"];
    $costoHerramienta = $data["costoHerramienta"];
    $descHerramienta = $data["descHerramienta"];
    $ImgHerramienta = $data["ImgHerramienta"];
    $estadoHerramienta = $data["estadoHerramienta"];

    $stmt = Conexion::conectar()->prepare("update herramienta set cod_herramienta='$codHerramienta', desc_herramienta='$descHerramienta', valor_herramienta='$valorHerramienta', costo_herramienta='$costoHerramienta', cod_clasificacion_her='$cod_clasificador', img_herramienta='$ImgHerramienta', estado_herramienta='$estadoHerramienta' where id_herramienta=$idHerramienta");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliHerramienta($id) //ok
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from herramienta where id_herramienta=$id");
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
