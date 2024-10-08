<?php
require "../../controlador/materialControlador.php";
require "../../modelo/materialModelo.php";

$id=$_GET["id"];
$material=ControladorMaterial::ctrInfoMaterial($id);

?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Información Material</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-6">
      <table class="table">
        <tr>
          <th>Cod. Material</th>
          <td><?php echo $material["cod_material"];?></td>
        </tr>

        <tr>
          <th>Descripción</th>
          <td><?php echo $material["desc_material"];?></td>
        </tr>

        <tr>
          <th>Costo</th>
          <td><?php echo $material["costo_material"];?> Bs.</td>
        </tr>

        <tr>
          <th>Precio de Venta</th>
          <td><?php echo $material["valor_unidad"];?> Bs.</td>
        </tr>

        <tr>
          <th>Unidad de Medida</th>
          <td><?php echo $material["unidad"];?></td>
        </tr>
        
        <tr>
          <th>Disponibilidad</th>
          <?php 
          if($material["estado_material"]==1){
          ?>
          <td><span class="badge badge-success">Disponible</span></td>
          <?php
          }else{
          ?>
          <td><span class="badge badge-danger">No disponible</span></td>
          <?php
          }
          ?>

        </tr>
        
        <tr>
          <th>Clasificacion</th>
          <td><?php echo $material["cod_clasificador"]." | ".$material["descripcion"];?></td>
        </tr>

      </table>
    </div>
    <div class="col-6 align-items-center justify-content-between text-center">
     
     <?php 
      if($material["img_material"]==""){
        ?>
        <img src="assest/dist/img/material/product_default.png" alt="" width="300">
        <?php
      }else{
        ?>
        <img src="assest/dist/img/material/<?php echo $material["img_material"];?>" alt="" width="300">
        <?php
      }
      ?>
      
    </div>

  </div>



</div>

