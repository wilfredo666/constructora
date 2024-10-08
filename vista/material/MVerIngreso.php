<?php
require_once "../../controlador/materialControlador.php";
require_once "../../modelo/materialModelo.php";

$id=$_GET["id"];

$ingreso=ControladorMaterial::ctrInfoIngreso($id);
$material=json_decode($ingreso["detalle_ingreso"], true);
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
          <td><?php echo $ingreso["cod_ingreso"];?></td>
        </tr>
        <tr>
          <th>Cod. Proyecto</th>
          <td><?php echo $ingreso["cod_proyecto"];?></td>
        </tr>
        <tr>
          <th>Fecha:</th>
          <td><?php echo $ingreso["fecha_ingreso"];?></td>
        </tr>
        <tr>
          <th>Entregado por:</th>
          <td><?php echo $ingreso["nomPersonal"]." ".$ingreso["ap_paterno"]." ".$ingreso["ap_materno"];?></td>
        </tr>
        <tr>
          <th>Descripcion:</th>
          <td><?php echo $ingreso["descripcion"];?></td>
        </tr>
        <tr>
          <th>Registrado por:</th>
          <td><?php echo $ingreso["nomUsuario"];?></td>
        </tr>

      </table>
    </div>
    <div class="col-sm-6" style="text-align:center">
      <table class="table">
        <thead>
          <th>Item</th>
          <th>Cantidad</th>
        </thead>

        <tbody>
          <?php
          foreach($material as $value){
          ?>
          <tr>
            <td><?php echo $value["descMaterial"];?></td>
            <td><?php echo $value["cantMaterial"];?></td>
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


