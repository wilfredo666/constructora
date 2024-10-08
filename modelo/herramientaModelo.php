<?php 
require_once "conexion.php";
class ModeloHerramienta{


  static public function mdlInfoHerramientas(){
    $stmt=Conexion::conectar()->prepare("select * from herramienta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlTotHerramienta($id){
    //$totFactura=Conexion::conectar()->prepare("select ")
  }

  static public function mdlRegHerramienta($data){
    $codHerramienta=$data["codHerramienta"];
    $nomHerramienta=$data["nomHerramienta"];
    $costoHerramienta=$data["costoHerramienta"];
    $precioHerramienta=$data["precioHerramienta"];
    $medidaHerramienta=$data["medidaHerramienta"];
    $cod_clasificador=$data["cod_clasificador"];
    $imgHerramienta=$data["imgHerramienta"];

    $stmt=Conexion::conectar()->prepare("insert into Herramienta(cod_Herramienta, desc_Herramienta, unidad, valor_unidad, costo_Herramienta, img_Herramienta, cod_clasificador)values('$codHerramienta', '$nomHerramienta', '$medidaHerramienta', '$precioHerramienta', '$costoHerramienta', '$imgHerramienta', '$cod_clasificador')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoHerramienta($id){
    $stmt=Conexion::conectar()->prepare("SELECT id_Herramienta, cod_Herramienta, desc_Herramienta, unidad, valor_unidad, costo_Herramienta, img_Herramienta, estado_Herramienta, Herramienta.cod_clasificador, descripcion FROM Herramienta JOIN codigo_Herramienta ON codigo_Herramienta.cod_clasificador=Herramienta.cod_clasificador where id_Herramienta=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHerramienta($data){

    $idHerramienta=$data["idHerramienta"];
    $codHerramienta=$data["codHerramienta"];
    $nomHerramienta=$data["nomHerramienta"];
    $costoHerramienta=$data["costoHerramienta"];
    $precioHerramienta=$data["precioHerramienta"];
    $medidaHerramienta=$data["medidaHerramienta"];
    $cod_clasificador=$data["cod_clasificador"];
    $ImgHerramienta=$data["ImgHerramienta"];
    $estadoHerramienta=$data["estadoHerramienta"];

    $stmt=Conexion::conectar()->prepare("update Herramienta set cod_Herramienta='$codHerramienta', desc_Herramienta='$nomHerramienta', unidad='$medidaHerramienta', costo_Herramienta='$costoHerramienta', valor_unidad='$precioHerramienta', img_Herramienta='$ImgHerramienta', estado_Herramienta='$estadoHerramienta', cod_clasificador='$cod_clasificador' where id_Herramienta=$idHerramienta");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliHerramienta($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from Herramienta where id_Herramienta=$id");
      $stmt->execute();

    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliSalida($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from salida_Herramienta where id_salida=$id");
      $stmt->execute();

    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliIngreso($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from ingreso_Herramienta where id_ingreso=$id");
      $stmt->execute();

    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusHerramienta($idHerramienta)
  {
    $stmt=Conexion::conectar()->prepare("select * from Herramienta where id_Herramienta='$idHerramienta'");
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
    $Herramientaes = $data["Herramientaes"];
    $usuario = $data["usuario"];
    $codProyecto = $data["codProyecto"];
    $solicitante = $data["solicitante"];

    $stmt = Conexion::conectar()->prepare("insert into salida_Herramienta(fecha_salida, cod_salida, solicitado_por, id_usuario, descripcion, detalle_salida, cod_proyecto) values('$fechaHora', 'NS-$codSalida', $solicitante, $usuario, '$conceptoSalida', '$Herramientaes', '$codProyecto')");

    if ($stmt->execute()) {
      //transformar de json a array
      $salHerramientaes = json_decode($data["Herramientaes"], true);

      //registrar en la bd - tabla salida stock
      for ($i = 0; $i < count($salHerramientaes); $i++) {
        $idHerramienta = $salHerramientaes[$i]["idHerramienta"];
        $cantHerramienta = $salHerramientaes[$i]["cantHerramienta"];

        $salida_sql = Conexion::conectar()->prepare("insert into salida_stock(id_Herramienta, cantidad, cod_salida) values($idHerramienta, $cantHerramienta, 'NS-$codSalida')");

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
    $Herramientaes = $data["Herramientaes"];
    $codProyecto = $data["codProyecto"];
    $provisionador = $data["provisionador"];

    $stmt = Conexion::conectar()->prepare("insert into ingreso_Herramienta(fecha_ingreso, cod_ingreso , entregado_por, id_usuario , descripcion, detalle_ingreso, cod_proyecto) values('$fechaHora', 'NI-$codIngreso', $provisionador, $usuario, '$conceptoIngreso', '$Herramientaes', '$codProyecto')");

    if ($stmt->execute()) {

      //transformar de json a array
      $Herramientaes = json_decode($data["Herramientaes"], true);

      //registrar en la bd - tabla ingreso stock
      for ($i = 0; $i < count($Herramientaes); $i++) {
        $idHerramienta = $Herramientaes[$i]["idHerramienta"];
        $cantHerramienta = $Herramientaes[$i]["cantHerramienta"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_Herramienta, cantidad, cod_ingreso) values($idHerramienta, $cantHerramienta, 'NI-$codIngreso')");
        $ingreso_sql->execute();
      }

      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadHerramientas(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Herramienta from Herramienta");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngresos(){
    $stmt=Conexion::conectar()->prepare("select * from ingreso_Herramienta");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngreso($id){
    $stmt=Conexion::conectar()->prepare("SELECT fecha_ingreso, cod_ingreso, personal.nombre AS nomPersonal, ap_paterno, ap_materno, descripcion, detalle_ingreso, cod_proyecto, usuario.nombre AS nomUsuario FROM ingreso_Herramienta JOIN personal ON personal.id_personal=ingreso_Herramienta.entregado_por JOIN usuario ON usuario.id_usuario=ingreso_Herramienta.id_usuario WHERE id_ingreso=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoSalidas(){
    $stmt=Conexion::conectar()->prepare("select * from salida_Herramienta");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoSalida($id){
    $stmt=Conexion::conectar()->prepare("SELECT fecha_salida, cod_salida, personal.nombre AS nomPersonal, ap_paterno, ap_materno, descripcion, detalle_salida, cod_proyecto, usuario.nombre AS nomUsuario FROM salida_Herramienta JOIN personal ON personal.id_personal=salida_Herramienta.solicitado_por JOIN usuario ON usuario.id_usuario=salida_Herramienta.id_usuario WHERE id_salida=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }


  /* STOCK Herramienta */
  static public function mdlStockHerramienta($id)
  {
    //ingresos
    $stmt = Conexion::conectar()->prepare("SELECT sum(cantidad) as totIngresos FROM ingreso_stock WHERE id_Herramienta=$id");
    $stmt->execute();

    $ingresos=$stmt->fetch();

    //salidas
    $stmt = Conexion::conectar()->prepare("SELECT sum(cantidad) as totSalidas FROM salida_stock WHERE id_Herramienta=$id");
    $stmt->execute();

    $salidas=$stmt->fetch();

    return $data=array(
      "ingresos"=>$ingresos["totIngresos"],
      "salidas"=>$salidas["totSalidas"]
    );

    $stmt->close();
    $stmt->null;
  }

  static public function BusRepHerramienta($data){
    $fechaInicio=$data["fechaInicio"];
    $fechaFin= $data["fechaFin"];
    $ingSal= $data["ingSal"];

    if($ingSal=="ingreso"){
      $stmt=Conexion::conectar()->prepare("SELECT 
    m.cod_Herramienta,
    m.desc_Herramienta,
    im.fecha_ingreso as fecha,
    im.cod_ingreso as codigo,
    ist.cantidad,
    ist.id_Herramienta,
    m.unidad
FROM 
    ingreso_stock ist
INNER JOIN 
    Herramienta m ON ist.id_Herramienta = m.id_Herramienta
INNER JOIN 
    ingreso_Herramienta im ON ist.cod_ingreso = im.cod_ingreso
    WHERE im.fecha_ingreso BETWEEN '$fechaInicio' AND '$fechaFin'");
      $stmt->execute();
    }else{
      $stmt=Conexion::conectar()->prepare("SELECT 
    m.cod_Herramienta,
    m.desc_Herramienta,
    im.fecha_salida as fecha,
    im.cod_salida as codigo,
    ist.cantidad,
    ist.id_Herramienta,
    m.unidad
FROM 
    salida_stock ist
INNER JOIN 
    Herramienta m ON ist.id_Herramienta = m.id_Herramienta
INNER JOIN 
    salida_Herramienta im ON ist.cod_salida = im.cod_salida
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
  static public function mdlInfoCodClasificador(){
    $stmt=Conexion::conectar()->prepare("select * from codigo_Herramienta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
}


