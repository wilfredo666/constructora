<?php 
require_once "conexion.php";
class ModeloCliente{


  static public function mdlInformacionCliente(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCliente($data){

    $nombre_cliente = $data["nombre_cliente"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_cliente = $data["ci_cliente"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("INSERT INTO cliente (nombre_cliente, ap_paterno_cli, ap_materno_cli, ci_cliente, telefono_cli, direccion_cli) 
        VALUES ('$nombre_cliente', '$ap_paterno_cli', '$ap_materno_cli', '$ci_cliente', '$telefono_cli', '$direccion_cli')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCliente($id){
    $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCliente($data){
    $id_cliente = $data["id_cliente"];
    $nombre_cliente = $data["nombre_cliente"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_cliente = $data["ci_cliente"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("UPDATE cliente SET nombre_cliente='$nombre_cliente',ap_paterno_cli='$ap_paterno_cli',ap_materno_cli='$ap_materno_cli',ci_cliente='$ci_cliente',telefono_cli='$telefono_cli',direccion_cli='$direccion_cli' WHERE id_cliente=$id_cliente");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCliente($id){
    try{
      $Cliente=Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");
      $Cliente->execute();
    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
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