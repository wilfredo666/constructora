<?php
require "../../controlador/MaterialControlador.php";
require "../../modelo/MaterialModelo.php";

$id = $_GET["id"];
$Material = ControladorMaterial::ctrInfoMaterial($id);

?>

<form action="" id="FormEditMaterial" enctype="multipart/form-data">
  <div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Editar Material</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body">
    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Cód. Material</label>
        <input type="text" class="form-control" id="codMaterial" name="codMaterial" value="<?php echo $Material["cod_material"] ?>">
        <input type="hidden" value="<?php echo $Material["id_material"] ?>" name="idMaterial" id="idMaterial">
      </div>
      <div class="form-group col-md-8">
        <label for="">Nombre del Material</label>
        <input type="text" class="form-control" id="nomMaterial" name="nomMaterial" value="<?php echo $Material["desc_material"] ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Costo Material</label>
        <input type="number" class="form-control" id="costoMaterial" name="costoMaterial" value="<?php echo $Material["costo_material"] ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Precio Material</label>
        <input type="number" class="form-control" id="precioMaterial" name="precioMaterial" value="<?php echo $Material["valor_unidad"] ?>">
      </div>

      <div class="form-group col-md-3">
        <label for="">U. de Medida</label>
        <input type="text" class="form-control" name="medidaMaterial" id="medidaMaterial" value="<?php echo $Material["unidad"] ?>">
      </div>

      <div class="form-group col-md-3">
        <label for="">Estado</label>
        <select name="estadoMaterial" id="estadoMaterial" class="form-control">
          <option value="1" <?php if ($Material["estado_material"] == 1) : ?> selected <?php endif; ?>>Disponible</option>
          <option value="0" <?php if ($Material["estado_material"] == 0) : ?> selected <?php endif; ?>>No disponible</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="">Clasificacion</label>
        <select name="cod_clasificador" id="cod_clasificador" class="form-control">
          <?php
          $codMaterial=ControladorMaterial::ctrInfoCodClasificador();
          foreach($codMaterial as $value){
            if($value["cod_clasificador"]==$Material["cod_clasificador"]){
          ?>
          <option value="<?php echo $value["cod_clasificador"];?>" selected><?php echo $value["descripcion"]?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value["cod_clasificador"];?>"><?php echo $value["descripcion"]?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>

    </div>
    <div class="row">
      <div class="col-md-6">
        <label for="">Imagen del Material</label>
        <input type="file" class="form-control" id="ImgMaterial" name="ImgMaterial" onchange="previsualizar()">
        <input type="hidden" id="imgActMaterial" name="imgActMaterial" value="<?php echo $Material["img_material"]; ?>">
      </div>
      <div class="col-md-6">
        <center>
          <?php if ($Material["img_material"] == "") {
          ?>
          <img src="assest/dist/img/material/product_default.png" class="img-thumbnail previsualizar" width="200">
          <?php
} else {
          ?>
          <img src="assest/dist/img/material/<?php echo $Material["img_material"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
          <?php
}
          ?>
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
        EditMaterial()
      }
    })
    $(document).ready(function() {
      $("#FormEditMaterial").validate({
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