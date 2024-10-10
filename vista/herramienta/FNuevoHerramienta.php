<div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Registrar nueva Herramienta</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormRegHerramienta" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Cód. Herramienta</label>
                <input type="text" class="form-control" id="codHerramienta" name="codHerramienta">
            </div>
            <div class="form-group col-md-8">
                <label for="">Cód. de Clasificacion</label>
                <select name="cod_clasificador" id="cod_clasificador" class="form-control">
                    <option value="">-- Seleccionar --</option>
                    <?php
          require "../../controlador/materialControlador.php";
          require "../../modelo/materialModelo.php";
          $codMaterial = ControladorMaterial::ctrInfoCodClasificador();
          foreach ($codMaterial as $value) {
          ?>
                    <option value="<?php echo $value["cod_clasificador"]; ?>"><?php echo $value["descripcion"] ?>
                    </option>
                    <?php
          }
          ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">Valor de Herramienta (Bs.)</label>
                <input type="number" class="form-control" id="valorHerramienta" name="valorHerramienta"
                    placeholder="0.00">
            </div>
            <div class="form-group col-md-6">
                <label for="">Costo Herramienta (Bs)</label>
                <input type="number" class="form-control" id="costoHerramienta" name="costoHerramienta"
                    placeholder="0.00">
            </div>

            <div class="form-group col-md-12">
                <label for="">DescripciÓn de Herramienta</label>
                <textarea class="form-control" id="descHerramienta" name="descHerramienta" cols="3" rows="3"></textarea>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Imagen del Herramienta</label>
                <input type="file" class="form-control" id="ImgHerramienta" name="ImgHerramienta"
                    onchange="previsualizarHerramienta()">
            </div>
            <div class="form-group col-md-6">
                <center>
                    <img src="assest/dist/img/herramienta/product_default.png" class="img-thumbnail previsualizar"
                        width="200">
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
            RegHerramienta()
        }
    })
    $(document).ready(function() {
        $("#FormRegHerramienta").validate({
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