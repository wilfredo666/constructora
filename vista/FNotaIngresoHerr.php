<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaIngresoHerramienta" class="card card-success card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Nota de Ingreso de Herramientas</h4>
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

        <div class="col-md-5">
          <div class="form-group col-md-12">
            <table id="DataTable_NVenta" class="table table-bordered table-striped">
              <thead>
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
                ?><tr>
                <td class="pb-0 mb-0"><?php echo $value["cod_herramienta"]; ?></td>
                <td class="pb-0 mb-0"><?php echo $value["desc_herramienta"]; ?></td>
                <td class="align-items-center text-center ">
                  <div class="btn-group ">
                    <button type="button" class="btn btn-success btn-sm" onclick="agregarCarritoNIH(<?php echo $value['id_herramienta']; ?>)">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-7">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Código de Ingreso Herramienta</span>
            </div>
            <input type="text" class="form-control" name="codIngresoH" id="codIngresoH" placeholder="Inserte el código de ingreso">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Concepto de Ingreso</span>
            </div>
            <input type="text" class="form-control" name="conceptoIngresoH" id="conceptoIngresoH" placeholder="Ingrese el concepto de ingreso">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Codigo proyecto</span>
                </div>
                <select name="codProyecto" id="codProyecto" class="form-control">
                  <option value="">Seleccionar</option>
                  <?php
                  $proyectos=ControladorProyecto::ctrInfoProyectos();
                  foreach($proyectos as $value){
                  ?>
                  <option value="<?php echo $value["cod_proyecto"];?>"><?php echo $value["nombre_proyecto"];?></option>
                  <?php
                  }
                  ?>
                </select>

              </div> 
            </div>

            <div class="col-sm-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Entregado por</span>
                </div>
                <select name="provisionador" id="provisionador" class="form-control">
                  <option value="">Seleccionar</option>
                  <?php
                  $personal=ControladorPersonal::ctrInformacionPersonal();
                  foreach($personal as $value){
                  ?>
                  <option value="<?php echo $value["id_personal"];?>"><?php echo $value["nombre"]." ".$value["ap_paterno"]." ".$value["ap_materno"];?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
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