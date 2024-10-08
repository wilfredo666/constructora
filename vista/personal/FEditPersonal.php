<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Personal</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditPersonal">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Nombres</label>
      <input type="text" class="form-control" id="nomPersonal" name="nomPersonal" value="<?php echo $personal['nombre']; ?>">
      <input type="hidden" name="idPersonal" id="idPersonal" value="<?php echo $id; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="patPersonal" name="patPersonal" value="<?php echo $personal['ap_paterno']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="matPersonal" name="matPersonal" value="<?php echo $personal['ap_materno']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">C.I.</label>
      <input type="text" class="form-control" id="ciPersonal" name="ciPersonal" value="<?php echo $personal['ci_personal']; ?>">
    </div>
        <div class="form-group col-md-6">
      <label for="">Departamento</label>
      <input type="text" class="form-control" id="depPersonal" name="depPersonal" value="<?php echo $personal['departamento']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Cargo Personal</label>
      <input type="text" class="form-control" id="cargoPersonal" name="cargoPersonal" value="<?php echo $personal['cargo']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telPersonal" name="telPersonal" value="<?php echo $personal['telefono']; ?>">
    </div>
    <div class="form-group col-md-8">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirPersonal" name="dirPersonal" value="<?php echo $personal['direccion']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="">Estado</label>
      <select name="estadoPersonal" id="estadoPersonal" class="form-control">
        <option value="1" <?php if ($personal["estado_personal"] == 1) : ?> selected <?php endif; ?>>Activo</option>
        <option value="0" <?php if ($personal["estado_personal"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
      </select>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        EditPersonal()
      }
    })
    $(document).ready(function() {
      $("#FormEditPersonal").validate({
        rules: {
          nomPersonal: {
            required: true,
            minlength: 3
          },
          ciPersonal: {
            required: true,
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid')
        },

        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid')
        }

      })
    })

  })
</script>