<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegVenta" ||
    $ruta["query"] == "ctrEditVenta" ||
    $ruta["query"] == "ctrEliVenta" ||
    $ruta["query"] == "buscVenta" 
  ) {
    $metodo = $ruta["query"];
    $Venta = new ControladorVenta();
    $Venta->$metodo();
  }
}


class ControladorVenta
{

  static public function ctrInfoVentas() //ok
  {
    $respuesta = ModeloVenta::mdlInfoVentas();
    return $respuesta;
  }

  static public function ctrRegVenta() //ok
  {
    require "../modelo/ventaModelo.php";

    $archivoContrato = $_FILES["archivoContrato"];

    $nomContrato = $archivoContrato["name"];
    $archContrato = $archivoContrato["tmp_name"];
    move_uploaded_file($archContrato, "../assest/dist/img/archivos/" . $nomContrato);

    $archivoPlano = $_FILES["archivoPlano"];

    $nomPlano = $archivoPlano["name"];
    $archPlano = $archivoPlano["tmp_name"];
    move_uploaded_file($archPlano, "../assest/dist/img/archivos/" . $nomPlano);

    $data = array(
      "codVenta" => $_POST["codVenta"],
      "cliente" => $_POST["cliente"],
      "idInmuebleBD" => $_POST["nomVentaBD"],
      "totalVenta" => $_POST["totalVenta"],
      "acuenta" => $_POST["acuenta"],
      "cuotas" => $_POST["cuotas"],
      "fechaContrato" => $_POST["fechaContrato"],
      "fechaVenta" => $_POST["fechaVenta"],
      "fechaEntrega" => $_POST["fechaEntrega"],
      "formaPago" => $_POST["formaPago"],
      "archivoContrato" => $nomContrato,
      "archivoPlano" => $nomPlano,
      "observaciones" => $_POST["observaciones"],
    ); 

    $respuesta = ModeloVenta::mdlRegVenta($data);
    echo $respuesta;
  }

  
  static public function ctrInfoVenta($id) //ok
  {
    $respuesta = ModeloVenta::mdlInfoVenta($id);
    return $respuesta;
  }

  
  static public function ctrEliVenta() //ok
  {
    require "../modelo/ventaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloVenta::mdlEliVenta($id);
    echo $respuesta;
  }

 
}
