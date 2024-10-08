<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Contrato</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegContrato">
  <div class="modal-body row">
    <div class="form-group col-md-6">
      <label for="">Nombre(s)</label>
      <input type="text" class="form-control" id="nombre_Contrato" name="cod_contrato">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="ap_paterno_cli" name="id_cliente">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="ap_materno_cli" name="fecha_contrato">
    </div>
    <div class="form-group col-md-6">
      <label for="">C.I.</label>
      <input type="text" class="form-control" id="ci_Contrato" name="fecha_inicio">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telefono_cli" name="fecha_entrega">
    </div>
    <div class="form-group col-md-6">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="direccion_cli" name="tipo_venta">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegContrato()
      }
    })
    $(document).ready(function() {
      $("#FormRegContrato").validate({
        rules: {
          nombre_Contrato: {
            required: true,
            minlength: 3
          },
          ap_paterno_cli: {
            required: true,
            minlength: 3
          },
          ci_Contrato: {
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