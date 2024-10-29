<?php
$path = parse_url($_SERVER['REQUEST_URI']);
parse_str($path['query'], $queryParams);

global $id;
$id = $queryParams['id'];

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
              <h3 class="card-title">Permisos habiles para: </h3>
            </div>
            <div class="card-body">

              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary14" <?php if (permiso(1) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,14)">
                      <label for="checkboxPrimary14">
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
                      <input type="checkbox" id="checkboxPrimary16" <?php if (permiso(2) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,16)">
                      <label for="checkboxPrimary16">
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
                      <input type="checkbox" id="checkboxPrimary16" <?php if (permiso(2) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,16)">
                      <label for="checkboxPrimary16">
                        Inmuebles
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

<!--  -->

<script>
  function actualizarPermiso(){

  }
</script>