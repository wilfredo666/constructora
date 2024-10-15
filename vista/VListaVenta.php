<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Ventas realizadas
    </h5>
    <table id="DataTableVenta" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Venta</th>
          <th>Cliente</th>
          <th>Cod Proyecto</th>
          <th>Detalle de venta</th>
          <th>Costo de venta</th>
          <th>Método de pago</th>
          <th>Fecha Venta</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoVenta()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Venta = ControladorVenta::ctrInfoVentas();

        foreach ($Venta as $value) {
        ?>
          <tr>
            <td>v-00<?php echo $value["id_venta"]; ?></td>
            <td><?php echo $value["nombre_cliente"] ." ". $value["ap_paterno_cli"] ." ". $value["ap_materno_cli"]; ?></td>
            <td><?php echo $value["cod_proyecto"]; ?></td>
            <td><?php echo $value["detalle_venta"]; ?></td>
            <td><?php echo $value["monto_contrato"]; ?></td>
            <td><?php echo $value["forma_pago"]; ?></td>
            <td><?php echo $value["fecha_emision_venta"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerVenta(<?php echo $value["id_venta"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliVenta(<?php echo $value["id_venta"]; ?>)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>

  </section>
</div>