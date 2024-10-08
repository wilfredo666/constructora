<?php
require_once "conexion.php";
class ModeloUsuario
{
  /* metodo de acceso al sistema */
  static public function mdlAccesoUsuario($usuario)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where email='$usuario'");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuarios()
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegUsuario($data)
  {
    $emailUsuario = $data["emailUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");

    $stmt = Conexion::conectar()->prepare("insert into usuario(nombre, email, password) values('$nomUsuario','$emailUsuario','$passUsuario')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuario($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditUsuario($data)
  {
    $idUsuario = $data["idUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];
    $estadoUsuario = $data["estadoUsuario"];
    $catUsuario = $data["catUsuario"];


    $stmt = Conexion::conectar()->prepare("update usuario set password='$passUsuario', nombre='$nomUsuario', estado_usuario='$estadoUsuario', categoria='$catUsuario' where id_usuario=$idUsuario");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliUsuario($id)
  {
    $usuario = Conexion::conectar()->prepare("select * from usuario where id_usuario=$id and estado_usuario=1");
    $usuario->execute();
    if ($usuario->fetch() > 0) {
      return "error";
    } else {
      $stmt = Conexion::conectar()->prepare("delete from usuario where id_usuario=$id");
      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadUsuarios(){
    $stmt = Conexion::conectar()->prepare("select count(id_usuario) as usuarios from usuario");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
}
