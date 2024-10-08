<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Ingresos de Materiales
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Ingreso</th>
          <th>Fecha</th>
          <th>Descripcion</th>
          <th>Cod. Proyecto</th>
          <td>
           <a href="FNotaIngreso" class="btn btn-primary">Nuevo</a>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $ingreso = ControladorMaterial::ctrInfoIngresos();

        foreach ($ingreso as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_ingreso"]; ?></td>
          <td><?php echo $value["fecha_ingreso"]; ?></td>
          <td><?php echo $value["descripcion"]; ?></td>
          <td><?php echo $value["cod_proyecto"];?></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-info" onclick="MVerIngreso(<?php echo $value["id_ingreso"]; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-danger"  onclick="MEliIngreso(<?php echo $value["id_ingreso"];?>)">
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