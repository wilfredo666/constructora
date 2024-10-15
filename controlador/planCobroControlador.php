<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegPlanCobro" ||
    $ruta["query"] == "ctrInfoPlanCobros" ||
    $ruta["query"] == "ctrEditPlanCobro" ||
    $ruta["query"] == "ctrEliPlanCobro"
  ) {
    $metodo = $ruta["query"];
    $PlanCobro = new ControladorPlanCobro();
    $PlanCobro->$metodo();
  }
}


class ControladorPlanCobro
{

  static public function ctrInfoPlanCobros() //ok
  {
    $respuesta = ModeloPlanCobro::mdlInfoPlanCobros();
    return $respuesta;
  }

  static public function ctrRegPlanCobro() //ok
  {
    require "../modelo/planCobroModelo.php";

    $data = array(
      "id_venta" => $_POST["id_venta"],
      "monto_cobro" => $_POST["monto_cobro"],
      "fecha_cobro" => $_POST["fecha_cobro"],
      "observacion_cobro" => $_POST["observacion_cobro"],
    );

    $respuesta = ModeloPlanCobro::mdlRegPlanCobro($data);
    echo $respuesta;
  }

  static public function ctrInfoPlanCobro($id) //ok
  {
    $respuesta = ModeloPlanCobro::mdlInfoPlanCobro($id);
    return $respuesta;
  }

  static public function ctrEditPlanCobro() //ok
  {
    require "../modelo/planCobroModelo.php";

    $data = array(
      "idPlanCobro" => $_POST["idPlanCobro"],
      "id_venta" => $_POST["id_venta"],
      "monto_cobro" => $_POST["monto_cobro"],
      "fecha_cobro" => $_POST["fecha_cobro"],
      "observacion_cobro" => $_POST["observacion_cobro"],
    );

    $respuesta = ModeloPlanCobro::mdlEditPlanCobro($data);
    echo $respuesta;
  }

  static public function ctrEliPlanCobro() //ok
  {
    require "../modelo/planCobroModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloPlanCobro::mdlEliPlanCobro($data);
    echo $respuesta;
  }
}
