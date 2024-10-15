<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegAdquisicion" ||
    $ruta["query"] == "ctrInfoAdquisiciones" ||
    $ruta["query"] == "ctrEditAdquisicion" ||
    $ruta["query"] == "ctrEliAdquisicion"
  ) {
    $metodo = $ruta["query"];
    $Adquisicion = new ControladorAdquisicion();
    $Adquisicion->$metodo();
  }
}


class ControladorAdquisicion
{

  static public function ctrInfoAdquisiciones() //ok
  {
    $respuesta = ModeloAdquisicion::mdlInfoAdquisiciones();
    return $respuesta;
  }

  static public function ctrRegAdquisicion() //ok
  {
    require "../modelo/adquisicionModelo.php";

    $data = array(
      "idProveedor" => $_POST["idProveedor"],
      "fechaAdquisicion" => $_POST["fechaAdquisicion"],
      "fechaEntrega" => $_POST["fechaEntrega"],
      "descAdquisicion" => $_POST["descAdquisicion"],
    );

    $respuesta = ModeloAdquisicion::mdlRegAdquisicion($data);
    echo $respuesta;
  }

  static public function ctrInfoAdquisicion($id) //ok
  {
    $respuesta = ModeloAdquisicion::mdlInfoAdquisicion($id);
    return $respuesta;
  }

  static public function ctrEditAdquisicion() //ok
  {
    require "../modelo/AdquisicionModelo.php";
   
    $data = array(
      "idAdquisicion" => $_POST["idAdquisicion"],
      "idProveedor" => $_POST["idProveedor"],
      "fechaAdquisicion" => $_POST["fechaAdquisicion"],
      "fechaEntrega" => $_POST["fechaEntrega"],
      "descAdquisicion" => $_POST["descAdquisicion"],
    );

    $respuesta = ModeloAdquisicion::mdlEditAdquisicion($data);

    echo $respuesta;
  }

  static public function ctrEliAdquisicion() //ok
  {
    require "../modelo/adquisicionModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloAdquisicion::mdlEliAdquisicion($data);
    echo $respuesta;
  }
}
