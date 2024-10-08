
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Materiales
    </h5>
    <table id="DataTableMaterial" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Material</th>
          <th>Descripcion</th>
          <th>Unidad</th>
          <th>C. Adquisición</th>
          <th>Costo Almacen</th>
          <th>Stock</th>
          <th>Imagen</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoMaterial()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Material = ControladorMaterial::ctrInfoMateriales();

        foreach ($Material as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_material"]; ?></td>
          <td><?php echo $value["desc_material"]; ?></td>
          <td><?php echo $value["unidad"]; ?></td>
          <td><?php echo $value["costo_material"];?></td>
          <td><?php echo $value["valor_unidad"];?></td>
          <td><span class="badge badge-warning"> <?php  $stock=ControladorMaterial::ctrStockMaterial($value["id_material"]);
          echo $totStock=$stock["ingresos"]-$stock["salidas"];          
            ?> 
            </span></td>
          <td><center><?php
          if ($value["img_material"] == "") {
            ?>
            <img src="assest/dist/img/material/product_default.png" width='50'>
            <?php
          } else {
            ?>
            <img src='assest/dist/img/material/<?php echo $value["img_material"]; ?>' width='50' height="50">
            <?php
          }
            ?>
          </center></td>

          <?php
          if ($value["estado_material"] == 1) {
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
              <button class="btn btn-sm btn-info" onclick="MVerMaterial(<?php echo $value["id_material"]; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-secondary" onclick="MEditMaterial(<?php echo $value["id_material"]; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger"  onclick="MEliMaterial(<?php echo $value["id_material"];?>)">
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