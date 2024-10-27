<?php
require_once "conexion.php";
class ModeloHerramienta
{

  static public function mdlInfoHerramientas() //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from herramienta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHerramienta($data) //ok
  {
    $codHerramienta = $data["codHerramienta"];
    $cod_clasificador = $data["cod_clasificador"];
    $valorHerramienta = $data["valorHerramienta"];
    $costoHerramienta = $data["costoHerramienta"];
    $descHerramienta = $data["descHerramienta"];
    $ImgHerramienta = $data["ImgHerramienta"];

    $stmt = Conexion::conectar()->prepare("insert into herramienta(cod_herramienta, desc_herramienta, valor_herramienta, costo_herramienta, img_herramienta, cod_clasificacion_her)values('$codHerramienta', '$descHerramienta', '$valorHerramienta', '$costoHerramienta', '$ImgHerramienta', '$cod_clasificador')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoHerramienta($id) //ok
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM herramienta where id_herramienta=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHerramienta($data) //ok
  {
    $idHerramienta = $data["idHerramienta"];
    $codHerramienta = $data["codHerramienta"];
    $cod_clasificador = $data["cod_clasificador"];
    $valorHerramienta = $data["valorHerramienta"];
    $costoHerramienta = $data["costoHerramienta"];
    $descHerramienta = $data["descHerramienta"];
    $ImgHerramienta = $data["ImgHerramienta"];
    $estadoHerramienta = $data["estadoHerramienta"];

    $stmt = Conexion::conectar()->prepare("update herramienta set cod_herramienta='$codHerramienta', desc_herramienta='$descHerramienta', valor_herramienta='$valorHerramienta', costo_herramienta='$costoHerramienta', cod_clasificacion_her='$cod_clasificador', img_herramienta='$ImgHerramienta', estado_herramienta='$estadoHerramienta' where id_herramienta=$idHerramienta");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliHerramienta($id) //ok
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from herramienta where id_herramienta=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusHerramienta($idHerramienta) //ok
  {
    $stmt = Conexion::conectar()->prepare("select * from herramienta where id_herramienta=$idHerramienta");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaIngresoHerramientas($data) //ok
  {
    $codIngreso = $data["codIngreso"];
    $conceptoIngreso = $data["conceptoIngreso"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $herramientas = $data["herramientas"];
    $codProyecto = $data["codProyecto"];
    $provisionador = $data["provisionador"];

    $stmt = Conexion::conectar()->prepare("insert into ingreso_herramienta(cod_ingreso_herra, entregado_por_herra, id_usuario, descripcion_herra, detalle_ingreso_herra, cod_proyecto, fecha_ingreso_herra) values('NIH-$codIngreso',$provisionador, $usuario, '$conceptoIngreso', '$herramientas', '$codProyecto', '$fechaHora')");

    if ($stmt->execute()) {
      $herramientas2 = json_decode($data["herramientas"], true);

      $codIngreso = $data["codIngreso"];
      //registrar en la bd - tabla ingreso stock herramientas
      for ($i = 0; $i < count($herramientas2); $i++) {
        $idHerramienta = $herramientas2[$i]["idHerramienta"];
        $cantHerramienta = $herramientas2[$i]["cantHerramienta"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock_herra(id_herramienta, cantidad_h, cod_ingreso_h) values($idHerramienta, $cantHerramienta, 'NIH-$codIngreso')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaIngreso($data)
  {
    $codIngreso = $data["codIngreso"];
    $conceptoIngreso = $data["conceptoIngreso"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $materiales = $data["materiales"];
    $codProyecto = $data["codProyecto"];
    $provisionador = $data["provisionador"];

    $stmt = Conexion::conectar()->prepare("insert into ingreso_material(fecha_ingreso, cod_ingreso , entregado_por, id_usuario , descripcion, detalle_ingreso, cod_proyecto) values('$fechaHora', 'NI-$codIngreso', $provisionador, $usuario, '$conceptoIngreso', '$materiales', '$codProyecto')");

    if ($stmt->execute()) {

      $materiales = json_decode($data["materiales"], true);

      //registrar en la bd - tabla ingreso stock
      for ($i = 0; $i < count($materiales); $i++) {
        $idMaterial = $materiales[$i]["idMaterial"];
        $cantMaterial = $materiales[$i]["cantMaterial"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_material, cantidad, cod_ingreso) values($idMaterial, $cantMaterial, 'NI-$codIngreso')");
        $ingreso_sql->execute();
      }

      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngresosHerramienta()
  { //ok
    $stmt = Conexion::conectar()->prepare("select * from ingreso_herramienta");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngresoHerramienta($id)
  { //ok
    $stmt = Conexion::conectar()->prepare("SELECT cod_ingreso_herra, cod_proyecto, fecha_ingreso_herra, descripcion_herra, usuario.nombre AS nomUsuario, personal.nombre AS nomPersonal, personal.ap_paterno AS ap_paterno, personal.ap_materno AS ap_materno, detalle_ingreso_herra FROM ingreso_herramienta 
    JOIN personal ON personal.id_personal=ingreso_herramienta.entregado_por_herra 
    JOIN usuario ON usuario.id_usuario=ingreso_herramienta.id_usuario WHERE id_ingreso_herra=$id");

    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliIngresoHerra($id)
  { //ok
    try {
      $stmt = Conexion::conectar()->prepare("delete from ingreso_herramienta where id_ingreso_herra=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }
    return "ok";
    $stmt->close();
    $stmt->null;
  }

  //SALIDA DE HERRAMIENTAS
  static public function mdlRegNotaSalidaHerramientas($data) //ok
  {
    $codSalidaH = $data["codSalidaH"];
    $conceptoSalidaH = $data["conceptoSalidaH"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $herramientas = $data["herramientas"];
    $codProyecto = $data["codProyecto"];
    $solicitadoPor = $data["solicitadoPor"];

    $stmt = Conexion::conectar()->prepare("insert into salida_herramienta(cod_salida_herra, solicitado_por, id_usuario, descripcion_herra, detalle_salida_herra, cod_proyecto, fecha_salida) values('NSH-$codSalidaH',$solicitadoPor, $usuario, '$conceptoSalidaH', '$herramientas', '$codProyecto', '$fechaHora')");

    if ($stmt->execute()) {
      $herramientas2 = json_decode($data["herramientas"], true);

      $codSalidaH = $data["codSalidaH"];
      //registrar en la bd - tabla SALIDA stock herramientas
      for ($i = 0; $i < count($herramientas2); $i++) {
        $idHerramienta = $herramientas2[$i]["idHerramienta"];
        $cantHerramienta = $herramientas2[$i]["cantHerramienta"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into salida_stock_herra(id_herramienta_h, cantidad_h, cod_salida_h) values($idHerramienta, $cantHerramienta, 'NSH-$codSalidaH')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }
}
