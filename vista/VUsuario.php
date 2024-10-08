<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de usuarios
    </h5>

    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Nombre Usuario</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Categoria</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm"  onclick="MNuevoUsuario()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $usuario=ControladorUsuario::ctrInfoUsuarios();

        foreach($usuario as $value){
        ?>
        <tr>
          <td><?php echo $value["id_usuario"];?></td>
          <td><?php echo $value["nombre"];?></td>
          <td><?php echo $value["email"];?></td>

          <?php 
          if($value["estado_usuario"]==1){
          ?>
          <td><span class="badge badge-success">Activo</span></td>
          <?php
          }else{
          ?>
          <td><span class="badge badge-danger">Inactivo</span></td>
          <?php
          }
          ?>
          <td><?php echo $value["categoria"];?></td>

          <td>
            <div class="btn-group">

              <button class="btn btn-sm btn-secondary" onclick="MEditUsuario(<?php echo $value["id_usuario"];?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger" onclick="MEliUsuario(<?php echo $value["id_usuario"];?>)">
                <i class="fas fa-trash"></i>
              </button>
              <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"></button>
                <ul class="dropdown-menu">

                  <?php 
          if ($_SESSION["categoria"] == 'Administrador') {
                  ?>
                  <li><a href="<?php echo $base_url; ?>usuario/permisos" class="dropdown-item">Permisos</a></li>
                  <?php
          }
                  ?>
                </ul>


              </div>

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