<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegHerramienta" ||
    $ruta["query"] == "ctrInfoHerramientas" ||
    $ruta["query"] == "ctrEditHerramienta" ||
    $ruta["query"] == "ctrEliHerramienta" ||
    $ruta["query"] == "ctrRepClasificacion" ||
    $ruta["query"] == "ctrBusHerramienta" ||
    $ruta["query"] == "ctrRegNotaIngreso" ||
    $ruta["query"] == "ctrInfoIngreso" ||
    $ruta["query"] == "ctrRegNotaSalida" ||
    $ruta["query"] == "ctrEliSalida" ||
    $ruta["query"] == "ctrEliIngreso" ||
    $ruta["query"] == "ctrRegNotaSalida" ||
    $ruta["query"] == "BusRepHerramienta" ||
    $ruta["query"] == "ctrInfoSalida"
  ) {
    $metodo = $ruta["query"];
    $Herramienta = new ControladorHerramienta();
    $Herramienta->$metodo();
  }
}


class ControladorHerramienta
{

  static public function ctrInfoHerramientas()
  {
    $respuesta = ModeloHerramienta::mdlInfoHerramientas();
    return $respuesta;
  }

  static public function ctrRegHerramienta()
  {
    require "../modelo/HerramientaModelo.php";

    $imagen = $_FILES["ImgHerramienta"];

    $nomImagen = $imagen["name"];
    $archImagen = $imagen["tmp_name"];

    move_uploaded_file($archImagen, "../assest/dist/img/Herramienta/" . $nomImagen);

    $data = array(
      "codHerramienta" => $_POST["codHerramienta"],
      "nomHerramienta" => $_POST["nomHerramienta"],
      "costoHerramienta" => $_POST["costoHerramienta"],
      "precioHerramienta" => $_POST["precioHerramienta"],
      "medidaHerramienta" => $_POST["medidaHerramienta"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "imgHerramienta" => $nomImagen,
    );

    $respuesta = ModeloHerramienta::mdlRegHerramienta($data);

    echo $respuesta;
  }

  static public function ctrInfoHerramienta($id)
  {
    $respuesta = ModeloHerramienta::mdlInfoHerramienta($id);
    return $respuesta;
  }

  static public function ctrEditHerramienta()
  {
    require "../modelo/HerramientaModelo.php";
    $imgProdActual = $_POST["imgActHerramienta"];

    $imgHerramienta = $_FILES["ImgHerramienta"];

    if ($imgHerramienta["name"] == "") {
      $imagen = $imgProdActual;
    } else {

      $imagen = $imgHerramienta["name"];
      $archImagen = $imgHerramienta["tmp_name"];

      move_uploaded_file($archImagen, "../assest/dist/img/Herramienta/" . $imagen);
    }

    $data = array(
      "idHerramienta" => $_POST["idHerramienta"],
      "codHerramienta" => $_POST["codHerramienta"],
      "nomHerramienta" => $_POST["nomHerramienta"],
      "costoHerramienta" => $_POST["costoHerramienta"],
      "precioHerramienta" => $_POST["precioHerramienta"],
      "medidaHerramienta" => $_POST["medidaHerramienta"],
      "cod_clasificador" => $_POST["cod_clasificador"],
      "ImgHerramienta" => $imagen,
      "estadoHerramienta" => $_POST["estadoHerramienta"]
    );

    $respuesta = ModeloHerramienta::mdlEditHerramienta($data);

    echo $respuesta;
  }

  static public function ctrEliHerramienta()
  {
    require "../modelo/HerramientaModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloHerramienta::mdlEliHerramienta($data);

    echo $respuesta;
  }

  static public function ctrBusHerramienta()
  {
    require "../modelo/HerramientaModelo.php";
    $idHerramienta = $_POST["idHerramienta"];

    $respuesta = ModeloHerramienta::mdlBusHerramienta($idHerramienta);

    echo json_encode($respuesta);
  }

  /* PARA NOTAS DE SALIDAS */
  static public function ctrRegNotaSalida()
  {
    session_start();
    require_once "../modelo/HerramientaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "codSalida" => $_POST["codSalida"],
      "conceptoSalida" => $_POST["conceptoSalida"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha . " " . $hora,
      "Herramientaes" => $_POST["Herramientaes"],
      "codProyecto" => $_POST["codProyecto"],
      "solicitante" => $_POST["solicitante"]
    );
    $respuesta = ModeloHerramienta::mdlRegNotaSalida($data);

    echo $respuesta;
  }

  static public function ctrRegNotaIngreso()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/HerramientaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $data = array(
      "fechaHora" => $fecha . " " . $hora,
      "codIngreso" => $_POST["codIngreso"],
      "usuario" => $_SESSION["idUsuario"],
      "conceptoIngreso" => $_POST["conceptoIngreso"],
      "Herramientaes" => $_POST["Herramientaes"],
      "codProyecto" => $_POST["codProyecto"],
      "provisionador" => $_POST["provisionador"]
    );

    $respuesta = ModeloHerramienta::mdlRegNotaIngreso($data);
    echo $respuesta;
  }

  static public function ctrStockHerramienta($id)
  {
    $respuesta = ModeloHerramienta::mdlStockHerramienta($id);
    return $respuesta;
  }

  static public function ctrCantidadHerramientas()
  {
    $respuesta = ModeloHerramienta::mdlCantidadHerramientas();
    return $respuesta;
  }

  static public function ctrInfoSalidas(){
    $respuesta = ModeloHerramienta::mdlInfoSalidas();
    return $respuesta;
  }

  static public function ctrInfoIngresos(){
    $respuesta = ModeloHerramienta::mdlInfoIngresos();
    return $respuesta;
  }

  static public function ctrInfoIngreso($id){
    $respuesta = ModeloHerramienta::mdlInfoIngreso($id);
    return $respuesta;
  }

  static public function ctrInfoSalida($id){
    $respuesta = ModeloHerramienta::mdlInfoSalida($id);
    return $respuesta;
  }

  static public function ctrEliSalida(){
    require "../modelo/HerramientaModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloHerramienta::mdlEliSalida($id);
    echo $respuesta;
  }

  static public function ctrEliIngreso(){
    require "../modelo/HerramientaModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloHerramienta::mdlEliIngreso($id);
    echo $respuesta;
  }


  static public function ctrBuscarHerramienta()
  {
    require "../modelo/HerramientaModelo.php";
    $data = $_POST["id"];
    $respuesta = ModeloHerramienta::mdlInfoHerramienta($data);
    echo json_encode($respuesta);
  }

  static public function BusRepHerramienta($data){
    //require "../modelo/HerramientaModelo.php";
    $data = array(
      "fechaInicio"=>$data["fechaInicio"],
      "fechaFin"=> $data["fechaFin"],
      "ingSal"=> $data["ingSal"]
    );
    $respuesta = ModeloHerramienta::BusRepHerramienta($data);

    return $respuesta;
  }

  static public function ctrInfoCodClasificador()
  {
    $respuesta = ModeloHerramienta::mdlInfoCodClasificador();
    return $respuesta;
  }
}
