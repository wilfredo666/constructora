
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Proyecto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegProyecto">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Codigo Proyecto</label>
          <input type="text" class="form-control" id="codProyecto" name="codProyecto">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Nombre Proyecto</label>
          <input type="text" class="form-control" id="nomProyecto" name="nomProyecto">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="">Descripcion</label>
      <input type="text" class="form-control" id="descProyecto" name="descProyecto">
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Fecha</label>
          <input type="date" class="form-control" id="fechaProyecto" name="fechaProyecto">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Lugar</label>
          <input type="text" class="form-control" id="lugarProyecto" name="lugarProyecto">
        </div>  
      </div>
    </div>
    <div class="form-group">
      <label for="">Personal encargado</label>
      <select name="encargado" id="encargado" class="form-control">
        <option value="">Seleccionar</option>
        <?php
        require "../../controlador/personalControlador.php";
        require "../../modelo/personalModelo.php";
        $personal=ControladorPersonal::ctrInformacionPersonal();
        foreach($personal as $value){
        ?>
        <option value="<?php echo $value["id_personal"];?>"><?php echo $value["nombre"]." ".$value["ap_paterno"]." ".$value["ap_materno"];?></option>
        <?php
        }
        ?>
      </select>
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
        RegProyecto()
      }
    })
    $(document).ready(function(){
      $("#FormRegProyecto").validate({
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