<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Material</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegMaterial" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Cód. Material</label>
        <input type="text" class="form-control" id="codMaterial" name="codMaterial">
      </div>
      <div class="form-group col-md-8">
        <label for="">Nombre del Material</label>
        <input type="text" class="form-control" id="nomMaterial" name="nomMaterial">
      </div>
      <div class="form-group col-md-6">
        <label for="">Costo Material</label>
        <input type="number" class="form-control" id="costoMaterial" name="costoMaterial" placeholder="0.00">
      </div>
      <div class="form-group col-md-6">
        <label for="">Precio Material</label>
        <input type="number" class="form-control" id="precioMaterial" name="precioMaterial" placeholder="0.00">
      </div>
      <div class="form-group col-md-6">
        <label for="">U. de Medida</label>
        <input type="text" name="medidaMaterial" id="medidaMaterial" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="">Clasificacion</label>
        <select name="cod_clasificador" id="cod_clasificador" class="form-control">
          <?php
          require "../../controlador/materialControlador.php";
          require "../../modelo/materialModelo.php";
          $codMaterial=ControladorMaterial::ctrInfoCodClasificador();
           foreach($codMaterial as $value){
          ?>
        <option value="<?php echo $value["cod_clasificador"];?>"><?php echo $value["descripcion"]?></option>
        <?php
        }
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Imagen del Material</label>
        <input type="file" class="form-control" id="ImgMaterial" name="ImgMaterial" onchange="previsualizar()" >
      </div>
      <div class="form-group col-md-6">
        <center>
          <img src="assest/dist/img/material/product_default.png" class="img-thumbnail previsualizar" width="200">
        </center>
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
        RegMaterial()
      }
    })
    $(document).ready(function() {
      $("#FormRegMaterial").validate({
        rules: {
          codMaterial: {
            required: true,
            minlength: 3
          },
          nomMaterial: {
            required: true,
            minlength: 3
          },
          precioMaterial: {
            required: true,
          },
          tallaMaterial:"required"
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