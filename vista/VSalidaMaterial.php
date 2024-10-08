<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Salidas de Materiales
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Salida</th>
          <th>Fecha</th>
          <th>Descripcion</th>
          <th>Cod. Proyecto</th>
          <td>
            <a href="FNotaSalida" class="btn btn-primary">Nuevo</a>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $salida = ControladorMaterial::ctrInfoSalidas();

        foreach ($salida as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_salida"]; ?></td>
          <td><?php echo $value["fecha_salida"]; ?></td>
          <td><?php echo $value["descripcion"]; ?></td>
          <td><?php echo $value["cod_proyecto"];?></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-info" onclick="MVerSalida(<?php echo $value["id_salida"]; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-danger"  onclick="MEliSalida(<?php echo $value["id_salida"];?>)">
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