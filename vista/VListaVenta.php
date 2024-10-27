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
            <button class="btn btn-primary" onclick="window.location.href='<?php echo $base_url; ?>/FNuevaVenta';">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Venta = ControladorVenta::ctrInfoVentas();
        $contador = 0;
        foreach ($Venta as $value) {
          $contador = $contador+ 1;
          $descItem = json_decode($value["detalle_venta"], true);

        ?>
          <tr>
            <td><?php echo $contador; ?></td>
            <td><?php echo $value["nombre_cliente"] . " " . $value["ap_paterno_cli"] . " " . $value["ap_materno_cli"]; ?></td>
            <td><?php echo $value["cod_proyecto"]; ?></td>
            <td><?php echo $descItem['desc_item'] ?></td>
            <td><?php echo $value["monto_contrato"]; ?></td>
            <td><?php echo $value["forma_pago"]; ?></td>
            <td><?php echo $value["fecha_emision_venta"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info mr-1" onclick="MVerVenta(<?php echo $value["id_venta"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-success mr-1" onclick="MNuevoPlanCobro(<?php echo $value["id_venta"]; ?>)">
                  <i class="fas fa-money"></i>
                </button>
                <button class="btn btn-sm btn-danger mr-1" onclick="MEliVenta(<?php echo $value["id_venta"]; ?>)">
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