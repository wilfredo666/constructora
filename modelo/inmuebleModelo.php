<?php 
require_once "conexion.php";
class ModeloInmueble{


  static public function mdlInformacionInmueble(){
    $stmt=Conexion::conectar()->prepare("select * from item");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegInmueble($data){

    $nombre_Inmueble = $data["nombre_Inmueble"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_Inmueble = $data["ci_Inmueble"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("INSERT INTO Inmueble (nombre_Inmueble, ap_paterno_cli, ap_materno_cli, ci_Inmueble, telefono_cli, direccion_cli) 
        VALUES ('$nombre_Inmueble', '$ap_paterno_cli', '$ap_materno_cli', '$ci_Inmueble', '$telefono_cli', '$direccion_cli')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoInmueble($id){
    $stmt=Conexion::conectar()->prepare("select * from Inmueble where id_Inmueble=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditInmueble($data){
    $id_Inmueble = $data["id_Inmueble"];
    $nombre_Inmueble = $data["nombre_Inmueble"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_Inmueble = $data["ci_Inmueble"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("UPDATE Inmueble SET nombre_Inmueble='$nombre_Inmueble',ap_paterno_cli='$ap_paterno_cli',ap_materno_cli='$ap_materno_cli',ci_Inmueble='$ci_Inmueble',telefono_cli='$telefono_cli',direccion_cli='$direccion_cli' WHERE id_Inmueble=$id_Inmueble");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliInmueble($id){
    try{
      $Inmueble=Conexion::conectar()->prepare("delete from Inmueble where id_Inmueble=$id");
      $Inmueble->execute();
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