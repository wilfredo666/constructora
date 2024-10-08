<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Clientes
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>Nombre(s)</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>C.I.</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoCliente()">
              <i class="fas fa-plus"></i>
              Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $cliente = ControladorCliente::ctrInformacionCliente();
        foreach ($cliente as $value) {
        ?>
        <tr>
          <td><?php echo $value["nombre_cliente"]; ?></td>
          <td><?php echo $value["ap_paterno_cli"]; ?></td>
          <td><?php echo $value["ap_materno_cli"]; ?></td>
          <td><?php echo $value["ci_cliente"]; ?></td>
          <td><?php echo $value["telefono_cli"]; ?></td>
          <td><?php echo $value["direccion_cli"]; ?></td>

          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-secondary" onclick="MEditCliente(<?php echo $value['id_cliente']; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger" onclick="MEliCliente(<?php echo $value['id_cliente']; ?>)">
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