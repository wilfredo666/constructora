<?php
require "../../controlador/PlanCobroControlador.php";
require "../../modelo/PlanCobroModelo.php";

$id = $_GET["id"];
$PlanCobro = ControladorPlanCobro::ctrInfoPlanCobro($id);
?>

<form action="" id="FormEditPlanCobro" enctype="multipart/form-data">
  <div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Editar Plan de Cobro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body">
    <div class="row">

      <div class="form-group col-md-12">
        <label for="">Nro de Venta</label>
        <select name="id_venta" id="id_venta" class="form-control">
          <option value="">-- Seleccionar --</option>
          <?php
          require "../../controlador/ventaControlador.php";
          require "../../modelo/ventaModelo.php";
          $venta = ControladorVenta::ctrInfoVentas();
          foreach ($venta as $value) {
            $seleccionar = ($value["id_venta"] == $PlanCobro["id_venta"]) ? 'selected' : '';
          ?>
            <option value="<?php echo $value["id_venta"]; ?>" <?php echo $seleccionar; ?>>v-00
              <?php echo $value["id_venta"] . "-" . $value["detalle_venta"]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="">Monto de Cobro</label>
        <input type="text" class="form-control" id="monto_cobro" name="monto_cobro" value="<?php echo $PlanCobro["monto_cobro"] ?>">
        <input type="hidden" class="form-control" id="idPlanCobro" name="idPlanCobro" value="<?php echo $PlanCobro["id_plan_cobro"] ?>">
      </div>

      <div class="form-group col-md-6">
        <label for="">Fecha de Entrega</label>
        <input type="date" class="form-control" id="fecha_cobro" name="fecha_cobro" value="<?php echo $PlanCobro["fecha_cobro"] ?>">
      </div>

      <div class="form-group col-md-12">
        <label for="">Observaciones</label>
        <textarea class="form-control" id="observacion_cobro" name="observacion_cobro" cols="3" rows="3"><?php echo $PlanCobro["observacion_cobro"] ?></textarea>
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
        EditPlanCobro()
      }
    })
    $(document).ready(function() {
      $("#FormEditPlanCobro").validate({
        rules: {
          idProveedor: "required",
          fechaPlanCobro: "required",
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