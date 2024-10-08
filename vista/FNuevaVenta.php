<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Registrar Nueva Venta
    </h5>
    <div class="card">
      <div class="card-body">
        <form action="" id="FormRegVenta" enctype="multipart/form-data">
          <div class="modal-body row">

            <div class="form-group col-md-6">
              <label for="">Proyecto</label>
              <input type="text" class="form-control" id="codVenta" name="codVenta">
            </div>
            <div class="form-group col-md-6">
              <label for="">Cliente</label>
              <input type="text" class="form-control" id="nomVenta" name="nomVenta">
            </div>
            <div class="form-group col-md-12">
             <label for="">Detalle <span class="text-muted">(Descripcion del inmueble a vender)</span></label>
              <div class="input-group">
                <input type="text" class="form-control" id="nomVenta" name="nomVenta">
                <span class="input-group-append">
                  <button type="button" class="btn btn-success" onclick="MListaInmueble()">Elejir</button>
                </span>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="">Monto Total <span class="text-muted">(Valor total definido en el contrato)</span></label>
              <input type="number" class="form-control" id="costoVenta" name="costoVenta" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-4">
              <label for="">A Cuenta <span class="text-muted">(Monto de dinero inicial entregado)</span></label>
              <input type="number" class="form-control" id="costoVenta" name="costoVenta" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-4">
              <label for=""># de Cuotas <span class="text-muted">(Cantidad e cuotas a pagar)</span></label>
              <input type="number" class="form-control" id="costoVenta" name="costoVenta" placeholder="0.00 Bs.">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha del contrato</label>
              <input type="date" class="form-control" id="ImgVenta" name="ImgVenta">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha de venta</label>
              <input type="date" class="form-control" id="ImgVenta" name="ImgVenta">
            </div>
            <div class="form-group col-md-3">
              <label for="">Fecha de entrega</label>
              <input type="date" class="form-control" id="ImgVenta" name="ImgVenta">
            </div>
            <div class="form-group col-md-3">
              <label for="">Forma de Pago</label>
              <select name="" id="" class="form-control">
                <option value="credito">A credito</option>
                <option value="contado">Al Contado</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Contrato <span class="text-muted">(Cargar el archivo del contrato)</span></label>
              <input type="file" class="form-control" id="precioVenta" name="precioVenta" placeholder="0.00">
            </div>
            <div class="form-group col-md-6">
              <label for="">Plano <span class="text-muted">(Cargar el archivo del plano)</span></label>
              <input type="file" name="medidaVenta" id="medidaVenta" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Observaciones</label>
              <textarea class="form-control" name="" id=""></textarea>
            </div>

          </div>

        </form>

      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
      </div>
    </div>

  </section>
</div>
<script>
  $(function() {
    $.validator.setDefaults({

      submitHandler: function() {
        RegVenta()
      }
    })
    $(document).ready(function() {
      $("#FormRegVenta").validate({
        rules: {
          codVenta: {
            required: true,
            minlength: 3
          },
          nomVenta: {
            required: true,
            minlength: 3
          },
          precioVenta: {
            required: true,
          },
          tallaVenta:"required"
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