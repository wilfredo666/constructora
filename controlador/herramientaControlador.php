<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegHerramienta" ||
    $ruta["query"] == "ctrInfoHerramientas" ||
    $ruta["query"] == "ctrEditHerramienta" ||
    $ruta["query"] == "ctrBusHerramienta" ||
    $ruta["query"] == "ctrRegNotaIngresoHerramienta" ||
    $ruta["query"] == "ctrEliIngresoHerra" ||
    $ruta["query"] == "ctrEliHerramienta"
  ) {
    $metodo = $ruta["query"];
    $Herramienta = new ControladorHerramienta();
    $Herramienta->$metodo();
  }
}


class ControladorHerramienta
{

  static public function ctrInfoHerramientas() //ok
  {
    $respuesta = ModeloHerramienta::mdlInfoHerramientas();
    return $respuesta;
  }

  static public function ctrRegHerramienta() //ok
  {
    require "../modelo/herramientaModelo.php";

    $imagen = $_FILES["ImgHerramienta"];

    $nomImagen = $imagen["name"];
    $archImagen = $imagen["tmp_name"];
    move_uploaded_file($archImagen, "../assest/dist/img/herramienta/" . $nomImagen);

    $data = array(
      "codHerramienta" => $_POST["codHerramienta"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "valorHerramienta" => $_POST["valorHerramienta"],
      "costoHerramienta" => $_POST["costoHerramienta"],
      "descHerramienta" => $_POST["descHerramienta"],
      "ImgHerramienta" => $nomImagen,
    );

    $respuesta = ModeloHerramienta::mdlRegHerramienta($data);
    echo $respuesta;
  }

  static public function ctrInfoHerramienta($id) //ok
  {
    $respuesta = ModeloHerramienta::mdlInfoHerramienta($id);
    return $respuesta;
  }

  static public function ctrEditHerramienta() //ok
  {
    require "../modelo/herramientaModelo.php";
    $imgProdActual = $_POST["imgActHerramienta"];

    $imgHerramienta = $_FILES["ImgHerramienta"];

    if ($imgHerramienta["name"] == "") {
      $imagen = $imgProdActual;
    } else {

      $imagen = $imgHerramienta["name"];
      $archImagen = $imgHerramienta["tmp_name"];

      move_uploaded_file($archImagen, "../assest/dist/img/herramienta/" . $imagen);
    }

    $data = array(
      "idHerramienta" => $_POST["idHerramienta"],
      "codHerramienta" => $_POST["codHerramienta"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "valorHerramienta" => $_POST["valorHerramienta"],
      "costoHerramienta" => $_POST["costoHerramienta"],
      "descHerramienta" => $_POST["descHerramienta"],
      "ImgHerramienta" => $imagen,
      "estadoHerramienta" => $_POST["estadoHerramienta"]
    );

    $respuesta = ModeloHerramienta::mdlEditHerramienta($data);

    echo $respuesta;
  }

  static public function ctrEliHerramienta() //ok
  {
    require "../modelo/herramientaModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloHerramienta::mdlEliHerramienta($data);

    echo $respuesta;
  }

  static public function ctrBusHerramienta()
  {
    require "../modelo/herramientaModelo.php";
    $idHerramienta = $_POST["idHerramienta"];

    $respuesta = ModeloHerramienta::mdlBusHerramienta($idHerramienta);
    echo json_encode($respuesta);
  }

  static public function ctrRegNotaIngresoHerramienta() //ok
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/herramientaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $data = array(
      "fechaHora" => $fecha,
      "codIngreso" => $_POST["codIngreso"],
      "usuario" => $_SESSION["idUsuario"],
      "conceptoIngreso" => $_POST["conceptoIngreso"],
      "herramientas" => $_POST["herramientas"],
      "codProyecto" => $_POST["codProyecto"],
      "provisionador" => $_POST["provisionador"]
    );

    $respuesta = ModeloHerramienta::mdlRegNotaIngresoHerramientas($data);
    echo $respuesta;
  }

  static public function ctrInfoIngresosHerramienta()
  {
    $respuesta = ModeloHerramienta::mdlInfoIngresosHerramienta();
    return $respuesta;
  }

  static public function ctrInfoIngresoHerramienta($id)
  {
    $respuesta = ModeloHerramienta::mdlInfoIngresoHerramienta($id);
    return $respuesta;
  }

  // ELIMINACION
  static public function ctrEliIngresoHerra()
  {
    require "../modelo/herramientaModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloHerramienta::mdlEliIngresoHerra($id);
    echo $respuesta;
  }
}
