<?php
require_once "conexion.php";
class ModeloVenta
{


  static public function mdlInfoVentas() //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from venta 
    JOIN item ON item.desc_item=venta.detalle_venta 
    JOIN cliente ON cliente.id_cliente=venta.id_cliente
    JOIN proyecto ON proyecto.id_proyecto=venta.id_proyecto
    WHERE estado_venta=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoVenta($id){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM venta
    JOIN item ON item.desc_item=venta.detalle_venta 
    JOIN cliente ON cliente.id_cliente=venta.id_cliente
    JOIN proyecto ON proyecto.id_proyecto=venta.id_proyecto
    where id_venta=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegVenta($data) //ok
  {
    date_default_timezone_set('America/La_Paz');
    $fechaActual = date('Y-m-d'); 

    $codVenta = $data["codVenta"];
    $cliente = $data["cliente"];
    $idInmuebleBD = $data["idInmuebleBD"];
    $totalVenta = $data["totalVenta"];
    $acuenta = $data["acuenta"];
    $cuotas = $data["cuotas"];
    $fechaContrato = $data["fechaContrato"];
    $fechaVenta = $data["fechaVenta"];
    $fechaEntrega = $data["fechaEntrega"];
    $formaPago = $data["formaPago"];
    $archivoContrato = $data["archivoContrato"];
    $archivoPlano = $data["archivoPlano"];
    $observaciones = $data["observaciones"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO venta (fecha_venta, detalle_venta, id_cliente, id_proyecto, monto_contrato, archivo_plano, archivo_contrato, fecha_contrato, observaciones_venta, fecha_entrega, a_cuenta, nro_cuotas, forma_pago, fecha_emision_venta) 
        VALUES ('$fechaVenta', '$idInmuebleBD', '$cliente', '$codVenta', '$totalVenta', '$archivoPlano', '$archivoContrato', '$fechaContrato', '$observaciones', '$fechaEntrega', '$acuenta', '$cuotas', '$formaPago', '$fechaActual')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliVenta($id) //ok
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from venta where id_venta=$id");
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
