<?php
require_once "conexion.php";

class ModeloProyecto
{

  static public function mdlInfoProyectos() //ok
  {
    $stmt = Conexion::conectar()->prepare("select id_proyecto,cod_proyecto,nombre_proyecto,desc_proyecto,fecha_inicio,lugar,estado_proyecto, nombre, ap_paterno, ap_materno from proyecto JOIN personal ON personal.id_personal=proyecto.personal_encargado");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegProyecto($data) //ok
  {
    $codProyecto = $data["codProyecto"];
    $nomProyecto = $data["nomProyecto"];
    $descProyecto = $data["descProyecto"];
    $fechaProyecto = $data["fechaProyecto"];
    $lugarProyecto = $data["lugarProyecto"];
    $encargado = $data["encargado"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO proyecto(cod_proyecto, nombre_proyecto, desc_proyecto, fecha_inicio, lugar, personal_encargado) VALUES ('$codProyecto','$nomProyecto','$descProyecto','$fechaProyecto','$lugarProyecto','$encargado')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProyecto($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from proyecto where id_proyecto=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProyecto($data) //ok
  {
    $idProyecto = $data["idProyecto"];
    $nomProyecto = $data["nomProyecto"];
    $descProyecto = $data["descProyecto"];
    $fechaProyecto = $data["fechaProyecto"];
    $lugarProyecto = $data["lugarProyecto"];
    $encargado = $data["encargado"];
    $estadoProyecto = $data["estadoProyecto"];


    $stmt = Conexion::conectar()->prepare("UPDATE proyecto SET nombre_proyecto='$nomProyecto',desc_proyecto='$descProyecto',fecha_inicio='$fechaProyecto',lugar='$lugarProyecto',personal_encargado='$encargado',estado_proyecto='$estadoProyecto' WHERE id_proyecto=$idProyecto");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProyecto($id) //ok
  {
    $Proyecto = Conexion::conectar()->prepare("select * from proyecto where id_proyecto=$id and estado_proyecto=1");
    $Proyecto->execute();
    if ($Proyecto->fetch() > 0) {
      return "error";
    } else {
      $stmt = Conexion::conectar()->prepare("delete from proyecto where id_proyecto=$id");
      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadProyectos()
  {
    $stmt = Conexion::conectar()->prepare("select count(id_proyecto) as proyectos from Proyecto");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
}
