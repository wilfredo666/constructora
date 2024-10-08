<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <h5 class="table-title">
      Lista de Proyectos
    </h5>

    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Proyecto</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Fecha</th>
          <th>Lugar</th>
          <th>Encargado</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoProyecto()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $proyecto=ControladorProyecto::ctrInfoProyectos();
        
        foreach($proyecto as $value){
          ?>
          <tr>
            <td><?php echo $value["cod_proyecto"];?></td>
            <td><?php echo $value["nombre_proyecto"];?></td>
            <td><?php echo $value["desc_proyecto"];?></td>
            <td><?php echo $value["fecha"];?></td>
            <td><?php echo $value["lugar"];?></td>
            <td><?php echo $value["nombre"]." ".$value["ap_paterno"]." ".$value["ap_materno"];?></td>
            <?php 
            if($value["estado_proyecto"]==1){
              ?>
              <td><span class="badge badge-success">Activo</span></td>
              <?php
            }else{
              ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
              <?php
            }
            ?>

            <td>
              <div class="btn-group">
                
                <button class="btn btn-sm btn-secondary" onclick="MEditProyecto(<?php echo $value["id_proyecto"];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliProyecto(<?php echo $value["id_proyecto"];?>)">
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