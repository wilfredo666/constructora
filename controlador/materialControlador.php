<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegMaterial" ||
    $ruta["query"] == "ctrInfoMaterials" ||
    $ruta["query"] == "ctrEditMaterial" ||
    $ruta["query"] == "ctrEliMaterial" ||
    $ruta["query"] == "ctrRepClasificacion" ||
    $ruta["query"] == "ctrBusMaterial" ||
    $ruta["query"] == "ctrRegNotaIngreso" ||
    $ruta["query"] == "ctrInfoIngreso" ||
    $ruta["query"] == "ctrEliSalida" ||
    $ruta["query"] == "ctrEliIngreso" ||
    $ruta["query"] == "ctrRegNotaSalida" ||
    $ruta["query"] == "BusRepMaterial" ||
    $ruta["query"] == "ctrInfoSalida"
  ) {
    $metodo = $ruta["query"];
    $Material = new ControladorMaterial();
    $Material->$metodo();
  }
}


class ControladorMaterial
{

  static public function ctrInfoMateriales() //OK
  {
    $respuesta = ModeloMaterial::mdlInfoMateriales();
    return $respuesta;
  }

  static public function ctrRegMaterial()
  {
    require "../modelo/materialModelo.php";

    $imagen = $_FILES["ImgMaterial"];

    $nomImagen = $imagen["name"];
    $archImagen = $imagen["tmp_name"];

    move_uploaded_file($archImagen, "../assest/dist/img/material/" . $nomImagen);

    $data = array(
      "codMaterial" => $_POST["codMaterial"],
      "nomMaterial" => $_POST["nomMaterial"],
      "costoMaterial" => $_POST["costoMaterial"],
      "precioMaterial" => $_POST["precioMaterial"],
      "medidaMaterial" => $_POST["medidaMaterial"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "imgMaterial" => $nomImagen,
    );

    $respuesta = ModeloMaterial::mdlRegMaterial($data);

    echo $respuesta;
  }

  static public function ctrInfoMaterial($id)
  {
    $respuesta = ModeloMaterial::mdlInfoMaterial($id);
    return $respuesta;
  }

  static public function ctrEditMaterial()
  {
    require "../modelo/MaterialModelo.php";
    $imgProdActual = $_POST["imgActMaterial"];

    $imgMaterial = $_FILES["ImgMaterial"];

    if ($imgMaterial["name"] == "") {
      $imagen = $imgProdActual;
    } else {

      $imagen = $imgMaterial["name"];
      $archImagen = $imgMaterial["tmp_name"];

      move_uploaded_file($archImagen, "../assest/dist/img/material/" . $imagen);
    }

    $data = array(
      "idMaterial" => $_POST["idMaterial"],
      "codMaterial" => $_POST["codMaterial"],
      "nomMaterial" => $_POST["nomMaterial"],
      "costoMaterial" => $_POST["costoMaterial"],
      "precioMaterial" => $_POST["precioMaterial"],
      "medidaMaterial" => $_POST["medidaMaterial"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "ImgMaterial" => $imagen,
      "estadoMaterial" => $_POST["estadoMaterial"]
    );

    $respuesta = ModeloMaterial::mdlEditMaterial($data);

    echo $respuesta;
  }

  static public function ctrEliMaterial()
  {
    require "../modelo/materialModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloMaterial::mdlEliMaterial($data);

    echo $respuesta;
  }

  static public function ctrBusMaterial()
  {
    require "../modelo/materialModelo.php";
    $idMaterial = $_POST["idMaterial"];

    $respuesta = ModeloMaterial::mdlBusMaterial($idMaterial);

    echo json_encode($respuesta);
  }

  /* PARA NOTAS DE SALIDAS */
  static public function ctrRegNotaSalida()
  {
    session_start();
    require_once "../modelo/materialModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "codSalida" => $_POST["codSalida"],
      "conceptoSalida" => $_POST["conceptoSalida"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha,
      "materiales" => $_POST["materiales"],
      "codProyecto" => $_POST["codProyecto"],
      "solicitadoPor" => $_POST["solicitadoPor"]
    );

    $respuesta = ModeloMaterial::mdlRegNotaSalida($data);
    echo $respuesta;
  }

  static public function ctrRegNotaIngreso()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/materialModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $data = array(
      "fechaHora" => $fecha . " " . $hora,
      "codIngreso" => $_POST["codIngreso"],
      "usuario" => $_SESSION["idUsuario"],
      "conceptoIngreso" => $_POST["conceptoIngreso"],
      "materiales" => $_POST["materiales"],
      "codProyecto" => $_POST["codProyecto"],
      "provisionador" => $_POST["provisionador"]
    );

    $respuesta = ModeloMaterial::mdlRegNotaIngreso($data);
    echo $respuesta;
  }

  static public function ctrStockMaterial($id)
  {

    $respuesta=ModeloMaterial::mdlStockMaterial($id);
    return $respuesta;
  }

  static public function ctrCantidadMaterials()
  {
    $respuesta = ModeloMaterial::mdlCantidadMaterials();
    return $respuesta;
  }

  static public function ctrInfoSalidas()
  {
    $respuesta = ModeloMaterial::mdlInfoSalidas();
    return $respuesta;
  }

  static public function ctrInfoIngresos()
  {
    $respuesta = ModeloMaterial::mdlInfoIngresos();
    return $respuesta;
  }

  static public function ctrInfoIngreso($id)
  {
    $respuesta = ModeloMaterial::mdlInfoIngreso($id);
    return $respuesta;
  }

  static public function ctrInfoSalida($id)
  {
    $respuesta = ModeloMaterial::mdlInfoSalida($id);
    return $respuesta;
  }

  static public function ctrEliSalida()
  {
    require "../modelo/materialModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloMaterial::mdlEliSalida($id);
    echo $respuesta;
  }

  static public function ctrEliIngreso()
  {
    require "../modelo/materialModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloMaterial::mdlEliIngreso($id);
    echo $respuesta;
  }


  static public function ctrBuscarMaterial()
  {
    require "../modelo/MaterialModelo.php";
    $data = $_POST["id"];
    $respuesta = ModeloMaterial::mdlInfoMaterial($data);
    echo json_encode($respuesta);
  }

  static public function BusRepMaterial($data)
  {
    //require "../modelo/MaterialModelo.php";
    $data = array(
      "fechaInicio" => $data["fechaInicio"],
      "fechaFin" => $data["fechaFin"],
      "ingSal" => $data["ingSal"]
    );
    $respuesta = ModeloMaterial::BusRepMaterial($data);

    return $respuesta;
  }

  static public function ctrInfoCodClasificador()
  {
    $respuesta = ModeloMaterial::mdlInfoCodClasificador();
    return $respuesta;
  }
}
