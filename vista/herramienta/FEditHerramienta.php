<?php
require "../../controlador/HerramientaControlador.php";
require "../../modelo/HerramientaModelo.php";

$id = $_GET["id"];
$Herramienta = ControladorHerramienta::ctrInfoHerramienta($id);

?>

<form action="" id="FormEditHerramienta" enctype="multipart/form-data">
  <div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Editar Herramienta</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body">
    <div class="row">

      <div class="form-group col-md-4">
        <label for="">Cód. Herramienta</label>
        <input type="text" class="form-control" id="codHerramienta" name="codHerramienta"
          value="<?php echo $Herramienta["cod_herramienta"] ?>">
        <input type="hidden" value="<?php echo $Herramienta["id_herramienta"] ?>" name="idHerramienta"
          id="idHerramienta">
      </div>

      <div class="form-group col-md-5">
        <label for="">Cód. de Clasificacion</label>
        <select name="cod_clasificador" id="cod_clasificador" class="form-control">
          <option value="">-- Seleccionar --</option>
          <?php
          require "../../controlador/materialControlador.php";
          require "../../modelo/materialModelo.php";
          $codMaterial = ControladorMaterial::ctrInfoCodClasificador();
          foreach ($codMaterial as $value) {
            $seleccionar = ($value["cod_clasificador"] == $Herramienta["cod_clasificacion_her"]) ? 'selected' : '';
          ?>
            <option value="<?php echo $value["cod_clasificador"]; ?>" <?php echo $seleccionar; ?>>
              <?php echo $value["descripcion"]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Estado</label>
        <select name="estadoHerramienta" id="estadoHerramienta" class="form-control bg-dark">
          <option value="1" <?php if ($Herramienta["estado_herramienta"] == 1) : ?> selected <?php endif; ?>>
            Disponible</option>
          <option value="0" <?php if ($Herramienta["estado_herramienta"] == 0) : ?> selected <?php endif; ?>>
            No
            disponible</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="">Valor de Herramienta (Bs.)</label>
        <input type="number" class="form-control" id="valorHerramienta" name="valorHerramienta"
          placeholder="0.00" value="<?php echo $Herramienta["valor_herramienta"] ?>">
      </div>

      <div class="form-group col-md-6">
        <label for="">Costo Herramienta (Bs)</label>
        <input type="number" class="form-control" id="costoHerramienta" name="costoHerramienta"
          placeholder="0.00" value="<?php echo $Herramienta["costo_herramienta"] ?>">
      </div>

      <div class="form-group col-md-12">
        <label for="">Descripción de Herramienta</label>
        <textarea class="form-control" id="descHerramienta" name="descHerramienta" cols="3" rows="3"><?php echo $Herramienta['desc_herramienta']; ?>
        </textarea>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <label for="">Imagen del Herramienta</label>
        <input type="file" class="form-control" id="ImgHerramienta" name="ImgHerramienta"
          onchange="previsualizarHerramienta()">
        <input type="hidden" id="imgActHerramienta" name="imgActHerramienta"
          value="<?php echo $Herramienta["img_herramienta"]; ?>">
      </div>
      <div class="col-md-6">
        <center>
          <?php if ($Herramienta["img_herramienta"] == "") {
          ?>
            <img src="assest/dist/img/herramienta/product_default.png" class="img-thumbnail previsualizar"
              width="200">
          <?php
          } else {
          ?>
            <img src="assest/dist/img/herramienta/<?php echo $Herramienta["img_herramienta"]; ?>"
              class="img-thumbnail previsualizar" width="200px" height="200px">
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
        EditHerramienta()
      }
    })
    $(document).ready(function() {
      $("#FormEditHerramienta").validate({
        rules: {
          codHerramienta: {
            required: true,
            minlength: 3
          },
          cod_clasificador: {
            required: true,
          },
          valorHerramienta: {
            required: true,
          },
          cod_clasificador: "required"
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