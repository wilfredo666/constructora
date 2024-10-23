<?php
require_once "conexion.php";
class ModeloMaterial
{


  static public function mdlInfoMateriales()
  {
    $stmt = Conexion::conectar()->prepare("select * from material");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlTotMaterial($id)
  {
    //$totFactura=Conexion::conectar()->prepare("select ")
  }

  static public function mdlRegMaterial($data)
  {
    $codMaterial = $data["codMaterial"];
    $nomMaterial = $data["nomMaterial"];
    $costoMaterial = $data["costoMaterial"];
    $precioMaterial = $data["precioMaterial"];
    $medidaMaterial = $data["medidaMaterial"];
    $cod_clasificador = $data["cod_clasificador"];
    $imgMaterial = $data["imgMaterial"];

    $stmt = Conexion::conectar()->prepare("insert into material(cod_material, desc_material, unidad, valor_unidad, costo_material, img_material, cod_clasificador)values('$codMaterial', '$nomMaterial', '$medidaMaterial', '$precioMaterial', '$costoMaterial', '$imgMaterial', '$cod_clasificador')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMaterial($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT id_material, cod_material, desc_material, unidad, valor_unidad, costo_material, img_material, estado_material, material.cod_clasificador, descripcion FROM material JOIN codigo_material ON codigo_material.cod_clasificador=material.cod_clasificador where id_material=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditMaterial($data)
  {

    $idMaterial = $data["idMaterial"];
    $codMaterial = $data["codMaterial"];
    $nomMaterial = $data["nomMaterial"];
    $costoMaterial = $data["costoMaterial"];
    $precioMaterial = $data["precioMaterial"];
    $medidaMaterial = $data["medidaMaterial"];
    $cod_clasificador = $data["cod_clasificador"];
    $ImgMaterial = $data["ImgMaterial"];
    $estadoMaterial = $data["estadoMaterial"];

    $stmt = Conexion::conectar()->prepare("update material set cod_material='$codMaterial', desc_material='$nomMaterial', unidad='$medidaMaterial', costo_material='$costoMaterial', valor_unidad='$precioMaterial', img_material='$ImgMaterial', estado_material='$estadoMaterial', cod_clasificador='$cod_clasificador' where id_material=$idMaterial");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliMaterial($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from material where id_material=$id");
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

  static public function mdlEliSalida($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from salida_material where id_salida=$id");
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

  static public function mdlEliIngreso($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from ingreso_material where id_ingreso=$id");
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

  static public function mdlBusMaterial($idMaterial)
  {
    $stmt = Conexion::conectar()->prepare("select * from material where id_material='$idMaterial'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaSalida($data)
  {

    $codSalida = $data["codSalida"];
    $conceptoSalida = $data["conceptoSalida"];
    $fechaHora = $data["fechaHora"];
    $materiales = $data["materiales"];
    $usuario = $data["usuario"];
    $codProyecto = $data["codProyecto"];
    $solicitadoPor = $data["solicitadoPor"];

    $stmt = Conexion::conectar()->prepare("insert into salida_material(fecha_salida, cod_salida, solicitado_por, id_usuario, descripcion, detalle_salida, cod_proyecto) values('$fechaHora', 'NS-$codSalida', $solicitante, $usuario, '$conceptoSalida', '$materiales', '$codProyecto')");

    if ($stmt->execute()) {
      //transformar de json a array
      $salMateriales = json_decode($data["materiales"], true);

      //registrar en la bd - tabla salida stock
      for ($i = 0; $i < count($salMateriales); $i++) {
        $idMaterial = $salMateriales[$i]["idMaterial"];
        $cantMaterial = $salMateriales[$i]["cantMaterial"];

        $salida_sql = Conexion::conectar()->prepare("insert into salida_stock(id_material, cantidad, cod_salida) values($idMaterial, $cantMaterial, 'NS-$codSalida')");

        $salida_sql->execute();
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

      //transformar de json a array
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

  static public function mdlCantidadMaterials()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as Material from Material");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngresos()
  {
    $stmt = Conexion::conectar()->prepare("select * from ingreso_material");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngreso($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT fecha_ingreso, cod_ingreso, personal.nombre AS nomPersonal, ap_paterno, ap_materno, descripcion, detalle_ingreso, cod_proyecto, usuario.nombre AS nomUsuario FROM ingreso_material JOIN personal ON personal.id_personal=ingreso_material.entregado_por JOIN usuario ON usuario.id_usuario=ingreso_material.id_usuario WHERE id_ingreso=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoSalidas()
  {
    $stmt = Conexion::conectar()->prepare("select * from salida_material");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoSalida($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT fecha_salida, cod_salida, personal.nombre AS nomPersonal, ap_paterno, ap_materno, descripcion, detalle_salida, cod_proyecto, usuario.nombre AS nomUsuario FROM salida_material JOIN personal ON personal.id_personal=salida_material.solicitado_por JOIN usuario ON usuario.id_usuario=salida_material.id_usuario WHERE id_salida=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }


  /* STOCK Material */
  static public function mdlStockMaterial($id)
  {
    //ingresos
    $stmt = Conexion::conectar()->prepare("SELECT sum(cantidad) as totIngresos FROM ingreso_stock WHERE id_material=$id");
    $stmt->execute();

    $ingresos = $stmt->fetch();

    //salidas
    $stmt = Conexion::conectar()->prepare("SELECT sum(cantidad) as totSalidas FROM salida_stock WHERE id_material=$id");
    $stmt->execute();

    $salidas = $stmt->fetch();

    return $data = array(
      "ingresos" => $ingresos["totIngresos"],
      "salidas" => $salidas["totSalidas"]
    );

    $stmt->close();
    $stmt->null;
  }

  static public function BusRepMaterial($data)
  {
    $fechaInicio = $data["fechaInicio"];
    $fechaFin = $data["fechaFin"];
    $ingSal = $data["ingSal"];

    if ($ingSal == "ingreso") {
      $stmt = Conexion::conectar()->prepare("SELECT 
    m.cod_material,
    m.desc_material,
    im.fecha_ingreso as fecha,
    im.cod_ingreso as codigo,
    ist.cantidad,
    ist.id_material,
    m.unidad
FROM 
    ingreso_stock ist
INNER JOIN 
    material m ON ist.id_material = m.id_material
INNER JOIN 
    ingreso_material im ON ist.cod_ingreso = im.cod_ingreso
    WHERE im.fecha_ingreso BETWEEN '$fechaInicio' AND '$fechaFin'");
      $stmt->execute();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT 
    m.cod_material,
    m.desc_material,
    im.fecha_salida as fecha,
    im.cod_salida as codigo,
    ist.cantidad,
    ist.id_material,
    m.unidad
FROM 
    salida_stock ist
INNER JOIN 
    material m ON ist.id_material = m.id_material
INNER JOIN 
    salida_material im ON ist.cod_salida = im.cod_salida
    WHERE im.fecha_salida BETWEEN '$fechaInicio' AND '$fechaFin'");
      $stmt->execute();
    }

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  /*================
cod clasificador
================*/
  static public function mdlInfoCodClasificador()
  {
    $stmt = Conexion::conectar()->prepare("select * from codigo_material");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
}
