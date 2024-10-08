<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegCliente">
  <div class="modal-body row">
    <div class="form-group col-md-6">
      <label for="">Nombre(s)</label>
      <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="ap_paterno_cli" name="ap_paterno_cli">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="ap_materno_cli" name="ap_materno_cli">
    </div>
    <div class="form-group col-md-6">
      <label for="">C.I.</label>
      <input type="text" class="form-control" id="ci_cliente" name="ci_cliente">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telefono_cli" name="telefono_cli">
    </div>
    <div class="form-group col-md-6">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="direccion_cli" name="direccion_cli">
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
        RegCliente()
      }
    })
    $(document).ready(function() {
      $("#FormRegCliente").validate({
        rules: {
          nombre_cliente: {
            required: true,
            minlength: 3
          },
          ap_paterno_cli: {
            required: true,
            minlength: 3
          },
          ci_cliente: {
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