<?php
require_once "conexion.php";
class ModeloVenta
{


  /* static public function mdlInformacionVenta() 
  {
    $stmt = Conexion::conectar()->prepare("select * from item");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  } */

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


}
