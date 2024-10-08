<?php
require "../../controlador/proyectoControlador.php";
require "../../modelo/proyectoModelo.php";

$id = $_GET["id"];
$proyecto = ControladorProyecto::ctrInfoProyecto($id);
?>

<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Proyecto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditProyecto">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Codigo Proyecto</label>
          <input type="text" class="form-control" id="codProyecto" name="codProyecto" readonly value="<?php echo $proyecto["cod_proyecto"];?>">
          <input type="hidden" id="idProyecto" name="idProyecto" value="<?php echo $id;?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Nombre Proyecto</label>
          <input type="text" class="form-control" id="nomProyecto" name="nomProyecto" value="<?php echo $proyecto["nombre_proyecto"];?>">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="">Descripcion</label>
      <input type="text" class="form-control" id="descProyecto" name="descProyecto" value="<?php echo $proyecto["desc_proyecto"];?>">
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Fecha</label>
          <input type="date" class="form-control" id="fechaProyecto" name="fechaProyecto" value="<?php echo $proyecto["fecha"];?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Lugar</label>
          <input type="text" class="form-control" id="lugarProyecto" name="lugarProyecto" value="<?php echo $proyecto["lugar"];?>">
        </div>  
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Personal encargado</label>
          <select name="encargado" id="encargado" class="form-control">
            <option value="">Seleccionar</option>
            <?php
            require "../../controlador/personalControlador.php";
            require "../../modelo/personalModelo.php";
            $personal=ControladorPersonal::ctrInformacionPersonal();
            foreach($personal as $value){
              if($value["id_personal"]==$proyecto["personal_encargado"]){
            ?>
            <option value="<?php echo $value["id_personal"];?>" selected><?php echo $value["nombre"]." ".$value["ap_paterno"]." ".$value["ap_materno"];?></option>
            <?php
              }else{
            ?>
            <option value="<?php echo $value["id_personal"];?>"><?php echo $value["nombre"]." ".$value["ap_paterno"]." ".$value["ap_materno"];?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Estado</label>
          <select name="estadoProyecto" id="estadoProyecto" class="form-control">
            <option value="1" <?php if ($proyecto["estado_proyecto"] == 1) : ?> selected <?php endif; ?>>Activo</option>
            <option value="0" <?php if ($proyecto["estado_proyecto"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
          </select>
        </div>
      </div>
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function(){
    $.validator.setDefaults({

      submitHandler:function(){
        EditProyecto()
      }
    })
    $(document).ready(function(){
      $("#FormEditProyecto").validate({
        rules:{
          codProyecto:{
            required:true
          },
          nomProyecto:{
            required: true,
            minlength:3
          }
        },
        errorElement:'span',
        errorPlacement:function(error, element){
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass){
          $(element).addClass('is-invalid')
        },

        unhighlight: function(element, errorClass, validClass){
          $(element).removeClass('is-invalid')
        }

      })
    })

  })

</script>