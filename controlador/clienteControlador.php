<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegCliente" ||
    $ruta["query"] == "ctrEditCliente" ||
    $ruta["query"] == "ctrEliCliente"
  ) {
    $metodo = $ruta["query"];
    $Cliente = new ControladorCliente();
    $Cliente->$metodo();
  }
}


class ControladorCliente
{

  static public function ctrInformacionCliente()
  {
    $respuesta = ModeloCliente::mdlInformacionCliente();
    return $respuesta;
  }

  static public function ctrRegCliente()
  {
    require "../modelo/clienteModelo.php";

    $data = array(
      "nombre_cliente" => $_POST["nombre_cliente"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_cliente" => $_POST["ci_cliente"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );

    $respuesta = ModeloCliente::mdlRegCliente($data);
    echo $respuesta;
  }

  static public function ctrInfoCliente($id)
  {
    $respuesta = ModeloCliente::mdlInfoCliente($id);
    return $respuesta;
  }

  static public function ctrEditCliente()
  {
    require "../modelo/clienteModelo.php";

    $data = array(
      "id_cliente" => $_POST["id_cliente"],
      "nombre_cliente" => $_POST["nombre_cliente"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_cliente" => $_POST["ci_cliente"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );
    $respuesta = ModeloCliente::mdlEditCliente($data);
    echo $respuesta;
  }

  static public function ctrEliCliente()
  {
    require "../modelo/clienteModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloCliente::mdlEliCliente($id);
    echo $respuesta;
  }
}
