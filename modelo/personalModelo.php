<?php 
require_once "conexion.php";
class ModeloPersonal{


  static public function mdlInformacionPersonal(){
    $stmt=Conexion::conectar()->prepare("select * from personal");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPersonal($data){
    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $depPersonal=$data["depPersonal"];
    $cargoPersonal=$data["cargoPersonal"];
    $telPersonal=$data["telPersonal"];
    $dirPersonal=$data["dirPersonal"];

    $stmt=Conexion::conectar()->prepare("insert into personal(ci_personal, ap_paterno, ap_materno, nombre, cargo, direccion, telefono, departamento) values('$ciPersonal', '$patPersonal', '$matPersonal',  '$nomPersonal', '$cargoPersonal', '$dirPersonal', '$telPersonal', '$depPersonal')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPersonal($id){
    $stmt=Conexion::conectar()->prepare("select * from personal where id_personal=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPersonal($data){
    $idPersonal=$data["idPersonal"];
    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $depPersonal=$data["depPersonal"];
    $cargoPersonal=$data["cargoPersonal"];
    $telPersonal=$data["telPersonal"];
    $dirPersonal=$data["dirPersonal"];
    $estadoPersonal=$data["estadoPersonal"];

    $stmt=Conexion::conectar()->prepare("update personal set nombre='$nomPersonal', ap_paterno='$patPersonal',  ap_materno='$matPersonal', ci_personal='$ciPersonal', departamento='$depPersonal', cargo='$cargoPersonal', direccion='$dirPersonal', telefono='$telPersonal', estado_personal='$estadoPersonal' where id_personal=$idPersonal");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPersonal($id){
    try{
      $personal=Conexion::conectar()->prepare("delete from personal where id_personal=$id");
      $personal->execute();
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