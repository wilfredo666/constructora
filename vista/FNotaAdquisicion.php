<script>

</script>



<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FormRegAdquisicion" class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Nota de Adquisición</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body row">

        <div class="col-md-6">
          <div class="text-center">
            <label class="mr-4">
              <input type="radio" name="tableOption" class="form-control" value="table1Container" checked> MATERIALES
            </label>
            <label for="" class="mr-4">   |  </label>
            <label>
              <input type="radio" name="tableOption" class="form-control" value="table2Container"> HERRAMIENTAS
            </label>
          </div>
          <hr>

          <div class="form-group col-md-12">
            <div id="table1Container" class="data-table">
              <table id="DataTable_AdquisicionM" class="table table-bordered table-striped display">
                <thead class="bg-info">
                  <tr>
                    <th>Cod. Material</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $Material = ControladorMaterial::ctrInfoMateriales();
                  foreach ($Material as $value) {
                  ?>
                    <tr>
                      <td><?php echo $value["cod_material"]; ?></td>
                      <td><?php echo $value["desc_material"]; ?></td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" onclick="agregarCarritoNI(<?php echo $value["id_material"]; ?>)">
                          <i class="fas fa-plus"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

            <div id="table2Container" class="data-table" style="display: none;">
              <table id="DataTable_AdquisicionH" class="table table-bordered table-striped display">
                <thead class="bg-success">
                  <tr>
                    <th>Cod. Material</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $Herramienta = ControladorHerramienta::ctrInfoHerramientas();
                  foreach ($Herramienta as $value) {
                  ?>
                    <tr>
                      <td><?php echo $value["cod_herramienta"]; ?></td>
                      <td><?php echo $value["desc_herramienta"]; ?></td>
                      <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm" onclick="agregarCarritoNIH(<?php echo $value['id_herramienta']; ?>)">
                          <i class="fas fa-plus"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">

          <div class="row">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Código de Adquisición</span>
              </div>
              <input type="text" class="form-control" name="codAdquisicion" id="codAdquisicion" placeholder="Inserte el código de Adquisición">
            </div>
            <div class="form-group col-md-12">
              <label for="">Proveedor</label>
              <select name="idProveedor" id="idProveedor" class="form-control">
                <option value="">-- Seleccionar --</option>
                <?php
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
          </div>

          <table class="table">
            <thead>
              <tr>
                <th width=250px;>Descripción</th>
                <th>Unidad</th>
                <th>Precio/U</th>
                <th>Cantidad</th>
                <td>&nbsp;</td>
              </tr>
            </thead>
            <tbody id="listaDetalleNI">
            </tbody>

            <tbody id="listaDetalleNIH">
            </tbody>

          </table>

        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-success float-right">Guardar</button>
      </div>
    </form>

  </section>
</div>