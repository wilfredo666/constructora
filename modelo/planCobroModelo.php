<?php
require_once "conexion.php";
class ModeloPlanCobro
{

  static public function mdlInfoPlanCobros() //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from plan_cobro 
    JOIN venta ON venta.id_venta=plan_cobro.id_venta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPlanCobro($data) //ok
  {
    $id_venta = $data["id_venta"];
    $monto_cobro = $data["monto_cobro"];
    $fecha_cobro = $data["fecha_cobro"];
    $observacion_cobro = $data["observacion_cobro"];

    $stmt = Conexion::conectar()->prepare("insert into plan_cobro(id_venta, monto_cobro, fecha_cobro, observacion_cobro)values($id_venta, '$monto_cobro', '$fecha_cobro', '$observacion_cobro')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPlanCobro($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM plan_cobro
    JOIN venta ON venta.id_venta=plan_cobro.id_venta
    where id_plan_cobro=$id");
    
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPlanCobro($data) //ok
  {
    $idPlanCobro = $data["idPlanCobro"];
    $id_venta = $data["id_venta"];
    $monto_cobro = $data["monto_cobro"];
    $fecha_cobro = $data["fecha_cobro"];
    $observacion_cobro = $data["observacion_cobro"];

    $stmt = Conexion::conectar()->prepare("update plan_cobro set id_venta=$id_venta, monto_cobro='$monto_cobro', fecha_cobro='$fecha_cobro', observacion_cobro='$observacion_cobro' where id_plan_cobro=$idPlanCobro");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPlanCobro($id) //ok
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from plan_cobro where id_plan_cobro=$id");
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
