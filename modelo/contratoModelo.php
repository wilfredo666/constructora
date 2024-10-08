<?php 
require_once "conexion.php";
class ModeloContrato{


  static public function mdlInformacionContrato(){
    $stmt=Conexion::conectar()->prepare("SELECT id_contrato, cod_contrato, fecha_contrato, estado_contrato, nombre_cliente, ap_paterno_cli, ap_materno_cli FROM contrato JOIN cliente ON cliente.id_cliente=contrato.id_cliente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegContrato($data){

    $nombre_Contrato = $data["nombre_Contrato"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_Contrato = $data["ci_Contrato"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("INSERT INTO Contrato (nombre_Contrato, ap_paterno_cli, ap_materno_cli, ci_Contrato, telefono_cli, direccion_cli) 
        VALUES ('$nombre_Contrato', '$ap_paterno_cli', '$ap_materno_cli', '$ci_Contrato', '$telefono_cli', '$direccion_cli')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoContrato($id){
    $stmt=Conexion::conectar()->prepare("select * from Contrato where id_Contrato=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditContrato($data){
    $id_Contrato = $data["id_Contrato"];
    $nombre_Contrato = $data["nombre_Contrato"];
    $ap_paterno_cli = $data["ap_paterno_cli"];
    $ap_materno_cli = $data["ap_materno_cli"];
    $ci_Contrato = $data["ci_Contrato"];
    $telefono_cli = $data["telefono_cli"];
    $direccion_cli = $data["direccion_cli"];

    $stmt=Conexion::conectar()->prepare("UPDATE Contrato SET nombre_Contrato='$nombre_Contrato',ap_paterno_cli='$ap_paterno_cli',ap_materno_cli='$ap_materno_cli',ci_Contrato='$ci_Contrato',telefono_cli='$telefono_cli',direccion_cli='$direccion_cli' WHERE id_Contrato=$id_Contrato");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliContrato($id){
    try{
      $Contrato=Conexion::conectar()->prepare("delete from Contrato where id_Contrato=$id");
      $Contrato->execute();
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