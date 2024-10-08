<?php
require "../../controlador/inmuebleControlador.php";
require "../../modelo/inmuebleModelo.php";

?>

<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Elejir el Inmueble</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body table-responsive p-0" style="height: 400px;">
  <table id="DataTableLista" class="table table-striped table-hover">

    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Categoria</th>
        <th colspan="2">Estado</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $inmueble = ControladorInmueble::ctrInformacionInmueble();
      foreach ($inmueble as $value) {
      ?>
      <tr>
        <td><?php echo $value["cod_item"]; ?></td>
        <td><?php echo $value["desc_item"]; ?></td>
        <td><?php echo $value["clasificacion"]; ?></td>
        <?php 
        if($value["estado_item"]==1){
        ?>
        <td><span class="badge badge-success">Disponible</span></td>
        <?php
        }else{
        ?>
        <td><span class="badge badge-danger">No diponible</span></td>
        <?php
        }
        ?>

        <td>
          <div class="btn-group">
            <button class="btn btn-sm btn-info" onclick="MAgregarInmueble(<?php echo $value['id_item']; ?>)">
              <i class="fas fa-plus"></i>
            </button>

          </div>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</div>
<div class="modal-footer justify-content-between">

</div>
