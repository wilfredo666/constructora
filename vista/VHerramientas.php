<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Herramientas
    </h5>
    <table id="DataTableHerramienta" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Herramienta</th>
          <th>Descripcion</th>
          <th>Valor (Bs.)</th>
          <th>Costo (Bs.)</th>
          <th>Cod. Clasificación</th>
          <th>Imagen</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoHerramienta()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Herramienta = ControladorHerramienta::ctrInfoHerramientas();

        foreach ($Herramienta as $value) {
        ?>
          <tr>
            <td><?php echo $value["cod_herramienta"]; ?></td>
            <td><?php echo $value["desc_herramienta"]; ?></td>
            <td><?php echo $value["valor_herramienta"]; ?></td>
            <td><?php echo $value["costo_herramienta"]; ?></td>
            <td><?php echo $value["cod_clasificacion_her"]; ?></td>
            <td>
              <center><?php
                      if ($value["img_herramienta"] == "") {
                      ?>
                  <img src="assest/dist/img/herramienta/product_default.png" width='50'>
                <?php
                      } else {
                ?>
                  <img src='assest/dist/img/herramienta/<?php echo $value["img_herramienta"]; ?>' width='50'
                    height="50">
                <?php
                      }
                ?>
              </center>
            </td>

            <?php
            if ($value["estado_herramienta"] == 1) {
            ?>
              <td><span class="badge badge-success">Disponible</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">No disponible</span></td>
            <?php
            }
            ?>

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary"
                  onclick="MEditHerramienta(<?php echo $value["id_herramienta"]; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                  onclick="MEliHerramienta(<?php echo $value["id_herramienta"]; ?>)">
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