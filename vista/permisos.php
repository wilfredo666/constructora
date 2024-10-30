<?php
$path = parse_url($_SERVER['REQUEST_URI']);
global $id;
$id = $path["query"];

function permiso($idPermiso)
{
  global $id;

  $permiso = ControladorUsuario::ctrUsuarioPermiso($id, $idPermiso);
  return $permiso;
}

/* function permiso($idPermiso){
  global $conectador;
  global $id;
  $sql_permiso=mysqli_query($conectador,"select * from permiso_usuario where id_usuario=$id and id_permiso=$idPermiso");
  $res_permiso=mysqli_fetch_row($sql_permiso);
  return $res_permiso;
} */



?>

<section class="content-header"></section>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Permisos habilitados para: </h3>
            </div>
            <div class="card-body">

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary1" <?php if (permiso(1) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,1)">
                      <label for="checkboxPrimary1">
                        Usuarios
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary2" <?php if (permiso(2) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,2)">
                      <label for="checkboxPrimary2">
                        Personal
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary3" <?php if (permiso(3) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,3)">
                      <label for="checkboxPrimary3">
                        Inmuebles
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary4" <?php if (permiso(4) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,4)">
                      <label for="checkboxPrimary4">
                        Clientes
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary5" <?php if (permiso(5) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,5)">
                      <label for="checkboxPrimary5">
                        Proyectos
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary6" <?php if (permiso(6) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,6)">
                      <label for="checkboxPrimary6">
                        Proveedores
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary7" <?php if (permiso(7) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,7)">
                      <label for="checkboxPrimary7">
                        Ventas
                      </label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <div class="card-footer clearfix">

        </div>
      </div>
    </div>
</div>

</div>

</div>
</div>