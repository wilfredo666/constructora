<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegContrato" ||
    $ruta["query"] == "ctrEditContrato" ||
    $ruta["query"] == "ctrEliContrato"
  ) {
    $metodo = $ruta["query"];
    $Contrato = new ControladorContrato();
    $Contrato->$metodo();
  }
}


class ControladorContrato
{

  static public function ctrInformacionContrato()
  {
    $respuesta = ModeloContrato::mdlInformacionContrato();
    return $respuesta;
  }

  static public function ctrRegContrato()
  {
    require "../modelo/ContratoModelo.php";

    $data = array(
      "nombre_Contrato" => $_POST["nombre_Contrato"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_Contrato" => $_POST["ci_Contrato"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );

    $respuesta = ModeloContrato::mdlRegContrato($data);
    echo $respuesta;
  }

  static public function ctrInfoContrato($id)
  {
    $respuesta = ModeloContrato::mdlInfoContrato($id);
    return $respuesta;
  }

  static public function ctrEditContrato()
  {
    require "../modelo/ContratoModelo.php";

    $data = array(
      "id_Contrato" => $_POST["id_Contrato"],
      "nombre_Contrato" => $_POST["nombre_Contrato"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_Contrato" => $_POST["ci_Contrato"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );
    $respuesta = ModeloContrato::mdlEditContrato($data);
    echo $respuesta;
  }

  static public function ctrEliContrato()
  {
    require "../modelo/ContratoModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloContrato::mdlEliContrato($id);
    echo $respuesta;
  }
}
