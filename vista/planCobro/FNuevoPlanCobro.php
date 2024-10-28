<?php
require "../../controlador/ventaControlador.php";
require "../../modelo/ventaModelo.php";

$id = $_GET["id"];
$venta = ControladorVenta::ctrInfoVenta($id);
?>

<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Registrar nuevo Plan de Cobro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormRegPlanCobro" enctype="multipart/form-data">
    <div class="modal-body">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3" style="background-color: #d9e2e6;">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-right">Fecha de Venta: <?php echo $venta['fecha_emision_venta'] ?></p>
                                    <h4 class="text-success">
                                        <strong>Cliente: </strong><?php echo $venta["nombre_cliente"] . " " . $venta["ap_paterno_cli"] . " " . $venta["ap_materno_cli"]; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <br><br>
                                <div class="col-sm-8 invoice-col">
                                    <strong>Código de Proyecto: </strong>
                                    <address>
                                        <i class="fa fa-shopping-cart"></i> <?php echo $venta['cod_proyecto'] ?>
                                    </address>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <strong>Código de venta: </strong>
                                    <address>
                                        <i class="fa fa-shopping-cart"></i> <?php echo $venta["id_venta"]; ?>
                                    </address>
                                </div>
                                <div class="col-sm-8 invoice-col">
                                    <strong> Proyecto: </strong>
                                    <address>
                                        <?php echo $venta['nombre_proyecto'] ?><br>
                                    </address>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <strong>Monto total Contrato: </strong>
                                    <address>
                                        <i class="fa fa-money"></i> <?php echo $venta["monto_contrato"]; ?> Bs.
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Monto de Cobro</label>
                <input type="text" class="form-control" id="monto_cobro" name="monto_cobro">
                <input type="hidden" class="form-control" id="idVenta" name="idVenta" value="<?php echo $venta['id_venta'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="">Fecha de Cobro</label>
                <input type="date" class="form-control" id="fecha_cobro" name="fecha_cobro">
            </div>

            <div class="form-group col-md-12">
                <label for="">Observaciones</label>
                <textarea class="form-control" id="observacion_cobro" name="observacion_cobro" cols="3" rows="3"></textarea>
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