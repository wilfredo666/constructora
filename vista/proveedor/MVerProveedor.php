<?php
require "../../controlador/proveedorControlador.php";
require "../../modelo/proveedorModelo.php";

$id = $_GET["id"];
$proveedor = ControladorProveedor::ctrInfoProveedor($id);

?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Información de Proveedor</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
       <tr>
          <th>Nombre de Empresa</th>
          <td><?php echo $proveedor["nombre_empresa"]; ?></td>
        </tr>
        <tr>
          <th>Nombre(s)</th>
          <td><?php echo $proveedor["nombre_pro"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Paterno</th>
          <td><?php echo $proveedor["ap_paterno_pro"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Materno</th>
          <td><?php echo $proveedor["ap_materno_pro"]; ?></td>
        </tr>

        <tr>
          <th>C.I./NIT</th>
          <td><?php echo $proveedor["ci_proveedor"]; ?></td>
        </tr>

        <tr>
          <th>E-mail</th>
          <td><?php echo $proveedor["email_pro"]; ?></td>
        </tr>

        <tr>
          <th>Dirección</th>
          <td><?php echo $proveedor["direccion_pro"]; ?></td>
        </tr>

        <tr>
          <th>Nro. de Contácto</th>
          <td><?php echo $proveedor["telefono_pro"]; ?></td>
        </tr>

        <tr>
          <th>Estado Proveedor</th>
          <?php
          if ($proveedor["estado_pro"] == 1) {
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