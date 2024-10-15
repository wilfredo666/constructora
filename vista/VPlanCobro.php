<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Plan de Cobros
    </h5>
    <table id="DataTablePlanCobro" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>N°</th>
          <th>Nro de venta</th>
          <th>Monto Cobro</th>
          <th>Fecha de Cobro</th>
          <th>Observaciones</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoPlanCobro()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $PlanCobro = ControladorPlanCobro::ctrInfoPlanCobros();
        $cont = 0;
        foreach ($PlanCobro as $value) {
          $cont = $cont+1;
        ?>
          <tr>
            <td style="width:20px;"><?php echo $cont ?></td>
            <td>v-00<?php echo $value["id_venta"]; ?></td>
            <td><?php echo $value["monto_cobro"]; ?></td>
            <td><?php echo $value["fecha_cobro"]; ?></td>
            <td><?php echo $value["observacion_cobro"]; ?></td>

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary"
                  onclick="MEditPlanCobro(<?php echo $value["id_plan_cobro"]; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                  onclick="MEliPlanCobro(<?php echo $value["id_plan_cobro"]; ?>)">
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