<?php
require_once "../../controlador/herramientaControlador.php";
require_once "../../modelo/herramientaModelo.php";

$id=$_GET["id"];

$ingreso=ControladorHerramienta::ctrInfoIngresoHerramienta($id);

$Herramienta=json_decode($ingreso["detalle_ingreso_herra"], true);

?>

<div class="modal-header bg-info">
  <h4 class="modal-title">Detalle de Salida</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">

  <div class="row">
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <th>Cod. Ingreso</th>
          <td><?php echo $ingreso["cod_ingreso_herra"];?></td>
        </tr>
        <tr>
          <th>Cod. Proyecto</th>
          <td><?php echo $ingreso["cod_proyecto"];?></td>
        </tr>
        <tr>
          <th>Fecha:</th>
          <td><?php echo $ingreso["fecha_ingreso_herra"];?></td>
        </tr>
        <tr>
          <th>Entregado por:</th>
          <td><?php echo $ingreso["nomPersonal"]." ".$ingreso["ap_paterno"]." ".$ingreso["ap_materno"];?></td>
        </tr>
        <tr>
          <th>Descripcion:</th>
          <td><?php echo $ingreso["descripcion_herra"];?></td>
        </tr>
        <tr>
          <th>Registrado por:</th>
          <td><?php echo $ingreso["nomUsuario"];?></td>
        </tr>

      </table>
    </div>
    <div class="col-sm-6" style="text-align:center">
      <table class="table">
        <thead class="bg-dark">
          <th>Item</th>
          <th>Cantidad</th>
        </thead>

        <tbody>
          <?php
          foreach($Herramienta as $value){
          ?>
          <tr>
            <td><?php echo $value["descHerramienta"];?></td>
            <td><?php echo $value["cantHerramienta"];?></td>
          </tr>
          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal-footer justify-content-between">

</div>


