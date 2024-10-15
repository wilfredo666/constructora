<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Registrar nueva Adquisicion</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormRegAdquisicion" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">

            <div class="form-group col-md-12">
                <label for="">Proveedor</label>
                <select name="idProveedor" id="idProveedor" class="form-control">
                    <option value="">-- Seleccionar --</option>
                    <?php
                    require "../../controlador/proveedorControlador.php";
                    require "../../modelo/proveedorModelo.php";
                    $proveedor = ControladorProveedor::ctrInformacionProveedor();
                    foreach ($proveedor as $value) {
                    ?>
                        <option value="<?php echo $value["id_proveedor"]; ?>"><?php echo $value["nombre_empresa"] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">Fecha de Adquisición</label>
                <input type="date" class="form-control" id="fechaAdquisicion" name="fechaAdquisicion">
            </div>

            <div class="form-group col-md-6">
                <label for="">Fecha de Entrega</label>
                <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega">
            </div>

            <div class="form-group col-md-12">
                <label for="">Descripción de Adquisicion</label>
                <textarea class="form-control" id="descAdquisicion" name="descAdquisicion" cols="3" rows="3"></textarea>
            </div>

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
                RegAdquisicion()
            }
        })
        $(document).ready(function() {
            $("#FormRegAdquisicion").validate({
                rules: {
                    idProveedor: "required",
                    fechaAdquisicion: "required",
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