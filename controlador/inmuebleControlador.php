<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegInmueble" ||
    $ruta["query"] == "ctrEditInmueble" ||
    $ruta["query"] == "ctrEliInmueble"
  ) {
    $metodo = $ruta["query"];
    $Inmueble = new ControladorInmueble();
    $Inmueble->$metodo();
  }
}


class ControladorInmueble
{

  static public function ctrInformacionInmueble()
  {
    $respuesta = ModeloInmueble::mdlInformacionInmueble();
    return $respuesta;
  }

  static public function ctrRegInmueble()
  {
    require "../modelo/InmuebleModelo.php";

    $data = array(
      "nombre_Inmueble" => $_POST["nombre_Inmueble"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_Inmueble" => $_POST["ci_Inmueble"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );

    $respuesta = ModeloInmueble::mdlRegInmueble($data);
    echo $respuesta;
  }

  static public function ctrInfoInmueble($id)
  {
    $respuesta = ModeloInmueble::mdlInfoInmueble($id);
    return $respuesta;
  }

  static public function ctrEditInmueble()
  {
    require "../modelo/InmuebleModelo.php";

    $data = array(
      "id_Inmueble" => $_POST["id_Inmueble"],
      "nombre_Inmueble" => $_POST["nombre_Inmueble"],
      "ap_paterno_cli" => $_POST["ap_paterno_cli"],
      "ap_materno_cli" => $_POST["ap_materno_cli"],
      "ci_Inmueble" => $_POST["ci_Inmueble"],
      "telefono_cli" => $_POST["telefono_cli"],
      "direccion_cli" => $_POST["direccion_cli"]
    );
    $respuesta = ModeloInmueble::mdlEditInmueble($data);
    echo $respuesta;
  }

  static public function ctrEliInmueble()
  {
    require "../modelo/InmuebleModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloInmueble::mdlEliInmueble($id);
    echo $respuesta;
  }
}
