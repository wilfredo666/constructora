<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Registrar nuevo Inmueble</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormRegInmueble">
    <div class="modal-body row">
        <div class="form-group col-md-6">
            <label for="">Código de Inmueble</label>
            <input type="text" class="form-control" id="cod_item" name="cod_item">
        </div>
        <div class="form-group col-md-6">
            <label for="">Clasificación</label>
            <select name="clasificacion" id="clasificacion" class="form-control">
                <option value="">-- Seleccionar --</option>
                <option value="Departamento">Departamento</option>
                <option value="Terreno">Terreno</option>
                <option value="Casa">Casa</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="">Descripción</label>
            <input type="text" class="form-control" id="desc_item" name="desc_item">
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
            RegInmueble()
        }
    })
    $(document).ready(function() {
        $("#FormRegInmueble").validate({
            rules: {
                cod_item: {
                    required: true,
                    minlength: 3
                },
                clasificacion: "required",
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