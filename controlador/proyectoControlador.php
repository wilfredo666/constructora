<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegProyecto" ||
    $ruta["query"] == "ctrEditProyecto" ||
    $ruta["query"] == "ctrEliProyecto"
  ) {
    $metodo = $ruta["query"];
    $Proyecto = new ControladorProyecto();
    $Proyecto->$metodo();
  }
}

class ControladorProyecto
{

  static public function ctrInfoProyectos()
  {
    $respuesta = ModeloProyecto::mdlInfoProyectos();
    return $respuesta;
  }

  static public function ctrRegProyecto()
  {
    require "../modelo/proyectoModelo.php";

    
    $data = array(
      "codProyecto" => $_POST["codProyecto"],
      "nomProyecto" => $_POST["nomProyecto"],
      "descProyecto" => $_POST["descProyecto"],
      "fechaProyecto" => $_POST["fechaProyecto"],
      "lugarProyecto" => $_POST["lugarProyecto"],
      "encargado" => $_POST["encargado"]
    );

    $respuesta = ModeloProyecto::mdlRegProyecto($data);
    echo $respuesta;
  }

  static public function ctrInfoProyecto($id)
  {
    $respuesta = ModeloProyecto::mdlInfoProyecto($id);
    return $respuesta;
  }

  static public function ctrEditProyecto()
  {
    require "../modelo/proyectoModelo.php";

    $data = array(
      "idProyecto" => $_POST["idProyecto"],
      "nomProyecto" => $_POST["nomProyecto"],
      "descProyecto" => $_POST["descProyecto"],
      "fechaProyecto" => $_POST["fechaProyecto"],
      "lugarProyecto" => $_POST["lugarProyecto"],
      "encargado" => $_POST["encargado"],
      "estadoProyecto" => $_POST["estadoProyecto"]
    );

    $respuesta = ModeloProyecto::mdlEditProyecto($data);
    echo $respuesta;
  }


  static public function ctrEliProyecto(){
    require "../modelo/proyectoModelo.php";

    $id=$_POST["id"];

    $respuesta = ModeloProyecto::mdlEliProyecto($id);
    echo $respuesta;

  }

  static public function ctrCantidadProyectos(){
    $respuesta = ModeloProyecto::mdlCantidadProyectos();
    return $respuesta;
  }

}
