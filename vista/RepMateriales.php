
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Reporte de materiales
    </h5>
    <form action="RepMateriales" method="post">
      <div class="row">
        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Fecha inicio</span>
            </div>
            <input type="date" class="form-control" name="fechaInicio" id="fechaInicio">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Fecha fin</span>
            </div>
            <input type="date" class="form-control" name="fechaFin" id="fechaFin">
          </div>
        </div>
        <div class="col-sm-2">
          <fieldset class="border row">
            <div class="col-sm-6">

              <div class="form-group">
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="ingSal" id="ingSal" value="ingreso" checked>
                  <label for="" class="form-check-label">Ingreso</label>
                </div>
              </div>

            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="ingSal" value="salida">
                  <label for="" class="form-check-label">Salida</label>
                </div>
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-sm-2">
          <!-- <button class="btn btn-primary" onclick="BusRepMaterial()"><i class="fas fa-search"></i> Buscar</button>-->
          <?php
          if(isset($_POST["fechaInicio"])){
            //echo $_POST["fechaInicio"];
          }
          ?>
          <input type="submit" class="btn btn-primary" value="Buscar">
        </div>
      </div>
    </form>
    <table id="DataTableMaterialRep" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Material</th>
          <th>Descripcion</th>
          <th>Unidad</th>
          <th>Stock</th>
          <th>Fecha</th>
          <th>Cod. I/S</th>
          <th>Cantidad</th>
          <td>

          </td>
        </tr>
      </thead>
      <tbody id="respReporte">
        <?php
        if(isset($_POST["fechaInicio"])){
          $data = array(
            "fechaInicio"=>$_POST["fechaInicio"],
            "fechaFin"=> $_POST["fechaFin"],
            "ingSal"=> $_POST["ingSal"]
          );
          $Material = ControladorMaterial::BusRepMaterial($data);
          //creando variables de sesion
          $_SESSION["fechaInicio"] = $_POST["fechaInicio"];
          $_SESSION["fechaFin"] = $_POST["fechaFin"];
          $_SESSION["ingSal"]=$_POST["ingSal"];

          foreach ($Material as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_material"]; ?></td>
          <td><?php echo $value["desc_material"]; ?></td>
          <td><?php echo $value["unidad"]; ?></td>
          <td><span class="badge badge-warning"> <?php  $stock=ControladorMaterial::ctrStockMaterial($value["id_material"]);
            echo $totStock=$stock["ingresos"]-$stock["salidas"];          
            ?> 
            </span></td>
          <td><?php echo $value["fecha"]; ?></td>
          <td><?php echo $value["codigo"]; ?></td>
          <td><?php echo $value["cantidad"]; ?></td>
          <td>

            <div class="btn-group">
              <button class="btn btn-sm btn-info" onclick="MVerMaterial(<?php echo $value["id_material"]; ?>)">
                <i class="fas fa-eye"></i>
              </button>

            </div>
          </td>
        </tr>

        <?php
          }
        }
        ?>


      </tbody>
    </table>

  </section>
</div>


<script>
  $(function() {
    $("#DataTableMaterialRep").DataTable({
      "ordering": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "colvis",
                  {
                    text: 'pdf',
                    action: function () {
                      /*                      var fechaInicio = $("#fechaInicio").val();
                      var fechaFin = $("#fechaFin").val();
                      var ingSal = $("input[name='ingSal']:checked").val();

                      $.ajax({
                        type: "POST",
                        url: "vista/material/VRepMateriales.php?data=",
                        data: data,
                        success: function (data) {

                        }
                      })*/

                      var newTab=window.open('vista/material/VRepMateriales.php','_blank');
                      newTab.addEventListener('load', function() {
                        newTab.print();
                      });
                    }
                  },
                  {
                    text: 'excel', // Texto del botón personalizado
                    action: function () { 
                      var newTab=window.open('vista/material/VRepMaterialesExcel.php','_blank');
                      newTab.addEventListener('load', function() {
                        newTab.print();
                      });
                    }
                  }
                 ],

      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTableMaterialRep_wrapper .col-md-6:eq(0)');

  });


</script>