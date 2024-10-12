<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegInmueble" ||
    $ruta["query"] == "ctrEditInmueble" ||
    $ruta["query"] == "ctrEliInmueble" ||
    $ruta["query"] == "buscInmueble" 
  ) {
    $metodo = $ruta["query"];
    $Inmueble = new ControladorInmueble();
    $Inmueble->$metodo();
  }
}


class ControladorInmueble
{

  static public function ctrInformacionInmueble() //ok
  {
    $respuesta = ModeloInmueble::mdlInformacionInmueble();
    return $respuesta;
  }

  static public function ctrRegInmueble() //ok
  {
    require "../modelo/inmuebleModelo.php";

    $data = array(
      "cod_item" => $_POST["cod_item"],
      "desc_item" => $_POST["desc_item"],
      "clasificacion" => $_POST["clasificacion"],
    );

    $respuesta = ModeloInmueble::mdlRegInmueble($data);
    echo $respuesta;
  }

  static public function ctrInfoInmueble($id) //ok
  {
    $respuesta = ModeloInmueble::mdlInfoInmueble($id);
    return $respuesta;
  }

  static public function ctrEditInmueble() //ok
  {
    require "../modelo/inmuebleModelo.php";

    $data = array(
      "id_item" => $_POST["id_item"],
      "cod_item" => $_POST["cod_item"],
      "desc_item" => $_POST["desc_item"],
      "clasificacion" => $_POST["clasificacion"],
      "estado_item" => $_POST["estado_item"],
    );
    $respuesta = ModeloInmueble::mdlEditInmueble($data);
    echo $respuesta;
  }

  static public function ctrEliInmueble() //ok
  {
    require "../modelo/inmuebleModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloInmueble::mdlEliInmueble($id);
    echo $respuesta;
  }

  static public function buscInmueble(){
    require "../modelo/inmuebleModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloInmueble::mdlbuscInmueble($id);
    echo json_encode ($respuesta);
  }
}
