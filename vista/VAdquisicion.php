<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Adquisicions
    </h5>
    <table id="DataTableAdquisicion" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>N°</th>
          <th>Cod. Adquisicion</th>
          <th>Proveedor</th>
          <th>Fecha Adquisición</th>
          <th>Fecha Entrega</th>
          <td>
            <button class="btn btn-primary"  onclick="window.location.href='<?php echo $base_url; ?>/FNotaAdquisicion';">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Adquisicion = ControladorAdquisicion::ctrInfoAdquisiciones();
        $cont = 0;
        foreach ($Adquisicion as $value) {
          $cont = $cont+1;
        ?>
          <tr>
            <td style="width:20px;"><?php echo $cont ?></td>
            <td><?php echo $value["cod_adquisicion"]; ?></td>
            <td><?php echo $value["nombre_empresa"]; ?></td>
            <td><?php echo $value["fecha_adq"]; ?></td>
            <td><?php echo $value["fecha_entrega"]; ?></td>

            <td>
              <div class="btn-group">
                <!-- <button class="btn btn-sm btn-secondary"
                  onclick="MEditAdquisicion(<?php echo $value["id_adquisicion"]; ?>)">
                  <i class="fas fa-edit"></i>
                </button> -->
                <button class="btn btn-sm btn-danger"
                  onclick="MEliAdquisicion(<?php echo $value["id_adquisicion"]; ?>)">
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