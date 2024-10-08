<?php

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
              <h3 class="card-title">Permisos habiles para: <?php echo $usuario[2];?></h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <?php 
                    function permiso($idPermiso){
                      global $conectador;
                      global $id;
                      $sql_permiso=mysqli_query($conectador,"select * from permiso_usuario where id_usuario=$id and id_permiso=$idPermiso");
                      $res_permiso=mysqli_fetch_row($sql_permiso);
                      return $res_permiso;
                    }

                    ?>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary1" <?php if(permiso(1)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,1)">
                      <label for="checkboxPrimary1">
                        Agregar noticias
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary2" <?php if(permiso(4)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,4)">
                      <label for="checkboxPrimary2">
                        Editar manual
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary3" <?php if(permiso(7)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,7)">
                      <label for="checkboxPrimary3">
                        Eliminar manual
                      </label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary4" <?php if(permiso(2)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,2)">
                      <label for="checkboxPrimary4">
                        Ver Asistencia
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary5" <?php if(permiso(5)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,5)">
                      <label for="checkboxPrimary5">
                        Modulo Usuario
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary6" <?php if(permiso(8)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,8)">
                      <label for="checkboxPrimary6">
                        Solicitar Vacaciones
                      </label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary7" <?php if(permiso(3)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,3)">
                      <label for="checkboxPrimary7">
                        Carga masiva
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary8" <?php if(permiso(6)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,6)">
                      <label for="checkboxPrimary8">
                        Eliminar item en galeria
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary11" <?php if(permiso(9)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,9)">
                      <label for="checkboxPrimary11">
                        Subir a galeria
                      </label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary9" <?php if(permiso(10)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,10)">
                      <label for="checkboxPrimary9">
                        Ver galeria
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary10" <?php if(permiso(11)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,11)">
                      <label for="checkboxPrimary10">
                        Solicitar horas de vacaciones
                      </label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-4">

                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary12" <?php if(permiso(12)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,12)">
                      <label for="checkboxPrimary12">
                        Control y Registro Vacaciones
                      </label>
                    </div>

                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary13" <?php if(permiso(13)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,13)">
                      <label for="checkboxPrimary13">
                        Agregar Manual
                      </label>
                    </div>

                  </div>
                </div>

              </div>

              <div class="class row">

                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary15" <?php if(permiso(15)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,15)">
                      <label for="checkboxPrimary15">
                        Editar Usuario
                      </label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">

                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary16" <?php if(permiso(16)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,16)">
                      <label for="checkboxPrimary16">
                        Eliminar Usuario
                      </label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="class row">
                <div class="col-sm-4">
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary14" <?php if(permiso(14)!=NULL):?>checked<?php endif;?> onChange="actualizarPermiso(<?php echo $id?>,14)">
                      <label for="checkboxPrimary14">
                        Agregar Usuario
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

<?php
  include "../footer.php";
?>