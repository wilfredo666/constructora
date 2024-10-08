<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);

?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Información de Personal</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>Nombres</th>
          <td><?php echo $personal["nombre"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Paterno</th>
          <td><?php echo $personal["ap_paterno"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Materno</th>
          <td><?php echo $personal["ap_materno"]; ?></td>
        </tr>

        <tr>
          <th>Cédula Identidad</th>
          <td><?php echo $personal["ci_personal"]; ?></td>
        </tr>

        <tr>
          <th>Cargo Personal</th>
          <td><?php echo $personal["cargo"]; ?></td>
        </tr>

        <tr>
          <th>Dirección</th>
          <td><?php echo $personal["direccion"]; ?></td>
        </tr>

        <tr>
          <th>Nro. de Contácto</th>
          <td><?php echo $personal["telefono"]; ?></td>
        </tr>

        <tr>
          <th>Estado Personal</th>
          <?php
          if ($personal["estado_personal"] == 1) {
          ?>
            <td><span class="badge badge-success">Activo</span></td>
          <?php
          } else {
          ?>
            <td><span class="badge badge-danger">Inactivo</span></td>
          <?php
          }
          ?>
        </tr>

      </table>

    </div>
  </div>

</div>