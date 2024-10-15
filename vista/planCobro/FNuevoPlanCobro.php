<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Registrar nuevo Plan de Cobro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormRegPlanCobro" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">

            <div class="form-group col-md-12">
                <label for="">Nro de Venta</label>
                <select name="id_venta" id="id_venta" class="form-control">
                    <option value="">-- Seleccionar --</option>
                    <?php
                    require "../../controlador/ventaControlador.php";
                    require "../../modelo/ventaModelo.php";
                    $proveedor = ControladorVenta::ctrInfoVentas();
                    foreach ($proveedor as $value) {
                    ?>
                        <option value="<?php echo $value["id_venta"]; ?>">v-00<?php echo $value["id_venta"] . " - " . $value["detalle_venta"] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">Monto de Cobro</label>
                <input type="text" class="form-control" id="monto_cobro" name="monto_cobro">
            </div>

            <div class="form-group col-md-6">
                <label for="">Fecha de Entrega</label>
                <input type="date" class="form-control" id="fecha_cobro" name="fecha_cobro">
            </div>

            <div class="form-group col-md-12">
                <label for="">Observaciones</label>
                <textarea class="form-control" id="observacion_cobro" name="observacion_cobro" cols="3" rows="3"></textarea>
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
                RegPlanCobro()
            }
        })
        $(document).ready(function() {
            $("#FormRegPlanCobro").validate({
                rules: {
                    monto_cobro: {
                        required: true,
                    },
                    id_venta: "required",
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