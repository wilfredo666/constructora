<?php
require "../../controlador/inmuebleControlador.php";
require "../../modelo/inmuebleModelo.php";

$id = $_GET["id"];
$Inmueble = ControladorInmueble::ctrInfoInmueble($id);

?>
<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Editar Proveedor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormEditInmueble">
    <div class="modal-body row">
        <div class="form-group col-md-6">
            <label for="">Código de Inmueble</label>
            <input type="text" class="form-control" id="cod_item" name="cod_item"
                value="<?php echo $Inmueble['cod_item'] ?>">
            <input type="hidden" name="id_item" value="<?php echo $Inmueble['id_item'] ?>">
        </div>

        <div class="form-group col-md-6">
            <label for="">Clasificación</label>
            <select name="clasificacion" id="clasificacion" class="form-control">
                <option value="">-- Seleccionar --</option>
                <option value="Departamento"
                    <?php if ($Inmueble['clasificacion'] == 'Departamento') echo 'selected'; ?>>
                    Departamento</option>
                <option value="Terreno" <?php if ($Inmueble['clasificacion'] == 'Terreno') echo 'selected'; ?>>Terreno
                </option>
                <option value="Casa" <?php if ($Inmueble['clasificacion'] == 'Casa') echo 'selected'; ?>>Casa</option>
            </select>
        </div>

        <div class="form-group col-md-8">
            <label for="">Descripción</label>
            <input type="text" class="form-control" id="desc_item" name="desc_item"
                value="<?php echo $Inmueble['desc_item'] ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="">Estado</label>
            <select name="estado_item" id="estado_item" class="form-control bg-dark">
                <option value="1" <?php if ($Inmueble["estado_item"] == 1) : ?> selected <?php endif; ?>>
                    Disponible</option>
                <option value="0" <?php if ($Inmueble["estado_item"] == 0) : ?> selected <?php endif; ?>>
                    No
                    disponible</option>
            </select>
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
            EditInmueble()
        }
    })
    $(document).ready(function() {
        $("#FormEditInmueble").validate({
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