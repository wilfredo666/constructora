<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Contratos
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>Cod. Contrato</th>
          <th>Cliente</th>
          <th>Fecha del Contrato</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoContrato()">
              <i class="fas fa-plus"></i>
              Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Contrato = ControladorContrato::ctrInformacionContrato();
        foreach ($Contrato as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_contrato"]; ?></td>
          <td><?php echo $value["nombre_cliente"]." ".$value["ap_paterno_cli"]." ".$value["ap_materno_cli"]; ?></td>
          <td><?php echo $value["fecha_contrato"]; ?></td>
          <?php 
          if($value["estado_contrato"]==1){
          ?>
          <td><span class="badge badge-success">Vigente</span></td>
          <?php
          }else{
          ?>
          <td><span class="badge badge-danger">Terminado</span></td>
          <?php
          }
          ?>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-info" onclick="MVerContrato(<?php echo $value['id_contrato']; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-secondary" onclick="MEditContrato(<?php echo $value['id_contrato']; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger" onclick="MEliContrato(<?php echo $value['id_contrato']; ?>)">
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