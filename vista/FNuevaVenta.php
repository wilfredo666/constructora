<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row justify-content-between pl-4 pr-4 pb-4">
      <div>
        <h5 class="table-title">
          Registrar Nueva Venta.
        </h5>
      </div>
      <div>
        <button class="btn btn-dark" onclick="window.location.href='<?php echo $base_url; ?>/VListaVenta';"><i class="fa fa-eye" aria-hidden="true"></i> Ver mis Ventas</button>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <form action="" id="FormRegVenta" enctype="multipart/form-data" method="POST">
          <div class="modal-body row">

            <div class="form-group col-md-6">
              <label for="">Proyecto</label>
              <!-- <input type="text" class="form-control" id="codVenta" name="codVenta"> -->
              <select name="codVenta" id="codVenta" class="form-control">
                <option value="">Seleccionar</option>
                <?php
                $proyectos = ControladorProyecto::ctrInfoProyectos();
                foreach ($proyectos as $value) {
                ?>
                  <option value="<?php echo $value["id_proyecto"]; ?>"><?php echo $value["nombre_proyecto"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Cliente</label>
              <!-- <input type="text" class="form-control" id="cliente" name="cliente"> -->
              <select name="cliente" id="cliente" class="form-control">
                <option value="">Seleccionar</option>
                <?php
                $proyectos = ControladorCliente::ctrInformacionCliente();
                foreach ($proyectos as $value) {
                ?>
                  <option value="<?php echo $value["id_cliente"]; ?>"><?php echo $value["nombre_cliente"] . " " . $value["ap_paterno_cli"] . " " . $value["ap_materno_cli"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="">Detalle <span class="text-muted">(Descripcion del inmueble a vender)</span></label>
              <div class="input-group">
                <input type="text" class="form-control" id="nomVenta" name="nomVenta">
                <input type="hidden" class="form-control" id="nomVentaBD" name="nomVentaBD">
                <input type="hidden" class="form-control" id="idInmuebleBD" name="idInmuebleBD">
                <span class="input-group-append">
                  <button type="button" class="btn btn-success" onclick="MListaInmueble()">Elejir</button>
                </span>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="">Monto Total <span class="text-muted">(Valor total definido en el contrato)</span></label>
              <input type="number" class="form-control" id="totalVenta" name="totalVenta" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-4">
              <label for="">A Cuenta <span class="text-muted">(Monto de dinero inicial entregado)</span></label>
              <input type="number" class="form-control" id="acuenta" name="acuenta" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-4">
              <label for=""># de Cuotas <span class="text-muted">(Cantidad e cuotas a pagar)</span></label>
              <input type="number" class="form-control" id="cuotas" name="cuotas" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha del contrato</label>
              <input type="date" class="form-control" id="fechaContrato" name="fechaContrato">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha de venta</label>
              <input type="date" class="form-control" id="fechaVenta" name="fechaVenta">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha de entrega</label>
              <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega">
            </div>
            <div class="form-group col-md-3">
              <label for="">Forma de Pago</label>
              <select name="formaPago" id="formaPago" class="form-control">
                <option value="credito">A credito</option>
                <option value="contado">Al Contado</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Contrato <span class="text-muted">(Cargar el archivo del contrato)</span></label>
              <input type="file" class="form-control" id="archivoContrato" name="archivoContrato">
            </div>
            <div class="form-group col-md-6">
              <label for="">Plano <span class="text-muted">(Cargar el archivo del plano)</span></label>
              <input type="file" name="archivoPlano" id="archivoPlano" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Observaciones</label>
              <textarea class="form-control" name="observaciones" id="observaciones"></textarea>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
          </div>
        </form>

      </div>

    </div>

  </section>
</div>
<script>
  $(function() {
    $("#FormRegVenta").validate({
      rules: {
        codVenta: "required",
        cliente: "required",
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: function(form) {
        event.preventDefault();
        RegVenta();
      }
    });
  });
</script>